<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Type;
use App\Models\TypeClient;

class Phone extends Model
{
    use HasFactory;

    public $table = 'phones';

    protected $fillable = [
        'client',
        'number',
    ];
}
