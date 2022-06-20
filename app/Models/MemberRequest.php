<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referer_id',
        'status',
        'name',
        'email',
        'password',
        'mobile',
        'intake',
        'shift',
        'referer_note',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
