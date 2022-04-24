<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\BlogPost;

class BlogPostCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BlogPost $blogpost)
    {
        $this->blogpost = $blogpost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // email configuration
        $mail = $this
            ->from('thanks4YourBlogPost@blogpost.gipe')
            ->cc('cc-addres@blogpost.gipe')
            ->subject("New Blog Post titled as {$this->blogpost->blogPostTitle}")
            ->view('emails.blogposts.created', ['blogPostContent'=>$this->blogpost->blogPostContent]);
        
            if ($this->blogpost->image)
                $mail->attachFromStorage($this->blogpost->image->imagePath, 'blogPostImage.jpeg', ['mime'=>'image/jpeg']);
            return $mail;
            
    }
}
