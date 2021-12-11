<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable')->withPivot('id');
    }
}
