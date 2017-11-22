<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB, Input;
use App\User;

class LoginController extends Controller
{
    public function view()
    {
        return view('login');
    }

    public function loggedin(Request $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');
        $rp = md5($password);
        $login = DB::table('users')->where(['username'=>$username, 'password'=>$rp])->get();
        if (count($login)>0) 
        {
            session(['id'=>$login[0]->id, 'username'=>$login[0]->username]);
            return redirect('/home');
        }
        else
        {
            return redirect('login')->with('status', 'Login gagal, cek kembali username dan password anda!!!');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function registered(Request $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');
        $login = DB::table('users')->where(['username'=>$username, 'password'=>$password])->get();
        if(count($login)) 
        {
            return redirect('register')->with('status', 'Register gagal, username sudah ada!!!');
        }
        else
        {   
            $key_size = 32;
            $enc_key = openssl_random_pseudo_bytes($key_size, $strong);
            //dd($enc_key);
            $iv_size = 32;
            $iv = openssl_random_pseudo_bytes($iv_size, $strong);

            $user = new User;
            $user->username = $username;
            $user->password = md5($password);
            $user->kunci = $enc_key;
            $user->IV = $iv;
            $user->save();
            return redirect('/')->with('status', 'Register berhasil!!!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }

}
