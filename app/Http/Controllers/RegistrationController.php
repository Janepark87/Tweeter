<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Validate the form

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'  // form 작성시 password_confirmation이라고 적어야함.  password match 확인해 줌.
        ]);

        // 새로 가입을 할 때, 비밀번호에 대한 해쉬패스워드를 지정해 줘야 함.
        $data = request(['name', 'email', 'password']);
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        //Create and save the User
        $user = User::create($data);

        // Sign them in.
        auth()->login($user);

        // Redirect to the home page.
        return redirect('/tweets'); 
    }
}
