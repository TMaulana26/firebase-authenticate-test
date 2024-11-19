<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\Exception\Auth\EmailExists;
use Kreait\Firebase\Factory;

class AddPassword extends Component
{
    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';
    /** @var bool */
    public $remember = false;

    protected $auth;

    public $state;
    public $name;
    public $email;

    public function __construct()
    {
        $this->auth = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials'))->createAuth();
        $this->state = session('state');
        $this->name = session('name');
        $this->email = session('email');
    }

    public function createPassword()
    {
        if (!$this->state) {
            return redirect()->route('home');
        }


        $this->validate([
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $hashedPassword = Hash::make($this->password);
        $userProperties = [
            'email' => $this->email,
            'password' => $hashedPassword,
            'displayName' => $this->name,
        ];
        

        $createdUser = $this->auth->createUser($userProperties);

        $signInResult = $this->auth->signInWithEmailAndPassword($this->email, $hashedPassword);
        $idTokenString = $signInResult->idToken();


        // Optionally, store user details in a local database for application-specific data
        $user = User::create([
            'firebase_uid' => $createdUser->uid,
            'email' => $this->email,
            'name' => $this->name,
            'password' => $hashedPassword,
        ]);

        session(['firebase_token' => $idTokenString]);

        // Log the user in
        Auth::login($user, $this->remember);

        return redirect()->intended(route('home'));
    }
    public function render()
    {
        return view('livewire.auth.add-password')->extends('layouts.auth');
    }
}
