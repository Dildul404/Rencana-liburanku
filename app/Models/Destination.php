<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    Protected $fillable = ['user_id','judul','tanggal','budget','lama_liburan','image','status',];

    // Relationship belong to User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship Has to Many Locations
    public function locations(): HasMany {
        return $this->hasMany(Location::class);
    }

    // Relationship Has to Many Daily_activity
    public function Daily_activities(): HasMany {
        return $this->hasMany(Daily_activity::class);
    }
}
