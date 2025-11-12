<?php

namespace App\Http\Controllers\Whispers;
use App\Models\Whispers\Post;
use App\Models\Whispers\Like;
use App\Models\Whispers\Heart;
use App\Models\Whispers\Comment;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();
        // $likes = $user->likes()->count();
        // $hearts = $user->hearts()->count();
        // $comments = $user->comments()->count();

        $likes = Post::where('user_id', $user->id)->withCount('likes')->get()->sum('likes_count');
        $hearts = Post::where('user_id', $user->id)->withCount('hearts')->get()->sum('hearts_count');
        $comments = Post::where('user_id', $user->id)->withCount('comments')->get()->sum('comments_count');


        return view('whispers.dashboard' ,['totalLikes'=> $likes,'totalHearts'=> $hearts,'totalComments'=> $comments]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $posts = Post::all();
        return view("whispers.create_whisper");
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        if(auth()->user()->id != $post->user_id){
            return abort(403,"Out of bounds!!!");
        }
        return view("whispers.mywhispers_edit",['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $post = Post::findOrFail($id);
        if(auth()->user()->id != $post->user_id){
            return abort(403,"Out of bounds!!!");
        } 
         $request->validate([
            'name'=> 'required',
            'content'=> 'required',

        ]);

       
        $post->name = $request->name;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->save();

        $message = $post->name." post was successfully Updated.";
        return redirect()->route("dashboard.mywhispers")->with("success",$message);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
             $posts = Post::findOrFail($id);
        if(auth()->user()->id != $posts->user_id){
            return abort(403,"Out of bounds!!!");
        } 
        $postsName = $posts->name;
        $posts->delete();

        $message = $postsName." post was successfully Deleted.";
        return redirect()->route("dashboard.mywhispers")->with("success",$message);
    }

    public function delete($id){
             $post = Post::findOrFail($id);
        return view("whispers.mywhispers_delete",['post'=>$post]);

    }

    public function mywhispers(){
    
        $posts = Post::where('user_id', auth()->id())->withCount(['likes','hearts','comments'])->get();
        return view('whispers.mywhispers',['post'=>$posts]);
    }



    public function like($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        
        $post->likes()->toggle($user->id);
        return response()->json([
            'success'=>true,
            'count'=>$post->likes()->count()
        ]);
    }



     public function heart($id)
    {
        $post = Post::findOrFail($id);
         $user = auth()->user();


        $post->hearts()->toggle($user->id);
        return response()->json([
            'success'=>true,
            'count'=>$post->hearts()->count(),
            // 'hearted'=>$post->hearts->contains($user->id),
        ]);
    }


}
