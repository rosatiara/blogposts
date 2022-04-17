<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    private $blogposts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false
        ]
    ];

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
            $query->where('created_at', '>', Carbon::now()->subMonths(6));
        },])->get();
        return view('blogposts.index', ['posts' => $posts]);

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
    public function store(Request $request)
    {
        $validated = $request->validated();
        $blogpost = new BlogPost();
        $blogpost->blogPostTitle = $validated['blogPostTitle'];
        $blogpost->blogPostContent = $validated['blogPostContent'];
        $blogpost->blogPostIsHighlight = $request['blogPostIsHighlight']== 'on' ? 1 : 0;

        $blogpost->save();
        $request->session()->flash('status', 'The Blog Post was created!');
        
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
        $blogpost->fill($validated);
        $blogpost->blogPostIsHighlight = $request['blogPostIsHighlight'] == 'on' ? 1 : 0;
        $blogpost->save();

        $request->session()->flash('status', 'Blog Post was updated!');
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
