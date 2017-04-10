<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdatphong extends Model
{
   	public $timestamps = false;
    public $table = 'chitiet_datphong';
    protected $fillable = [
    	'mact',
    	'maphong'
    ];
}
