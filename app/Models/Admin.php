<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nahid\Permit\Users\Permitable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Permitable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];
}
