<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichVu extends Model
{
    public $timestamps = false;
    public $table = 'dich_vu';
    protected $primaryKey = 'madv';
    protected $fillable = [
    	'madv',
    	'tendv',
    	'mota',
    	'noidungdv',
    	'maql',
    ];
}
