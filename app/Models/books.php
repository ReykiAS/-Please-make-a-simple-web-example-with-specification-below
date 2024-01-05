<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $fileable = [
        'title',
        'category_id',
        'author_id',
        'rating_id',
        'voter',

    ];
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function author()
    {
        return $this->belongsTo(author::class);
    }
    public function ratings()
    {
        return $this->hasMany(ratings::class);
    }

    
}

