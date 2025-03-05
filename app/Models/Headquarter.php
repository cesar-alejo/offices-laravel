<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    protected $fillable = [
        'name',
        'address',
        'details',
    ];

    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
