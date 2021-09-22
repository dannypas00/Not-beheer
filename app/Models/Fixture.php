<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fixture extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['type', 'style', 'length', 'start_score', 'average_score', 'date'];

    /**
     * The attributes that should be guarded.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    public function players(): HasManyThrough
    {
        return $this->hasManyThrough(Player::class, PlayerFixture::class);
    }

    /**
     * @return MorphMany
     */
    public function sets(): MorphMany
    {
        return $this->morphMany(Set::class, Game::class);
    }

    /**
     * @return MorphMany
     */
    public function legs(): MorphMany
    {
        return $this->morphMany(Leg::class, Game::class);
    }
}
