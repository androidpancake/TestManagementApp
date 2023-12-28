<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestStep extends Model
{
    use HasFactory;

    protected $table = 'test_steps';
    protected $fillable = [
        'test_step_id',
        'test_step',
        'expected_result',
        'category',
        'severity',
        'status',
        'case_id'
    ];

    public function case()
    {
        return $this->belongsTo(TestCase::class, 'case_id');
    }
}
