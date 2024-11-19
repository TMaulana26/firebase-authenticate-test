<?php

namespace App\Http\Controllers\Auth;

use Kreait\Firebase\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials'))->createAuth();

    }
    public function __invoke(): RedirectResponse
    {
    //     $uid = Auth::user()->firebase_uid;
    //     $this->auth->revokeRefreshTokens($uid);
        Auth::logout();

        return redirect(route('home'));
    }
}
