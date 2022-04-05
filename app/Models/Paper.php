<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['book'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
