<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected string $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'department', 'department');
    }
}
