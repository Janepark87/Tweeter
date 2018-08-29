<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tweet;
use Auth;
use App\User;
use App\Like;
use App\Follower;
use App\Comment;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth')->except(['index', 'show']);
     }

    public function index(User $user, Tweet $tweet, Comment $comment)
    {
        if (!Auth::guest()){

            $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3, ["*"], "users");

            // User total tweeets
            $id = Auth::user()->id;
            $tweets = DB::table('tweets')->where('user_id', $id)->get();
            $tweetsCount = count($tweets);

            // follow button & total count
            $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
            $followingCount = count($followees);

            $fArray = [auth()->id()];
                foreach($followees as $f){
                    $fArray[] = $f->follow_id;
                }
            $tweets = Tweet::latest()->whereIn('user_id', $fArray)->paginate(3, ["*"], "tweets");

            // $tweet = Tweet::find($id);
            // $user = User::find($id);
            // $comment = Comment::find($id);

        }
        return view('tweets.index', compact(['tweets','users','followingCount', 'tweetsCount']));

        //return view('tweets.index', compact(['tweets','users','followingCount', 'tweetsCount','tweet','user','comment']));
    }

    public function like($tweet_id)
    {
        $user_id = Auth::user()->id;
        $likes = DB::table('likes')->where([
            ['user_id', '=', $user_id],
            ['tweet_id', '=', $tweet_id]
        ])->count();

        if(! $likes){
            $like = new Like;
            $like->user_id = $user_id;
            $like->tweet_id = $tweet_id;
            $like->save();

            return back();
        }
        else{
            return back()->withErrors('You\'ve already liked the previously !');

        }
    }

    public function create(User $user, Tweet $tweet)
    {
        if(Auth::guest()){
            return redirect('/login');
        }else{
            $tweet = Tweet::find($tweet);
            $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);

            // User total tweeets
            $id = Auth::user()->id;
            $tweets = DB::table('tweets')->where('user_id', $id)->get();
            $tweetsCount = count($tweets);

            // follow button & total count
            $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
            $followingCount = count($followees);

            return view('tweets.create', compact(['tweet','users', 'followingCount', 'tweetsCount']));
        }
    }

    public function store(Request $request)
    {
        $users = User::where('id', '!=', Auth::user()->id)->paginate(5);
        //errors.php 실패했을시, 에로 메세지
        $this->validate(request(), [
            'body' => 'required'
        ]);

        Tweet::create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return redirect('/tweets')->withMessage('Tweet Created!');
    }

    public function show(User $user, Tweet $tweet)
    {
        if (!Auth::guest()){
            $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);
            // User total tweeets
            $id = Auth::user()->id;
            $tweets = DB::table('tweets')->where('user_id', $id)->get();
            $tweetsCount = count($tweets);

            // follow button & total count
            $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
            $followingCount = count($followees);

            return view('tweets.show', compact(['tweet','users','followingCount','tweetsCount']));
        } else {
            return redirect('/');
        }
    }

    public function edit(User $user, Tweet $tweet)
    {
        $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);
        // User total tweeets
        $id = Auth::user()->id;
        $tweets = DB::table('tweets')->where('user_id', $id)->get();
        $tweetsCount = count($tweets);

        // follow button & total count
        $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
        $followingCount = count($followees);

        // Check for correct user
        if(auth()->user()->id !== $tweet->user_id){
            return back()->withErrors('Not authenticated');
        }
        return view('tweets.edit', compact('users','tweet','followingCount','tweetsCount'));
    }

    public function update(Request $request, Tweet $tweet, User $user)
    {
        // Check for correct user
        if(auth()->user()->id !== $tweet->user_id){
            return back()->withErrors('Not authenticated');
        }

        $this->validate(request(), [
            'body' => 'required'
        ]);
        // $tweet->body = request('body');
        $tweet->update($request->all());

        return redirect()->route('tweets.show', $tweet->id)->withMessage('Tweet Updated!');
    }

    public function destroy(Tweet $tweet, User $user)
    {
        // Check for correct user
        if(auth()->user()->id !== $tweet->user_id){
            return back()->withErrors('Not authenticated');
        }

        $tweet->delete();
        return redirect()->route('tweets.index')->withErrors('Tweet Deleted!');
    }

    public function delete(Tweet $tweet, User $user)
    {
        // Check for correct user
        if(auth()->user()->id !== $tweet->user_id){
            return back()->withErrors('Not authenticated');
        }
        $users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);
        // User total tweeets
        $id = Auth::user()->id;
        $tweets = DB::table('tweets')->where('user_id', $id)->get();
        $tweetsCount = count($tweets);

        // follow button & total count
        $followees = DB::table('followers')->select('follow_id')->where('user_id', $id)->get();
        $followingCount = count($followees);

        //confirm delete the tweet!
        return view('tweets.delete', compact('users','tweet','followingCount','tweetsCount'));
    }
}
