<?php

namespace App\Http\Controllers\Whispers;
use App\Models\Whispers\Comment;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whispers\Post;

use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $comments = Comment::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $comments = Comment::all();
        return view("whispers.post",['comment'=>$comments]); 
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeAjax(Request $request,$id)
    {
        $request->validate([
            'content'=>'required|string|max:1000'
        ]);

        $post = Post::findOrFail($id);
        $comment = $post->comments()->create([
                'user_id' => auth()->id(),
                'content'=>$request->content,
        ]);

        return response()->json([
                'success'=>true,
                'comment'=>[
                    'id' =>$comment->id,
                    'user' =>$comment->user->username,
                    'content' =>$comment->content,
                    'created' =>$comment->created_at->diffForHumans(),
                ]
        ]);
    }
}
