<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
    ];

    protected $casts = [
        'content' => 'array'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
