<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Comment;

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
        return response()->json(['message' => 'Successfully complete destroy']);
    }
    public function countup(Request $request){
        Tweet::find($request->id)->increment('nice_count');
        // $item=Tweet::find($request->id);
        // $item->increment('nice_count');
        // $item->save();
        return response()->json(['message' => 'Successfully complete countup']);
    }
    public function getcount(Request $request){
        return Tweet::find($request->id)->nice_count;
    }
    public function getcomment(Request $request){
        return Comment::where('tweets_id',$request->tweets_id)->get();
    }
    public function addcomment(Request $request){
        Comment::create([
            "tweets_id"=>$request->tweets_id,
            "comment_name"=>$request->comment_name,
            "comment"=>$request->comment,
        ]);
        return response()->json(['message' => 'Successfully create comment']);
    }
}
