<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\whispers\post;
use App\Models\whispers\Like;
use App\Models\whispers\Heart;
use App\Models\whispers\Comment;

class AdminController extends Controller
{
    //Admin Dashboard
    public function admin_dashboard(){
        $users = User::count();
        $posts = Post::count();
        $likes = Like::count();
        $comments = Comment::count();
        $hearts = Heart::count();

        return view("admin_dashboard.dashboard",['users'=>$users,'posts'=>$posts,'likes'=>$likes,'comments'=>$comments,'hearts'=>$hearts]);
    }

     public function create()
    {
        // $posts = Post::all();
        return view("admin_dashboard.whispers_create");
    }


     public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'content'=> 'required',
        ]);

        $po = new Post;
        $po->name = $request->name;
        $po->content = $request->content;
        $po->user_id = auth()->user()->id;
        $po->save();

        $message = $po->name." post was successfully added.";
        return redirect()->back()->with("success",$message);
    }

    
    public function delete($id){
             $post = Post::findOrFail($id);
        return view("admin_dashboard.whispers_delete",['post'=>$post]);

    }
    

        public function destroy(string $id)
    {
             $posts = Post::findOrFail($id);
        if(auth()->user()->role !== 'admin' && auth()->user()->id !== $posts->user_id){
            return abort(403,"Out of bounds!!!");
        } 
        $postsName = $posts->name;
        $posts->delete();

        $message = $postsName." post was successfully Deleted.";
        return redirect()->route("admin.whispers")->with("success",$message);
    }


    public function admin_whispers()
    {
        $posts = Post::with('user')->withCount(['likes','hearts','comments'])->get(); 

        return view("admin_dashboard.whispers",['post'=>$posts]);
    }


}
