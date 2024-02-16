<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    protected $table = 'form_draft';

    protected $fillable = [
        'project_id',
        'values',
    ];

    protected $casts = [
        'values' => 'json'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function test_level()
    {
        return $this->belongsTo(TestLevel::class);
    }
}
