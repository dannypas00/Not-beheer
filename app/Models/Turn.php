<?php

namespace App\Models;

/**
 * @property Player $player
 * @property Leg $leg
 * @property string $throw1
 * @property string $throw2
 * @property string $throw3
 */
class Turn extends \Illuminate\Database\Eloquent\Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['player_id', 'leg_id', 'throw_1', 'throw_2', 'throw_3'];

    /**
     * The attributes that should be guarded.
     *
     * @var string[]
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
}
