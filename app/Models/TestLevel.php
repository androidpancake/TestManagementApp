<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestLevel extends Model
{
    use HasFactory;

    protected $table = 'test_levels';

    protected $fillable = [
        'type',
        'description'
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function draft()
    {
        return $this->hasMany(Draft::class);
    }
}
