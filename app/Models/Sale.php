<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'course_id',
        'payment_id',
        'price',
    ];

    public function getCourse()
    {
      return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function getUser()
    {
      return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
