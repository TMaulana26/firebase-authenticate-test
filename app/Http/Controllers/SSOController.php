<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use App\Models\Client;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;

class SSOController extends Controller
{
    public function redirect(Request $request)
    {
        $clientId = $request->query('client_id');
        $clientSecret = $request->query('client_secret');

        // Verify client credentials
        $client = Client::where('client_id', $clientId)
            ->where('client_secret', $clientSecret)
            ->first();

        if (!$client) {
            return response()->json(['error' => 'Invalid client credentials'], 401);
        }

        // Store the `return_to` URL and client data in the session
        session(['return_to' => $client->redirect_uri]);

        // Redirect to the login page
        return redirect()->route('home');
    }

    public function redirectToClient()
    {
        // Get the client URI from the session
        $clientUri = session('return_to');

        // Check if the client URI exists
        if (!$clientUri) {
            // Handle error, redirect somewhere else, or return an error message
            return redirect()->route('home')->withErrors('No return URL found.');
        }
        // Authenticate the user (assuming user is already logged in)
        $user = auth()->user();
        $firebaseToken = session('firebase_token');

        // Generate a JWT token for the authenticated user
        $payload = [
            'sub' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'iat' => time(),
            'exp' => time() + 3600, // Token expires in 1 hour
            'aud' => $clientUri,
            'token' => $firebaseToken
        ];

        $client = Client::where('redirect_uri', $clientUri)->first()->client_id;
        $key = substr(hash('sha256', $client, true), 0, 32);

        $encrypterToken = new Encrypter($key , 'AES-256-CBC');
        $token = $encrypterToken->encrypt(json_encode($payload));

        // Redirect the user to the client with the token as a query parameter
        return redirect()->away($clientUri . '?token=' . urlencode($token));
    }
}
