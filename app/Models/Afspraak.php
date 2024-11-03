<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'product',
        'help_request',
        'phone',
        'datum',
        'opmerkingen',
    ];
}
