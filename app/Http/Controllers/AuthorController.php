<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthor;
use App\Models\Author;
use App\Models\Profile;
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
        $author = new Author();
        $profile = new Profile();
        $author->name = $validated['authorName'];
        $profile->email = $validated['authorEmail'];
        $author->save();
        $author->profile()->save($profile);
        $request->session()->flash('status', 'Author Created!');
        return redirect()->route('authors.show', ['authors' => $author->id]);

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
        $profile = Profile::Where('id', $id)->first();
        $validated = $request->validated();
        $author->fill($validated);
        $author->name = $validated['authorName'];
        $profile->email = $validated['authorEmail'];
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
        $author->delete();
        session()->flash('status', 'The Author' . $author->name . 'was deleted!');
        return redirect()->route('authors.index');

    }
}
