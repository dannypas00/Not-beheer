<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $iso3
 * @property $iso2
 * @property $emoji
 */
class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'iso3',
        'iso2',
        'emoji'
    ];
}
