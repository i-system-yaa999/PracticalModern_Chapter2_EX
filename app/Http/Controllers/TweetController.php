<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Comment;
use App\Models\Like;

class TweetController extends Controller
{
    public function newtweet(Request $request){
        Tweet::create([
            "tweet_name"=>$request->tweet_name,
            "tweet"=>$request->tweet,
            "nice_count"=>0,
        ]);
        return response()->json(['message' => 'Successfully newtweet create']);
    }
    public function gettweet(){
        return Tweet::all();
    }
    public function destroytweet(Request $request){
        Tweet::find($request->id)->delete();
        Comment::where('tweets_id',$request->id)->delete();
        Like::where('tweets_id',$request->id)->delete();
        return response()->json(['message' => 'Successfully complete destroy']);
    }
}
