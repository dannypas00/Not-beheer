<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property Player $player
 * @property Leg $leg
 * @property string $throw_1
 * @property string $throw_2
 * @property string $throw_3
 * @property int $remaining_score
 */
class Turn extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'player',
        'leg',
        'throw_1',
        'throw_2',
        'throw_3'
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

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function leg(): BelongsTo
    {
        return $this->belongsTo(Leg::class);
    }
}
