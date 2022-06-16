<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'intake',
        'shift',
        'passing_year',
        'university_id',
        'current_job_designation',
        'current_company',
        'lives',
        'facebook',
        'linkedin',
        'github',
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }
}
