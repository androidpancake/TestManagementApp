<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable = [
        'id',
        'name',
        'jira_code',
        'test_level',
        'test_type',
        'start_date',
        'end_date',
        'desc',
        'scope',
        'credentials',
        'sat_process',
        'retesting',
        'env',
        'members',
        'tmp',
        'expected_result',
        'updated_uat',
        'uat_attendance',
        'uat_result',
        'other',
        'remarks',
        'status',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members()
    {
        return $this->hasMany(Members::class, 'project_id');
    }

    public function scenarios()
    {
        return $this->hasMany(Scenario::class, 'project_id');
    }

    public function issue()
    {
        return $this->hasMany(Issue::class, 'project_id');
    }
}
