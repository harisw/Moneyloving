<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Detail;
use File;
use Illuminate\Support\Facades\Storage;
use DB;

class IncomeController extends Controller
{
    public function index()
    {
    	return view('income.index');
    }

    public function enkrip($data, $size)
    {
        $length = $size - strlen($data) % $size;
        return $data . str_repeat(chr($length), $length);
    }

    public function create(Request $request)
    {   
        //dd($request);
        $id = $request->session()->get('id');
        //dd($id);
        $query = DB::select("SELECT users.kunci as kunci , users.IV as iv FROM users WHERE users.id = '".$id."'");
        //dd($query);
        $img = null;
    	if($request->hasFile('income_img'))
    	{
    		$img = $this->uploadImg($request, $request->input('income_name'));
    	}

        $en_key = $query[0]->kunci;
        $iv = $query[0]->iv;
        //dd($en_key,$iv);
    	$new_income = new Record;
    	//$new_income->judul_transaksi = $request->input('income_name');
        $new_income->judul_transaksi = openssl_encrypt(
            $this->enkrip($request->input('income_name'), 16),
            'AES-256-CBC',
            $en_key,
            0,
            $iv
            );
        $new_income->type = '+';
//        $new_income->tempat = 'Sakinah';
        $new_income->tempat = openssl_encrypt(
            $this->enkrip($request->input('income_place'), 16),
            'AES-256-CBC',
            $en_key,
            0,
            $iv
            );
    	$new_income->jumlah = 0;
        $new_income->tanggal = $request->input('income_date');
    	$new_income->id_user = $id;
    	if(!empty($img))
    		$new_income->foto = $img;
    	if($new_income->save())
        {
            if($request->input('detailCheck'))
            {
                $count_detail =  $request->input('item_num');
                $total = 0;
                for($i = 1;$i <= $count_detail;$i++)
                {
                    $data = array(
                        'name' => $request->input('item_name_'.$i),
                        'qty' => $request->input('item_qty_'.$i),
                        'price' => $request->input('item_price_'.$i),
                        'id' => $new_income->id
                    );
                    $total += ($request->input('item_price_'.$i)*$request->input('item_qty_'.$i));
                    $report = $this->createItemDetail($data);
                    if(!$report)
                        break;
                }
                $new_income->jumlah = $total;
                $new_income->save();
            }

    		return redirect('/home')->with('status', 'New Income successfully added');
        }
    	return redirect('/income/new')->with('status', 'Income addition failed');
    }

    public function chosen($id,Request $request)
    {
        $inc = Record::find($id);

        $user_id = $request->session()->get('id');
        $name = $request->session()->get('username');
        //dd($id);
            $query = DB::select("SELECT users.kunci as kunci , 
                        users.IV as iv FROM users WHERE users.id = '".$user_id."'"); 
            $key = $query[0]->kunci;
            $iv = $query[0]->iv;

        $inc->judul_transaksi = $this->dekrip(openssl_decrypt(
            $inc->judul_transaksi,
            'AES-256-CBC',
            $key,
            0,
            $iv 
            ));
        $inc->tempat = $this->dekrip(openssl_decrypt(
            $inc->tempat,
            'AES-256-CBC',
            $key,
            0,
            $iv 
            ));
        
        return view('income.update', compact('inc'));
    }

    public function update(Request $request)
    {   
        //dd($request);
        $id = $request->session()->get('id');
        //dd($id);
        $query = DB::select("SELECT users.kunci as kunci , users.IV as iv FROM users WHERE users.id = '".$id."'");
        //dd($query);
        $img = null;
        if($request->hasFile('income_img'))
        {
            $img = $this->uploadImg($request, $request->input('income_name'));
        }

        $en_key = $query[0]->kunci;
        $iv = $query[0]->iv;
        //dd($en_key,$iv);
        $rec_id = $request->input('id');
        $income = Record::find($rec_id);
        //dd($income);
        //$new_income->judul_transaksi = $request->input('income_name');
        $income->judul_transaksi = openssl_encrypt(
            $this->enkrip($request->input('income_name'), 16),
            'AES-256-CBC',
            $en_key,
            0,
            $iv
            );
        $income->type = '+';
//        $new_income->tempat = 'Sakinah';
        $income->tempat = openssl_encrypt(
            $this->enkrip($request->input('income_place'), 16),
            'AES-256-CBC',
            $en_key,
            0,
            $iv
            );
        //$new_income->jumlah = 0;
        if(!is_null($request->input('income_date'))) $income->tanggal = $request->input('income_date');
        
        if(!empty($img))
            $income->foto = $img;
        if($income->save())
        {
            if($request->input('detailCheck'))
            {
                foreach ($income->details as $det) {
                    $det->delete();
                }

                $count_detail =  $request->input('item_num');
                $total = 0;
                for($i = 1;$i <= $count_detail;$i++)
                {
                    $data = array(
                        'name' => $request->input('item_name_'.$i),
                        'qty' => $request->input('item_qty_'.$i),
                        'price' => $request->input('item_price_'.$i),
                        'id' => $income->id
                    );
                    $total += ($request->input('item_price_'.$i)*$request->input('item_qty_'.$i));
                    $report = $this->createItemDetail($data);
                    if(!$report)
                        break;
                }
                $income->jumlah = $total;
                $income->save();
            }

            return redirect('/home')->with('status', 'Income successfully edited');
        }
        return redirect('/income/update/'.$request->input('id'))->with('status', 'Income edit failed');
    }

    private function uploadImg($request, $name)
    {
    	//declare folder
		$folder = 'income';
		$public_folder = public_path('assets/app/'.$folder);

        //getextension
		$ext = $request->income_img->extension();

        //create filename
		$filename = $this->createFilename($name,$public_folder,$ext);

        //join extension with filename
		$filename.='.'.$ext;

        //store local storage
		$old_path = $request->income_img->storeAs($folder, $filename);

        //move to public path (dest,source)
		$new_path = $request->file('income_img')->move($public_folder, $old_path);

        //delete file di storage
		Storage::delete($old_path);

		// $file_url = 'assets/app/'.$old_path;

		// $thumb_filename = 'thumb_'.$filename;
		// $resized_filename = 'big_'.$filename;

  //       // open an image file
		// $img = Image::make($file_url);
		// $img->fit(300);
		// $img->save($public_folder.'/'.$thumb_filename);


  //       // open an image file
		// $img = Image::make($file_url);
		// $img->resize(null, 500, function ($constraint) {
		// 	$constraint->aspectRatio();
		// });

		// $img->save($public_folder.'/'.$resized_filename);

		$images = 'assets/app/'.$folder.'/'.$filename;
			// 'thumb' => 'assets/app/'.$folder.'/'.$thumb_filename,
			// 'big' => 'assets/app/'.$folder.'/'.$resized_filename

		return $images;
	}

	private function createFilename($name,$public_folder,$ext)
	{

            //slug filename
		$filename = $name;
		$filename = substr($filename, 0,10);
		$filename = preg_replace('~[^\pL\d]+~u', '-', $filename);
        $filename = iconv('utf-8', 'us-ascii//TRANSLIT', $filename);// transliterate
        $filename = preg_replace('~[^-\w]+~', '', $filename); // remove unwanted characters
        $filename = trim($filename, '-'); // trim
        $filename = preg_replace('~-+~', '-', $filename); // remove duplicate -
        $filename = strtolower($filename); // lowercase

        $filename_check = $filename;
        $i = 2;


        //if file exist change name;
        while(file_exists( $public_folder .'/'. $filename_check .'.'. $ext)) {
        	$filename_check = $filename;
        	$filename_check.= $i;
        	$i++;
        }

        $filename = $filename_check;


        return $filename;
        $images = array(
        	'original'=> $folder.'/'.$filename,
        	'thumb' => $folder.'/'.$thumb_filename
        );

        return $images;     
    }

    private function createItemDetail($data)
    {
        $new_item = new Detail;
        $new_item->nama_item = $data['name'];
        $new_item->kuantitas = $data['qty'];
        $new_item->harga = $data['price'];
        $new_item->id_record = $data['id'];
        if($new_item->save())
            return TRUE;
        return FALSE;
    }

    public function dekrip($data)
    {
        return substr($data, 0, -ord($data[strlen($data) - 1]));
    }   
}
