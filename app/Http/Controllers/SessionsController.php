<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except' => 'destroy']);
    }
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(! auth()->attempt($request->only('email','password'),$request->has('remember'))){
            //flash('이메일 또는 비밀번호가 맞지 않습니다');

            //return back()->withInput();

            return $this->respondError('이메일 또는 비밀번호가 맞지 않습니다');
        }

        if(! auth()->user()->activated){
            auth()->logout();
            //flash('가입 확인해 주세요.');

            //return back()->withInput();
            return $this->respondError('가입 확인해 주세요.');
        }
        flash(auth()->user()->name . '님, 환영합니다.');
        return redirect()->intended('home');
    }

    public function destroy()
    {
        auth()->logout();
        flash('또 방문해 주세요.');
        return redirect('/');
    }

    public function respondError($message)
    {
        flash()->error($message);

        return back()->withInput();
    }
}
