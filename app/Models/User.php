<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    protected $guarded = [];
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }
}
