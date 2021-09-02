<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Storage;

class Ticket extends Model
{
    use HasFactory;

    const TICKET_OPEN = 'Open';
    const TICKET_REPLIED = 'Replied';
    const TICKET_CLOSED = 'Closed';

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
        return [self::TICKET_OPEN, self::TICKET_REPLIED, self::TICKET_CLOSED][$value];
    }

    public function hasFile(): bool
    {
        return !is_null($this->file_path);
    }

    public function file(): ?string
    {
        return $this->hasFile()
            ? Storage::url($this->file_path)
            : null;
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function isCreated(): bool
    {
        return $this->status === self::TICKET_OPEN;
    }

    public function replied()
    {
        $this->status = 1;
        $this->save();
    }

    public function close()
    {
        $this->status = 2;
        $this->save();
    }

    public function isClosed(): bool
    {
        return $this->status === self::TICKET_CLOSED;
    }
}
