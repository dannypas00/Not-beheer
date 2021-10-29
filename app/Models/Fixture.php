<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $type
 * @property string $style
 * @property int $length
 * @property int $start_score
 * @property DateTime $date_time
 * @property Player $player1
 * @property Player $player2
 * @property Collection<Set> $sets
 * @property Collection<Leg> $legs
 * @property City $location
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
    protected $fillable = [
        'type',
        'style',
        'length',
        'start_score',
        'date_time',
        'player_1',
        'player_2',
        'winner',
        'location'
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
     * @return hasManyThrough
     */
    public function sets(): hasManyThrough
    {
        return $this->hasManyThrough(Set::class, Game::class, 'fixture_id', 'id');
    }

    /**
     * @return hasManyThrough
     */
    public function legs(): hasManyThrough
    {
        return $this->hasManyThrough(Leg::class, Game::class, 'fixture_id', 'id');
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

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'location');
    }
}
