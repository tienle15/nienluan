<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datphong extends Model
{
    public $timestamps = false;
    public $table = 'datphong';
    protected $primaryKey = 'mact';
    protected $fillable = [
    	'mact',
    	'ngaydat',
    	'ngayden',
    	'ngaydi',
    	'songuoilon',
    	'sotreem',
    	'xacnhan',
    	'malp',
    	'makh',
    	'maql'
    ];
}
