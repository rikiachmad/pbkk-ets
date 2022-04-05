<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory, Sluggable;
    

    protected $guarded = ['id'];

    protected $without = ['bookmark'];

    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function textbook()
    {
        return $this->hasOne(Textbook::class);
    }

    public function magazine()
    {
        return $this->hasOne(Magazine::class);
    }

    public function paper()
    {
        return $this->hasOne(Paper::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSearch($query, $search)
    {
        $query->when($search ?? false, function($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        });
       
    }

    public function scopeSort($query, $sort)
    {
        $query->when($sort ?? false, function($query, $search) {
            return $query->orderBy('created_at', $search);
        });

        // dd($query);
    }

    public function scopeType($query, array $array)
    {
        return $query->where(function ($query) use ($array) {
            $i = 1;
            foreach($array as $items) {
                $query->orWhere('book_type', $items);
            }
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
