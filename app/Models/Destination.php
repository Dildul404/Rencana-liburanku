<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    Protected $fillable = ['user_id','judul','tanggal','budget','lama_liburan','status',];
}
