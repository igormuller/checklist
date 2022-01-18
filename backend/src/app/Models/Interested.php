<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    use HasFactory;

    protected $table = "interested";

    protected $fillable = [
        'cake_id',
        'name',
        'email',
        'send'
    ];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
}
