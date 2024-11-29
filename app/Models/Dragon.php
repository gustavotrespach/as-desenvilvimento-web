<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dragon extends Model
{
    protected $fillable = [
        'name',
        'age',
        'element',
        'image',
        'trainer_id'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

}

