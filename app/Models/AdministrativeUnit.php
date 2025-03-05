<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdministrativeUnit extends Model
{
    protected $fillable = [
        'code',
        'name',
        'details',
    ];

    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
