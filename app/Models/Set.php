<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property $winner
 */
class Set extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['winner'];

    /**
     * The attributes that should be guarded.
     *
     * @var string[]
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return HasOne
     */
    public function winner(): HasOne
    {
        return $this->hasOne(Player::class, 'id', 'winner');
    }

    /**
     * @return HasMany
     */
    public function legs(): hasMany
    {
        return $this->hasMany(Leg::class);
    }
}
