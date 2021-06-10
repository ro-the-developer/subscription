<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTokenRequest;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Get authentication token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getToken(getTokenRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response(['message' => 'Invalid Credentials'], 401);
        }
        $token = Str::random(64);
        $user = User::find(auth()->user()->id);
        $user->api_token = $token;
        $user->save();

        return response(['access_token' => $token]);
    }
}

