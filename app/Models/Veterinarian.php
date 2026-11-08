<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Veterinarian extends Model
{
    protected $fillable = [
        'name',
        'position',
        'specialization',
        'experience_years',
        'phone',
    ];
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(
            Service::class,
            'veterinarian_service',
            'veterinarian_id',
            'service_id'
        );
    }
}

