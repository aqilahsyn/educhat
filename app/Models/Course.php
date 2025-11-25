<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name', 'description', 'header_image_path'];

    public function clos()
    {
        return $this->hasMany(Clo::class);
    }

    public function coordinators()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->wherePivot('type', 'coordinator');
    }
}
