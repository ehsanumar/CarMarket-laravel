<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
        $comment = $request->validate([
            'comment' => ['string', 'min:3'],
            'car_id' => ['numeric', 'required'],
        ]);
        $comment = Comments::create([
            'comment' => $comment['comment'],
            'user_id' => auth()->id(),
            'car_id' => $comment['car_id'],
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($comment)
    {
        Comments::findOrFail($comment)->delete();
        return back();
    }
}
