<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * The attributes that should be guarded.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return HasManyThrough
     */
    public function fixture(): HasManyThrough
    {
        return $this->hasManyThrough(Fixture::class, PlayerFixture::class);
    }
}
