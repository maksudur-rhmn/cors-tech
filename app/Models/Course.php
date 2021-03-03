<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCategory()
    {
      return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function getSubCategory()
    {
      return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'id');
    }

    public function getLessons()
    {
      return $this->hasMany('App\Models\Lesson', 'course_id', 'id')->orderBy('serial', 'asc');
    }

    public function getUser()
    {
      return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function getReviews()
    {
      return $this->hasMany('App\Models\Course', 'course_id', 'id');
    }
}
