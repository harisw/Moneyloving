<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $connection = 'mysql';
    protected $table = 'expenses';

    public function details()
    {
    	return $this->hasMany('App\Models\Detail','id_expense','id');
    }
}
