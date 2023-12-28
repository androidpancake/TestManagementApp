<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

    protected $table = 'test_cases';

    protected $fillable = [
        'case',
        'test_id'
    ];

    public function scenario()
    {
        return $this->belongsTo(Scenario::class, 'test_id');
    }

    public function step()
    {
        return $this->hasMany(TestStep::class, 'case_id', 'id');
    }
}
