<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'clo_id', 'title', 'description',
    ];

    public function clo()
    {
        return $this->belongsTo(Clo::class);
    }

    public function files()
    {
        return $this->hasMany(MaterialFile::class);
    }
}
