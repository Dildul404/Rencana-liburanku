<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Daily_activity extends Model
{
    Protected $fillable = ['destination_id','activities','schedule','tanggal','lama_liburan'];

    // Belongs to destination
    public function destination(): BelongsTo {
        return $this->belongsTo(Destination::class);
    }
}
