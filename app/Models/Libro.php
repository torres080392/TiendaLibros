<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
