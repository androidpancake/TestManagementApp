<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    use HasFactory;

    protected $table = 'scenarios';

    protected $foreignKeys = 'project_id';

    protected $fillable = [
        'scenario_name',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function steps()
    {
        return $this->hasManyThrough(TestStep::class, TestCase::class, 'test_id', 'case_id', 'id', 'id');
    }

    public function cases()
    {
        return $this->hasMany(TestCase::class, 'test_id');
    }
}
