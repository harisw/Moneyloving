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
        if($name != 'admin')
        {
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
        else
        {
            $query = DB::select("SELECT * 
                        FROM users WHERE users.id != '".$id."'");
               //dd($query);
                $pair = array(
                    'id' => $id_pair = array(),
                    'key' => $key_pair = array(),
                    'IV' => $iv_pair = array(),
                    );
                foreach ($query as $tmp) {
                    array_push($pair['id'],$tmp->id);
                    array_push($pair['key'],$tmp->kunci);
                    array_push($pair['IV'],$tmp->IV);
                }
            //dd($pair);
            $num_pair = count($pair['id']);
            //dd($num_pair);
            for($i=0;$i<$num_pair;$i++)
            {
                $rec[$i] = DB::select("SELECT * FROM record 
                WHERE record.id_user = '".$pair['id'][$i]."' 
                ORDER BY created_at DESC");
                //dd($rec);
                $num_rec = count($rec[$i]);
                for($j=0;$j<$num_rec;$j++)
                {
                    $rec[$i][$j]->judul_transaksi = $this->dekrip(openssl_decrypt(
                        $rec[$i][$j]->judul_transaksi,
                        'AES-256-CBC',
                        $pair['key'][$i],
                        0,
                        $pair['IV'][$i]
                        ));
                    $rec[$i][$j]->tempat = $this->dekrip(openssl_decrypt(
                        $rec[$i][$j]->tempat,
                        'AES-256-CBC',
                        $pair['key'][$i],
                        0,
                        $pair['IV'][$i] 
                        ));
                }
                //dd($rec);
            }
            //dd($rec);
            return view('start', compact('rec'));
        }
    }
    public function dekrip($data)
    {

    return substr($data, 0, -ord($data[strlen($data) - 1]));
    
    }	
}
