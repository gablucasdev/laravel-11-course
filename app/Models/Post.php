<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'status',
        'visibility',
    ];

    protected static function booted()
    {
        static::ceating(fucntion ($post) {
            if (empty($post->$slug)) {
                $post->slug = Str::slug($post->$title);
            }
        });
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
    }
}