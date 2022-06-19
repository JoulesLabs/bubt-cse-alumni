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
        'designation',
        'company_id',
        'lives',
        'facebook',
        'linkedin',
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
