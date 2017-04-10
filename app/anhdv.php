<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anhdv extends Model
{
    public $timestamps = false;
    public $table = 'anh_dv';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'idanh',
    	'tenanh',
    	'madv',
    ];
}
