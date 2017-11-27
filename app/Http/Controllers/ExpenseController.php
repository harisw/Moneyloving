<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Detail;
use File;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index()
    {
    	return view('expense.index');
    }
    public function enkrip($data, $size)
    {
        $length = $size - strlen($data) % $size;
        return $data . str_repeat(chr($length), $length);
    }

    public function create(Request $request)
    {   
        $id = $request->session()->get('id');
        $query = DB::select("SELECT users.kunci as kunci , users.IV as iv FROM users WHERE users.id = '".$id."'");
    	if($request->hasFile('expense_img'))
    	{
    		$img = $this->uploadImg($request, $request->input('expense_name'));
    	}
        $en_key = $query[0]->kunci;
        $iv = $query[0]->iv;
    	$new_expense = new Expense;
    	//$new_expense->judul_transaksi = $request->input('expense_name');
        $new_expense->judul_transaksi = openssl_encrypt(
            $this->enkrip($request->input('expense_name'), 16),
            'AES-256-CBC',
            $en_key,
            0,
            $iv
            );
    	$new_expense->jumlah = 0;
    	$new_expense->category = $request->input('category');
    	//$new_expense->tempat_pembelian = $request->input('expense_place');
    	$new_expense->tempat_pembelian = openssl_encrypt(
            $this->enkrip($request->input('expense_place'), 16),
            'AES-256-CBC',
            $en_key,
            0,
            $iv
            );
        $new_expense->id_user = $id;
    	$new_expense = new Record;
    	$new_expense->judul_transaksi = $request->input('expense_name');
        $new_expense->type = '-';
    	$new_expense->jumlah = 0;
    	$new_expense->category = $request->input('category');
    	$new_expense->tempat = $request->input('expense_place');
    	$new_expense->id_user = 1;
    	if($img)
    		$new_expense->foto = $img;
    	if($new_expense->save())
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
	 					'id' => $new_expense->id
	 				);
	 				$total += ($request->input('item_price_'.$i)*$request->input('item_qty_'.$i));
	 				$report = $this->createItemDetail($data);
	 				if(!$report)
	 					break;
	 			}
	 			$new_expense->jumlah = $total;
	 			$new_expense->save();
    		}

    		return redirect('/home')->with('status', 'New Income successfully added');
    	}
    	return redirect('/expense/new')->with('status', 'Income addition failed');
    }

    private function uploadImg($request, $name)
    {
    	//declare folder
		$folder = 'expense';
		$public_folder = public_path('assets/app/'.$folder);

        //getextension
		$ext = $request->expense_img->extension();

        //create filename
		$filename = $this->createFilename($name,$public_folder,$ext);

        //join extension with filename
		$filename.='.'.$ext;

        //store local storage
		$old_path = $request->expense_img->storeAs($folder, $filename);

        //move to public path (dest,source)
		$new_path = $request->file('expense_img')->move($public_folder, $old_path);

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
}
