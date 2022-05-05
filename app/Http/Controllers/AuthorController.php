<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthor;
use App\Models\Author;
use App\Models\Profile;
use App\Notifications\AuthorCreated;

use Illuminate\Http\Request;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('authors.index', ['authors' => Author::with('profile')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthor $request)
    {
        $validated = $request->validated();
        $author = Author::create($validated);
        $profile = new Profile();
        $profile->author_id = $author->id;
        $profile->fill($validated)->save();

        // notification should be sent if a new author has been stored
        $user = auth()->user();
        $user->notify(new AuthorCreated($author));

        $request->session()->flash('status', 'Author ' . $author->authorName . ' was created!');
        return redirect()->route('authors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('authors.show', ['author' => Author::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('authors.update', ['author' => Author::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAuthor $request, $id)
    {
        $author = Author::findOrFail($id);
        $profile = $author->profile;
        $validated = $request->validated();
        $author->update($validated);
        $profile->update($validated);
        
        $request->session()->flash('status', 'Author ' . $author->name . ' was updated!');

        return redirect()->route('authors.show', ['author' => $author->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $author = Author::findOrFail($id);
        $profile = $author->profile;
        $profile->delete();
        $author->delete();

        session()->flash('status', 'The Author' . $id . 'was deleted!');
        
        return redirect()->route('authors.index');

    }
}
