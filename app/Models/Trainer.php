<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name',
        'rank',
        'image'
    ];

    public function dragon()
    {
        return $this->hasMany(Dragon::class);
    }

}



