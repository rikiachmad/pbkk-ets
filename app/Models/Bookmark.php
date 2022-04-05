<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['book'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeType($query, $book)
    {
        return $query->whereHas('book', function ($query) use ($book) {
            $query->where('book_type', $book);
        });
    }

    public static function isExist($book_id, $user_id)
    {
        if(Bookmark::where([
            ['book_id', '=', $book_id],
            ['user_id', '=', $user_id],
        ])) {
            return true;
        }

        return false;
    }
}
