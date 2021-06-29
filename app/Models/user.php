<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = ['user_nickname','user_account','user_password','user_contactEmail','user_contactLine','user_picture','user_admin','user_borrowtime'];
    use HasFactory;
}
