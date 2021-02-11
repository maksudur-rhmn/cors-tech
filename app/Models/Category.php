<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCourse()
    {
      return $this->hasMany('\App\Models\Course');
    }

    public function getSubCategory()
    {
      return $this->hasMany('\App\Models\SubCategory');
    }
}
