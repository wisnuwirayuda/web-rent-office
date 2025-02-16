<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeSpace extends Model
{
    use SoftDeletes;

    // Mengizinkan field apa saja yg dapat diisi
    protected $fillable = [
        'name',
        'thumbnail',
        'address',
        'is_open',
        'is_full_booked',
        'price',
        'duration',
        'about',
        'city_id',
        'slug',
    ];
}
