<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'value',
        'quantity'
    ];

    public function interested()
    {
        return $this->hasMany(Interested::class);
    }
}
