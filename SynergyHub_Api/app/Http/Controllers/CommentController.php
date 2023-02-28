<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all(); 
        if($comments->count() > 0) {
            return $comments;
        } else {
            return [
                'status' => 404,
                'message' => 'No Comments Found'
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'message'  => 'string|required',
            'user_id' => 'required|integer',
            'idea_id' => 'required|integer'
        ]);

        Comment::create([
            'message' => $fields['message'],
            'user_id' => Auth::id(),
            'message' => $fields['message']
        ]);
        
        return response([
            'status' => '201',
            'message' => 'Comment Created Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $user_id)
    {
        $comment = Comment::where('id', $id)->where('user_id', $user_id)->first();
        if($comment) {
            Comment::destroy($id);
            return [
                'status' => 200,
                'message' => 'Comment Deleted Successfully'
            ];
        } else {
            return [
                'status' => 404,
                'message' => 'Comment Not Found'
            ];
        }
    }

    public function search(string $idea_id) {
        return Comment::where('idea_id', $idea_id)->get();
    }
}
