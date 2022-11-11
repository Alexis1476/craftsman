<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'anonymousID',
        'firstName',
        'lastName',
        'phoneNumber',
        'email'
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'visitor_activities')->withTimestamps();
    }
}
