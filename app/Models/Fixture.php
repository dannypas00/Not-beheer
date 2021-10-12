<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @property Player $player_1
 * @property Player $player_2
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

    /**
     * @return BelongsTo
     */
    public function player1(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_1', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function player2(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_2', 'id');
    }

    /**
     * @return HasOne
     */
    public function winner(): HasOne
    {
        return $this->hasOne(Player::class, 'id', 'winner');
    }
}
