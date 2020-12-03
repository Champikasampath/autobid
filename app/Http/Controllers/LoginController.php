<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @var array
     */
    private $auctionUsers = [];

    public function __construct()
    {
        $this->auctionUsers = config('auction.users');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        try {
            $un = $request->input('username');
            $pw = $request->input('password');

            if($this->auctionUsers[$un]['password'] == $pw) {
                $request->session()->put('AuctionUser', $this->auctionUsers[$un]);
                return redirect('/')->with('message', 'Successfully logged in!');
            }
            return redirect('/login')->with('error', 'Invalid credentials!');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->forget('AuctionUser');
        return redirect('/login')->with('message', 'Good bye!');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function displayLoginPage()
    {
        return view('login.login');
    }
}
