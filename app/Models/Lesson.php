<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCourse()
    {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
}
