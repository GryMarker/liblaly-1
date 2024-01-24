<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Http\Requests\StoreauthorRequest;
use App\Http\Requests\UpdateauthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::query()->paginate(10);
        return response(view("author.index", compact('authors')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('author.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreauthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreauthorRequest $request)
    {
        author::create($request->validated());

        return redirect()->route('authors');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        return response(view("author.edit", [
            'author' => $author
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateauthorRequest  $request
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateauthorRequest $request, $id)
    {
        $auther = author::find($id);
        $auther->name = $request->name;
        $auther->save();

        return redirect()->route('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        author::findorfail($id)->delete();
        return redirect()->route('authors');
    }
}
