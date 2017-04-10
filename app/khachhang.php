<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    public $timestamps = false;
    public $table = 'khach_hang';
    protected $primaryKey = 'makh';
    protected $fillable = [
    	'makh',
    	'tenkh',
    	'email',
    	'sdt'
    ];
}
