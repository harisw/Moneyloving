<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $connection = 'mysql';
    protected $table = 'expenses';
}
