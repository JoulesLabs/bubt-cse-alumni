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
        'referer_note'
    ];
}
