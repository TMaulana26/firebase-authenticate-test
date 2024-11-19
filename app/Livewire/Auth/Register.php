<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\Exception\Auth\EmailExists;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';
    protected $auth;

    public function __construct()
    {
        $this->auth = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials'))->createAuth();

    }

    public function mount()
    {
        // Pre-fill fields from session if available
        $this->name = session('name', $this->name);
        $this->email = session('email', $this->email);
    }

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);


        try {
            $userProperties = [
                'email' => $this->email,
                'password' => $this->password,
                'displayName' => $this->name,
            ];

            $createdUser = $this->auth->createUser($userProperties);

            // Optionally, store user details in a local database for application-specific data
            $user = User::create([
                'firebase_uid' => $createdUser->uid,
                'email' => $this->email,
                'name' => $this->name,
                'password' => Hash::make($this->password),
            ]);

            // Auto-login the user
            $signInResult = $this->auth->signInWithEmailAndPassword($this->email, $this->password);
            $idTokenString = $signInResult->idToken();

            session(['firebase_token' => $idTokenString]);

            // Log the user in
            Auth::login($user, true);


            return redirect()->intended(route('home'));

        } catch (EmailExists $e) {
            $this->addError('email', 'This email is already registered.');
        } catch (\Exception $e) {
            $this->addError('email', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
