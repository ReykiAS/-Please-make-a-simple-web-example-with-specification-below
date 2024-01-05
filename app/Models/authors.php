<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authors extends Model
{
    use HasFactory;
    protected $fileable = [
        'authorName',

    ];
    protected $table ='authors';

    public function books()
    {
        return $this->hasMany(books::class);
    }
}
