<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(4);   
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'title'=>"required|min:2",
        //         'content'=>"min:3"
        //     ],
        //     [
        //         'title.required'=>'The title is compulsory',
        //         'title.min'=>'The title is too short',
        //         'content.min'=>'The description is too short'
        //     ]
        // );

        // $data = $request->all();

        // $new_post = new Post();
        // $new_post->slug = Post::createSlug($new_post->title);
        // $new_post->fill($data);
        // $new_post->save();

        // return redirect()->route('admin.posts.show', $new_post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
           return view('admin.posts.show', compact('post')); 
        }
        //abort(404);
        abort(404, 'Il post che hai cercato non esiste');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if($post){
           return view('admin.posts.edit', compact('post')); 
        }
        abort(404, 'Il post che hai cercato non esiste');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title'=>"required|min:2",
                'content'=>"min:3"
            ],
            [
                'title.required'=>'The title is compulsory',
                'title.min'=>'The title is too short',
                'content.min'=>'The description is too short'
            ]
        );

        $data = $request->all();

        //controllo sullo slug:
        //genero un nuovo slug solo se il titolo del post è stato modificato
        if($data['title'] != $post->title){
            $data['slug'] = Post::createSlug($data['title']);
        }

        $post->update($data);

        return redirect()->route('admin.posts.show', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
