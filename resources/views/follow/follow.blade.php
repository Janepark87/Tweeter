{{-- Follow 클릭하면 following 된 상태로 표시--}}
    <?php
    $if_null = App\Follower::where([
        ['follow_id', '=', $user->id],
        ['user_id', '=', auth()->user()->id]
    ])->count();

    if(!$if_null){?>
        <a href="{{url('follow/' . $user->id)}}" class="btn btn-success btn-sm m-auto">Follow</a>
    <?php } else{?>
        <a href="{{url('unfollow/' . $user->id)}}" class="btn btn-danger btn-sm m-auto">Unfollow</a>
    <?php } ?>
