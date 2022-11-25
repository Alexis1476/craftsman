<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'why',
        'points',
        'laboratory',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
