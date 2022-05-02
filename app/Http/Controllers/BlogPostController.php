<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Mail\BlogPostCreated;
use App\Models\BlogPost;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;



class BlogPostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select the posts in reverse order (newest to oldest) and transfer them to the view
        // return view('blogposts.index', ['blogposts'=>BlogPost::all()]);
        $posts = BlogPost::withCount(['comments', 'comments as new_comments' => function (Builder $query) {
            $query->where('created_at', '>=', now()->sub(12, 'hour'));
        },])->get();
        return view('blogposts.index', compact('blogposts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $validated = $request->validated();
        $validated['id']=$request->user()->id;
        $validated['blogPostIsHighlight']=$request['blogPostIsHighlight'] == 'on' ? 1 : 0;
        $blogpost = BlogPost::create($validated);

        if ($request->hasFile('blogPostImage')){
            $path = $request->file('blogPostImage')->store('blogPostImages');
            $blogpost->image()->save(Image::create(['imagePath' => $path]));
        }
      

        $request->session()->flash('status', 'The Blog Post was created!');
        Mail::to($request->user())->send(new BlogPostCreated($blogpost));
        return redirect ()->route('blogposts.show', ['blogpost'=>$blogpost->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->blogposts[$id]), 404);
        return view('blogposts.show', ['blogpost' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('blogposts.update', $blogpost);
        return view('blogposts.edit', ['blogpost'=>BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $validated = $request->validated();
        
        $validated ['blogPostIsHighlight'] = $request['blogPostIsHighlight'] == 'on' ? 1 : 0;
        if ($request->hasFile('blogPostImage')){
            $path = $request->file('blogPostImage')->store('blogPostImages');
            if ($blogpost->image){
                Storage::delete($blogpost->image->imagePath);
                $blogpost->image->imagePath=$path;
                $blogpost->image->save();
            }
            else {
                $blogpost->image()->save(Image::create(['imagePath'=>$path]));
            }
        }
        
        $blogpost->update($validated);
        $request->session()->flash('status', 'Blog post was updated!');
        return redirect()->route('blogposts.show', ['blogpost'=>$blogpost->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $this->authorize('blogposts.delete', $blogpost);
        
        $comments = $blogpost->comments;
        foreach($comments as $comment)
            $comment->delete();
        $blogpost->delete();

        session()->flash('status','Blog Post with the ID' . $id .' was deleted!');

        return redirect()->route('blogposts.index');
    }
}
