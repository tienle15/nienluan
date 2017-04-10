<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiphong extends Model
{
    public $timestamps = false;
    public $table = 'loai_phong';
    protected $primaryKey = 'malp';
    protected $fillable = [
    	'malp',
    	'tenlp',
    	'succhua',
    	'dientich',
    	'dongia',
    	'giuong',
    ];
}
