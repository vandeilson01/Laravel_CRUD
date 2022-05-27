<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;
use App\Models\Type;
use App\Models\TypeClient;

class Client extends Model
{
    use HasFactory;

    public $table = 'clients';

    protected $fillable = [
        'id',
        'name',
        'email',
        'image',
    ];

    public function type()//1:N
    {
        return $this->hasMany(TypeClient::class, 'client', 'id');
    }

    public function phone()//N:N
    {
        return $this->belongsToMany(Phone::class, 'phones_clients', 'client', 'phone');
    }

    // public function scopePeoples($query, $type)
    // {
    //     return $query->where('id', $type)->first();
    // }
}
