<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property $id
 * @property $name
 */
class City extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'country_id'];

    public function country(): BelongsTo
    {
        $this->belongsTo(Country::class);
    }
}
