<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Input;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Record;

class HomeController extends Controller
{
    public function index()
    {
    	$rec = Record::orderBy('created_at', 'desc')->get();
    	$inc = Income::orderBy('created_at', 'desc')->get();

    	//dd($exp);
    	return view('start', compact('rec'));
    }	
}
