<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Input;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Record;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$id = $request->session()->get('id');
    	$name = $request->session()->get('username');
        //dd($id);
            $query = DB::select("SELECT users.kunci as kunci , 
                        users.IV as iv FROM users WHERE users.id = '".$id."'"); 
            $key = $query[0]->kunci;
            $iv = $query[0]->iv;
            $rec = Record::where('id_user', $id)->orderBy('created_at', 'desc')->get();
            $i = count($rec);
            for($j=0;$j<$i;$j++)
            {
                $rec[$j]->judul_transaksi = $this->dekrip(openssl_decrypt(
                    $rec[$j]->judul_transaksi,
                    'AES-256-CBC',
                    $key,
                    0,
                    $iv 
                    ));
                $rec[$j]->tempat = $this->dekrip(openssl_decrypt(
                    $rec[$j]->tempat,
                    'AES-256-CBC',
                    $key,
                    0,
                    $iv 
                    ));
            }
            return view('start', compact('rec'));    
    }
    public function dekrip($data)
    {

    return substr($data, 0, -ord($data[strlen($data) - 1]));
    
    }	
}
