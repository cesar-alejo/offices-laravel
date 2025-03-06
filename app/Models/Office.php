<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'headquarter_id',
        'administrative_unit_id',
        'code',
        'name',
        'floor',
        'level',
        'details',
    ];

    public function headquarter()
    {
        return $this->belongsTo(Headquarter::class);
    }

    public function administrative_unit()
    {
        return $this->belongsTo(AdministrativeUnit::class);
    }

}
