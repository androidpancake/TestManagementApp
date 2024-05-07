<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Scenario extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'scenarios';

    protected $foreignKeys = 'project_id';

    protected $fillable = [
        'scenario_name',
        'project_id'
    ];

    public function toSearchableArray()
    {
        return [
            'scenario_name' => $this->scenario_name
        ];
    }

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
