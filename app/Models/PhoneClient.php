<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneClient extends Model
{
    use HasFactory;

    public $table = 'phones_clients';

    protected $fillable = [
        'client',
        'phone',
    ];
}
