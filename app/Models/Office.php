<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'headquarters_id',
        'administrative_units_id',
        'code',
        'name',
        'floor',
        'level',
        'details',
    ];

    public function sede()
    {
        return $this->belongsTo(Headquarter::class, 'headquarters_id', 'id');
    }

    public function unidad()
    {
        return $this->belongsTo(AdministrativeUnit::class, 'administrative_units_id', 'id');
    }

}
