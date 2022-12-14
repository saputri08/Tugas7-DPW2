<?php

namespace App\Models;

use App\Models\produk;
use App\Models\UserDetail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    protected $table ='user';
    use HasFactory, Notifiable;

    function detail(){
        return $this->hasOne(UserDetail::class, 'id_user');
    }

    function produk(){
        return $this->hasMany(Produk::class, 'id_user');
    }
}
