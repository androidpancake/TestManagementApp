<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'project';

    protected $fillable = [
        'name',
        'jira_code',
        'test_level_id',
        'test_type',
        'start_date',
        'end_date',
        'desc',
        'scope',
        'credentials',
        'sat_process',
        'retesting',
        'env',
        'tmp',
        'expected_result',
        'updated_uat',
        'uat_attendance',
        'uat_result',
        'other',
        'tmp_remark',
        'updated_remark',
        'uat_remark',
        'uat_attendance_remark',
        'other_remark',
        'is_generated',
        'published',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

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

    public function test_level()
    {
        return $this->belongsTo(TestLevel::class, 'test_level_id');
    }
}
