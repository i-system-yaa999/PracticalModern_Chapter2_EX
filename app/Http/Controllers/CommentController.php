<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Comment;
use App\Models\Like;

class CommentController extends Controller
{
    public function getcomment(Request $request)
    {
        return Comment::where('tweets_id', $request->tweets_id)->get();
    }
    public function addcomment(Request $request)
    {
        Comment::create([
            "tweets_id" => $request->tweets_id,
            "comment_name" => $request->comment_name,
            "comment" => $request->comment,
        ]);
        return response()->json(['message' => 'Successfully create comment']);
    }
}
