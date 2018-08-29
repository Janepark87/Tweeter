<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\Comment;
use Auth;
use Image;
use DB;
use App\User;
use App\Follower;
use App\Like;


class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function store(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'bio' => 'required',
        ]);
        User::create(request(['name','bio']));
        return back();
    }

    public function show(User $user, Tweet $tweet, $id)
    {
        $user = User::find($id);

        // Who to follow (로그인된 나를 제외한 다른 유저들의 데이터를 다 불러와라~!)
        //$users = User::latest()->where('id', '!=', Auth::user()->id)->paginate(3);

        // following list
        $followingUser = Follower::where('user_id', '=',  $user->id)
                        ->join('users', 'users.id', '=', 'follow_id')
                        ->get();

        return view('profiles.profile', compact(['user','users','tweets','followingUser']));
    }

    public function edit(User $user)
    {
        return view('profiles.profileEdit', compact(['user','tweet']));
    }

        public function update (Request $request)
    {
        //Handle the user upload of Avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/img/' . $filename ));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->name = request('name');
            $user->bio = request('bio');
            $user->update($request->all());

            return redirect()->route('profiles.show', $user->id)->withMessage('Profile Updated!');
        }
            $user = Auth::user();
            $user->update($request->all());
            return redirect()->route('profiles.show', $user->id);
    }

    public function delete(User $user)
    {
        return view('profiles.profileDelete', compact(['user','tweet']));
    }

    public function destroy(User $user)
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/');
    }


    public function follow($id)
    {
        $follow = New Follower;
        $follow->user_id = Auth::user()->id;
        $follow->follow_id = $id;
        $follow->save();

        return back();
    }

    public function unfollow($id)
    {
        Follower::where('user_id', Auth::user()->id)
                    ->where('follow_id', $id)
                    ->delete();
        return back();
    }

}
