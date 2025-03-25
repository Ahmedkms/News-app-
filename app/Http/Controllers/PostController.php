<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::paginate();
        return view('posts.index', compact('posts'));
    }
    public function home(){
        $posts = Post::paginate();
        return view('home', compact('posts'));
    }



    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    public function search(Request $request){
        $searchFor = $request ->search;
        $posts = Post::where('description','like','%'.$searchFor.'%')->get();

        return view('posts.search', compact('posts'));
    }



    public function create(){
        return view('posts.add');
    }


    public function store(Request $request){
        $request->validate([
            'title'=> 'required|min:3|string',
            'description'=> 'required|string|max:1500',
            'user_id' => 'required|exists:users,id',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,

        ]);
        
        return back()->with('success','post added successfully');
    }



    public function destroy($id){
            $post = POST::findOrFail($id);
            $post->delete();
            return back()->with('success','post deleted succesfully');
    }   
     public function edit($id){
        $post = Post::findOrFail($id);
        $user = User::findOrFail($post->user_id);
        return view('posts.edit',compact('post','user'));           
    }





    public function update(Request $request,$id){
       $post =  Post::findOrFail($id);
        $request ->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3|max:1500',
            'user_id' => 'required|exists:users,id',
        ]);
        $post ->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('post-index')->with('success','post updated successfully');
    }

}
