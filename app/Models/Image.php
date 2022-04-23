<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagePath', 'blog_post_id',
    ];

    public function blogPost(){
        return $this->belongsTo(BlogPost::Class);
    }
}
