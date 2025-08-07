<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'zone',
        'team_count',
        'members_per_team'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function projectUpdates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }
}
