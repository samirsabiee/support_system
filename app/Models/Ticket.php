<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'department', 'file_path', 'priority'];

    protected $attributes = [
        'status' => 0,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityAttribute($value): string
    {
        return ['Low', 'Middle', 'High'][$value];
    }

    public function getStatusAttribute($value): string
    {
        return ['Open', 'Replied', 'Closed'][$value];
    }
}
