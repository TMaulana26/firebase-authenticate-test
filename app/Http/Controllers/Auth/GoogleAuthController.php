<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Kreait\Firebase\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class GoogleAuthController extends Controller
{
    public $checkUserPassword;
    protected $auth;

    public function __construct()
    {
        $this->auth = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials'))->createAuth();

    }
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $userName = $user->name;
        $userEmail = $user->email;
        $token = $user->token;

        $signInResult = $this->auth->signInWithIdpAccessToken('google.com', $token);
        $idTokenString = $signInResult->idToken();

        try {
            // Use the instance of $this->auth to call verifyIdToken
            $verifiedIdToken = $this->auth->verifyIdToken($idTokenString, true, 60);
        } catch (FailedToVerifyToken $e) {
            $this->addError('email', 'The token is invalid: ' . $e->getMessage());
            return; // Exit early if the token is invalid
        }

        $uid = $verifiedIdToken->claims()->get('sub');

        $checkUser = User::where('firebase_uid', $uid)->first();

        if ($checkUser) {
            session(['firebase_token' => $idTokenString]);
            Auth::login($checkUser, true);
            return redirect()->route('home');
        }
        $user = User::create([
            'firebase_uid' => $uid,
            'email' => $userEmail,
            'name' => $userName,
            'password' => $uid,
        ]);


        session(['firebase_token' => $idTokenString]);

        Auth::login($user, true);

        return redirect()->route('home');
    }
}
