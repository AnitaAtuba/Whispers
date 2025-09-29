<?php

namespace App\Http\Controllers\Whispers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\whispers\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit()
    {
        //
        $user = auth()->user();
        //  dd($user);
        return view('whispers.profile',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $user= Auth::user();

        $request->validate([
            'username'=>'required',
        ]);
        
        
        $user->username = $request->username;
        $user->id = auth()->user()->id;
        $user->save();

        return redirect()->route("dashboard.profile")->with('success','Username Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
