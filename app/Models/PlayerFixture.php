<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerFixture extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [];

    /**
     * The attributes that should be guarded.
     *
     * @var string[]
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * @return BelongsTo
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Fixture::class);
    }
}
