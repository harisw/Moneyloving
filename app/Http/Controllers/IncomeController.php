<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use File;
use Illuminate\Support\Facades\Storage;

class IncomeController extends Controller
{
    public function index()
    {
    	return view('income.index');
    }

    public function create(Request $request)
    {
    	if($request->hasFile('income_img'))
    	{
    		$img = $this->uploadImg($request, $request->input('income_name'));
    	}
    	$new_income = new Income;
    	$new_income->judul_transaksi = $request->input('income_name');
    	$new_income->jumlah = $request->input('income_val');
    	$new_income->id_user = 1;
    	if($img)
    		$new_income->foto = $img;
    	if($new_income->save())
    		return redirect('/')->with('status', 'New Income successfully added');
    	return redirect('/income/new')->with('status', 'Income addition failed');
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
}
