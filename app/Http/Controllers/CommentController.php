<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Comment;
use Auth;
use DB;
use App\User;


class CommentController extends Controller
{
    public function addTweetComment(Request $request, Tweet $tweet)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $tweet->comments()->save($comment);

        return back()->withComment('Your comment has posted!!');
    }

    // public function addReplyComment(Request $request, Comment $comment)
    // {   // comment 엔에 수많은 comments
    //     $this->validate($request, [
    //         'body'=>'required'
    //     ]);
    //
    //     $reply = new Comment();
    //     $reply->body = $request->body;
    //     $reply->user_id = auth()->user()->id;
    //
    //     $comment->comments()->save($reply);
    //
    //     return back()->withMessage('Reply Created!!');
    // }


    public function edit($tweet_id, $comment_id)
    {
        $tweet = Tweet::find($tweet_id);
        $comment = Comment::find($comment_id);

        $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);
        // User total tweeets
        $id = Auth::user()->id;
        $tweets = DB::table('tweets')->where('user_id', $id)->get();
        $tweetsCount = count($tweets);

        // follow button & total count
        $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
        $followingCount = count($followees);

        return view('comments.commentedit', compact(['tweet','comment','users','followingCount','tweetsCount']));
    }

    public function update(Request $request, $tweet_id, $comment_id)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $tweet = Tweet::find($tweet_id);
        $comment = Comment::find($comment_id);
        $comment->body = request('body');

        $comment->update($request->all());

        return redirect()->route('tweets.show', [$tweet->id])->withMessage('Comment Updated!');
    }

    public function delete($tweet_id, $comment_id)
    {   // commentdelete page로 갈 수있게끔 유도
        $tweet = Tweet::find($tweet_id);
        $comment = Comment::find($comment_id);

        $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);
        // User total tweeets
        $id = Auth::user()->id;
        $tweets = DB::table('tweets')->where('user_id', $id)->get();
        $tweetsCount = count($tweets);

        // follow button & total count
        $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
        $followingCount = count($followees);

        return view('comments.commentdelete', compact(['tweet','comment','users','followingCount','tweetsCount']));
    }

    public function destroy($tweet_id, $comment_id)
    {
        Comment::destroy($comment_id);
        return redirect('/tweets/'.$tweet_id)->withErrors('Comment Deleted!');
    }
}
