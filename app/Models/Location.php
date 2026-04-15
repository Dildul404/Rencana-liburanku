<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Expr\FuncCall;

class Location extends Model
{
    protected $fillable = ['destination_id','location'];

    // Belongs to destination
    public function destination (): BelongsTo {
        return $this->belongsTo(Destination::class);
    }
}
