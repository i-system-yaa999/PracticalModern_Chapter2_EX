<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Comment;
use App\Models\Like;

class LikeController extends Controller
{

    public function countup(Request $request)
    {
        $likeuser = Like::where('tweets_id', $request->tweets_id)->first();
        if (is_null($likeuser) || $likeuser->like_name != $request->like_name) {
            Tweet::find($request->tweets_id)->increment('nice_count');
            Like::create([
                "tweets_id" => $request->tweets_id,
                "like_name" => $request->like_name,
            ]);
            $mode = 'inc';
        } else {
            Tweet::find($request->tweets_id)->decrement('nice_count');
            Like::where('tweets_id', $request->tweets_id)->delete();
            $mode = 'dec';
        }
        return response()->json(['message' => 'Successfully complete countup mode:' . $mode]);
    }
    public function getcount(Request $request)
    {
        return Tweet::find($request->id)->nice_count;
    }
}
