<?php

namespace App\Models;

Class Produk extends Model{
    protected $table = 'produk';

    function seller(){
        return $this->belongsTo(User::class, 'id_user');
    }

}