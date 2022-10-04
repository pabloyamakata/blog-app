<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn($name) => Str::slug($name)
        );
    }
}
