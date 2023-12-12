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
        'start_date',
        'end_date',
        'desc',
        'scope',
        'sat_process',
        'retesting',
        'tmp',
        'uat_result',
        'other',
        'env',
        'type',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
