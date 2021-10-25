<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property $average_score
 * @property $winner
 * @property $set
 * @property $turns
 */
class Leg extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'average_score',
        'winner',
        'set_id',
        'average_score'
    ];

    /**
     * The attributes that should be guarded.
     *
     * @var string[]
     */
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return HasOne
     */
    public function winner(): HasOne
    {
        return $this->hasOne('player', 'id', 'winner');
    }

    /**
     * @return HasMany
     */
    public function turns(): HasMany
    {
        return $this->hasMany(Turn::class, 'leg', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function set(): BelongsTo
    {
        return $this->belongsTo(Set::class);
    }
}
