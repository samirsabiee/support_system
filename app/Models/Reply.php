<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'ticket_id'];

    public function repliable(): MorphTo
    {
        return $this->morphTo();
    }
}


