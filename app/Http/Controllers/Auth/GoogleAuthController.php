<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Kreait\Firebase\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Kreait\Firebase\Exception\Auth\EmailExists;

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
        $state = $user->token;

        $checkUserPassword = User::where('email', $userEmail)->first();

        if (!$checkUserPassword) {
            // Handle the case when the user does not exist
            return redirect()->route('add-password')->with([
                'name' => $userName,
                'email' => $userEmail,
                'state' => $state
            ]);
        } else {
            // Check if the user already exists in database
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {                
                $signInResult = $this->auth->signInWithIdpAccessToken('google.com', $state);
                $idTokenString = $signInResult->idToken();
                
                session(['firebase_token' => $idTokenString]);
                Auth::login($existingUser, true);
                
                return redirect()->route('home');
            } else {
                // Create the new user in Firebase and the local database
                $userProperties = [
                    'email' => $userEmail,
                    'password' => $checkUserPassword->password,
                    'displayName' => $userName,
                ];

                $createdUser = $this->auth->createUser($userProperties);

                // Store user details in the local database
                $user = User::create([
                    'firebase_uid' => $createdUser->uid,
                    'email' => $userEmail,
                    'name' => $userName,
                    'password' => $checkUserPassword->password,
                ]);

                // Auto-login the user
                $signInResult = $this->auth->signInWithEmailAndPassword($userEmail, $checkUserPassword->password);
                $idTokenString = $signInResult->idToken();

                session(['firebase_token' => $idTokenString]);

                Auth::login($user, true);

                return redirect()->route('home');
            }
        }
    }
}
