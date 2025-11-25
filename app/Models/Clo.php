<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clo extends Model
{
    protected $fillable = [
        'course_id', 'title', 'description', 'summary', 'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function chatSessions()
    {
        return $this->hasMany(ChatSession::class);
    }
}
