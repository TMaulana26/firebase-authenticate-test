<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    protected $auth;

    public function __construct()
    {
        $this->auth = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials'))->createAuth();
    }

    public function authenticate()
    {
        $this->validate();

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($this->email, $this->password);
            $idTokenString = $signInResult->idToken();

            try {
                // Use the instance of $this->auth to call verifyIdToken
                $verifiedIdToken = $this->auth->verifyIdToken($idTokenString, true, 60);
            } catch (FailedToVerifyToken $e) {
                $this->addError('email', 'The token is invalid: ' . $e->getMessage());
                return; // Exit early if the token is invalid
            }

            $uid = $verifiedIdToken->claims()->get('sub');
            $firebaseUser = $this->auth->getUser($uid);

            $user = User::where('firebase_uid', $uid)->first();

            if (!$user) {
                // Redirect to register route if user not found
                return redirect()->route('register')->with([
                    'firebase_uid' => $uid,
                    'email' => $firebaseUser->email,
                    'name' => $firebaseUser->displayName ?? 'Unknown'
                ]);
            }

            // Log the user into the Laravel application
            \Auth::login($user, $this->remember);

            // Store the token in the session for further usage
            session(['firebase_token' => $idTokenString]);

            // Redirect to the intended route
            return redirect()->intended(route('home'));

        } catch (UserNotFound $e) {
            $this->addError('email', 'No user found with the provided email.');
        } catch (InvalidPassword $e) {
            $this->addError('password', 'The password is incorrect.');
        } catch (\Exception $e) {
            $this->addError('email', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
