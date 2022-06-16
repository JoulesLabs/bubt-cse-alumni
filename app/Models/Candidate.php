<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'candidate_tags');
    }
}
