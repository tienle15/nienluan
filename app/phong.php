<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    public $timestamps = false;
    public $table = 'phong';
    protected $primaryKey = 'maphong';
    protected $fillable = [
    	'maphong',
    	'tenphong',
    	'tinhtrang',
    	'malp',
    ];
}
