<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable = [
        'name',
        'jira_code',
        'test_level',
        'test_type',
        'start_date',
        'end_date',
        'desc',
        'scope',
        'issue',
        'credentials',
        'sat_process',
        'retesting',
        'tmp',
        'uat_result',
        'other',
        'env',
        'type',
        'members',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members()
    {
        return $this->hasMany(Members::class, 'project_id', 'id');
    }
}
