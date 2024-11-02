<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Maak user_id fillable
        'datum',   // Maak datum fillable
        'opmerkingen', // Maak opmerkingen fillable
    ];
}
