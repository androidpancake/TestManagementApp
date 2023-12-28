<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    use HasFactory;

    protected $table = 'scenarios';

    protected $fillable = [
        'id',
        'scenario_name',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function case()
    {
        return $this->hasMany(TestCase::class, 'test_id');
    }
}
