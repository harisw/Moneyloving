<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $connection = 'mysql';
    protected $table = 'record';

    public function details()
    {
    	return $this->hasMany('App\Models\Detail','id_record','id');
    }
}
