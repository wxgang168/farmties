<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function verify($url)
    {
        $user = User::where('token', $url)->firstOrFail();

        if ($user) {
            if ($user->verified === 1) {
                flash()->error('Oops!!', 'It seems you have already been verified.');
            } else {
                $user->verified = 1;
                $user->save();
                flash()->success('Success!!', 'You have successfully been verified.');
            }
            return redirect()->route('user.dashboard');
        } else {
            flash()->error('Oops!!', 'Your token seems to be wrong.');
            return redirect()->route('welcome');
        }
    }
}
