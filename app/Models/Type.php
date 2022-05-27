<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Phone;
use App\Models\TypeClient;

class Type extends Model
{
    use HasFactory;

    public $table = 'types';

    protected $fillable = [
        'people',
    ];


}
