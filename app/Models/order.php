<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'product_id',
        'cuantity',
        'status',
        'fecha_trabajo',
        'orden',
        'tipo',
        'pago'
    ];

    protected $casts = [
        'orden' => 'array'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
