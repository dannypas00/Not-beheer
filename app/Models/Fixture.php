<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $type
 * @property string $style
 * @property int $length
 * @property int $start_score
 * @property int $average_score
 * @property \DateTime $date
 * @property Player $player1
 * @property Player $player2
 */
class Fixture extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['average_score', 'type', 'style', 'length', 'start_score', 'date', 'player_1', 'player_2'];

    /**
     * The attributes that should be guarded.
     *
     * @var string[]
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

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

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
