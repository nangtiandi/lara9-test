<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('index');
    }
    public function read(){
        $posts = Post::when(request('keyword'),function ($query){
            $keyword = request('keyword');
            $query->where('title','like',"%$keyword%");
        })->paginate(5)->withQueryString();
//        dd($posts);
        return view('read',compact('posts'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){

        $request->validate([
            'title' => 'bail|required|max:225',
            'description' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

//        Post::created([
//            'title' => $request->title,
//            'description' => $request->description,
//        ]); #go to post model and add fillable

        #Post::create($request->all());

        return redirect()->back()->with('success','Successfully created your post.');
    }
    public function show($id){

        $post = Post::findOrFail($id);
        return view('show',compact('post'));

    }
    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success','Successfully deleted your post.');
    }
    public function edit($id){
        $post = Post::findOrFail($id);
        return view('edit',compact('post'));
    }
    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|min:10',
            'description' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();

        return redirect()->route('post.read')->with('success','Successfully updated your post.');
    }
}
