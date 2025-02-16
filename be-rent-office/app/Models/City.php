<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'photo'
    ];

    // Membuat Slug Otomatis
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get all of the officeSpace for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function officeSpace(): HasMany
    {
        return $this->hasMany(officeSpace::class);
    }
}
