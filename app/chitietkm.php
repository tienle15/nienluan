<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietkm extends Model
{
    public $timestamps = false;
    public $table = 'chi_tiet_km';
    protected $fillable = [
    	'makm',
    	'malp',
    ];
}
