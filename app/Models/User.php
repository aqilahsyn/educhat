<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
        'role', 'nip', 'nim',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function coordinatedCourses()
    {
        return $this->belongsToMany(Course::class, 'course_user')
            ->wherePivot('type', 'coordinator');
    }

    public function chatSessions()
    {
        return $this->hasMany(ChatSession::class);
    }
}
