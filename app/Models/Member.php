<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory; // 뭐 더미 데이터 만드는데 쓴대요

    protected $fillable = [
        'member_id',
        'nickname',
        'password',
        'email'
    ];
}
