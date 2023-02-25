<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likes = Like::all(); 
        if($likes->count() > 0) {
            return response([
                'Likes Count' => $likes->count()
            ], 200);
        } else {
            return [
                'status' => 404,
                'message' => 'No Likes Found'
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'idea_id' => 'required|integer',
            'comment_id' => 'required|integer'
        ]);

        Like::create($request->all());

        return response([
            'message' => 'Like Added Successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $user_id, string $idea_id, string $comment_id)
    {
        $like = Like::where('id', $id)->where('user_id', $user_id)->where('idea_id', $idea_id)->where('comment_id', $comment_id)->first();

        if($like) {
            Like::destroy($id);
            return response([
                'message' => 'Like Deleted Successfully'
            ], 200);
        } else {
            return response([
                'message' => 'Like Not Found'
            ], 404);
        }
    }

    public function search(string $idea_id)
    {
        return Like::where('idea_id', $idea_id)->get()->count();
    }
}
