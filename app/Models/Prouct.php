<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Prouct extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = '_id';
    protected $table = 'proucts';
    protected $connection = 'mongodb';
}
