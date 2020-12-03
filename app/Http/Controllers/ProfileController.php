<?php

namespace App\Http\Controllers;

use App\BL\AutoBidConfig;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function displaySettingsPage(Request $request)
    {
        $user = $request->session()->get('AuctionUser');
        $setting = AutoBidConfig::init()->get($user['id']);
        view()->share('setting', $setting);

        return view('profile.settings');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function configureAutoBid(Request $request)
    {
        $max_bid = $request->get('max_bid');
        $user = $request->session()->get('AuctionUser');
        $res = AutoBidConfig::init()->create($user['id'], $max_bid);
        return redirect()->back()->with('message', 'successfully saved');
    }
}
