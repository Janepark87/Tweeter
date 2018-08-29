<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionsController extends Controller
{
    public function __construct()
    {
        // 오직 케스트만 아래 과정을 거쳐라. 단 logout만 뺴고,
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //만약에 로그인시도를 해서 실패할 경우, 다시 로그인페이지로 돌아가고,
        if (! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }
            //로그인에 성공하면, 홈페이지로 가라!
            return redirect('/tweets');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
