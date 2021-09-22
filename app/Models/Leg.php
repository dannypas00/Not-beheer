<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leg extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['average_score', 'winner', 'throws', 'deleted_at'];

    /**
     * The attributes that should be guarded.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
}
