<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionUser extends Model
{
    use HasFactory;

    public $table = "sesstion_token";

    protected $fillable = [
        'token',
        'refresh_token',
        'exprired_token',
        'user_id'
    ];
}
