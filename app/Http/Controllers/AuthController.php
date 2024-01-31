<?php

namespace App\Http\Controllers;

use App\Mail\signIn;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AuthController extends CacheController
{
    /**
     * Processes the login form
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function login(Request $request)
    {
        if(Auth::User() != null) {
            return redirect()->route('home');
        }

        // find the user for the email.
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return view('welcome');
        }
 
        // create a signed URL for login
        $url = URL::temporarySignedRoute(
            'auth.sign-in',
            now()->addMinutes(30),
            ['user' => $user->id, 'remember' => $request->remember],
        );
 
        // send the email
        Mail::send(new signIn($user, $url));
 
        // inform the user
        return view('login_sent');
    }


    /**
     * Processes the actual login
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function signIn(Request $request, User $user)
    {
        // Check if the URL is valid
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        $remember = ($request->remember == 'on') ? true : false;

        // Authenticate the user and update email_verified_at
        $user->email_verified_at = now();
        $user->save();


        Auth::login($user, $remember);

        // Redirect to dashboard
        return redirect()->route('home');
    }

    /**
     * Processes the logout
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function logout(Request $request)
    {
         // logout
        Auth::logout();
        $request->session()->invalidate();
    
        // Redirect to homepage
        return redirect()->route('home');
    }

    public function getCode($team, $time) {
        // TODO - Use the cache to implement obsfucation of link parameters
        // A unique random password will be cached along with team info
        // When validating the link, the team info can be pulled from the cache again
        $url = URL::temporarySignedRoute(
            'auth.team',
            now()->addMinutes($time),
            ['team' => $team],
        );
        return $url;
    }

    public function joinTeam(Request $request) {
        // Check if team join code is valid
        if ($request->hasValidSignature()) {
            $request->session()->put('team', $request->team);
            return redirect()->route('demo');
        } 
        else {
            return response()->json(['error' => 'invalid code'], 403);
        }
    }
}
