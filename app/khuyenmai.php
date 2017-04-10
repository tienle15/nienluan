<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    public $timestamps = false;
    public $table = 'khuyen_mai';
    protected $primaryKey = 'makm';
    protected $fillable = [
    	'makm',
    	'tenkm',
    	'ngaytao',
    	'ngaybt',
    	'ngaykt',
    	'chietkhau',
        'mota',
    	'noidungkm',
        'anhkm',
    	'maql',
    ];
}
