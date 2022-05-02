<?php

namespace App\Models;
use App\Models\Image;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    
    protected $fillable = ['blogPostTitle',
                            'blogPostContent',
                            'blogPostIsHighlight',
                            'user_id'
];
    public function image(){
        return $this->hasOne(Image::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
