<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'status',
    ];

    public function post() 
    {
        return $this->belongTo(Post::class);
    }

    public function user()
    {
        return $this->belongTo(User::class)
    }
}