<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KarirSettings extends Model
{
    protected $table = 'karir_settings';

    protected $fillable = [
        'description',
        'benefits',
        'years_experience',
        'projects_completed',
        'team_professionals',
        'cities_served',
    ];

    protected $casts = [
        'benefits' => 'array',
    ];
}
