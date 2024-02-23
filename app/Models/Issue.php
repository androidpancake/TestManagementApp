<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issue_severity';

    protected $fillable = [
        'issue',
        'status',
        'project_id',
        'closed_date'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
