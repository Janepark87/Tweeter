{{-- Follow 클릭하면 following 된 상태로 표시--}}
    <?php
    $if_null = App\Follower::where([
        ['follow_id', '=', auth()->user()->id],
        ['user_id', '=', $following->id]
    ])->count();

    if(!$if_null){?>
        <a href="{{url('unfollow/' . $following->id)}}" class="btn btn-danger btn-sm m-auto">Unfollow</a>
    <?php } else{?>
        <a href="{{url('follow/' . $following->id)}}" class="btn btn-success btn-sm m-auto">Follow</a>
    <?php } ?>
