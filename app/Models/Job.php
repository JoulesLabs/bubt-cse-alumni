<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tags');
    }
}
