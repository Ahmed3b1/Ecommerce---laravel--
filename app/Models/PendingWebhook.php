<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingWebhook extends Model
{
    
    protected $fillable = [
        'session_id',
        'amount',
        'status',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];
    
}
