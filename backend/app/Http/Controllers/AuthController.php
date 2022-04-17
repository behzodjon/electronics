<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->numbers()
            ]
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('main')->plainTextToken;

        $oldCart = Cart::whereSessionId($request->sessionId)->first() ?? null;

        if (is_null($oldCart->user_id)) {
            $oldCart->user_id = $user->id;
            $oldCart->save();
        } else {
            Cart::create([
                'user_id'    => $user->id,
                'session_id' => session()->getId(),
            ]);;
        }

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }

        $user = Auth::user();

        $token = $user->createToken('main')->plainTextToken;


        $oldCart = Cart::whereSessionId($request->sessionId)->first() ?? null;
        if (is_null($oldCart->user_id)) {
            $oldCart->user_id = $user->id;
            $oldCart->save();
        } else {
            Cart::createCart();
        }


        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout()
    {
        $user = Auth::user();

        // Revoke the token that was used to authenticate the current request...
        $user->currentAccessToken()->delete();

        return response([
            'success' => true
        ]);
    }


    public function googleRedirect(Request $request)
    {
        try {
            $user = Socialite::driver('google')->scopes(['read:user', 'public_repo'])->userFromToken($request->token);

            // Check Users Email If Already There
            $isUser = User::where('email', $user->getEmail())->first();
            if (!$isUser) {
                $name = $user->getName() ?? "Test user";

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ], [
                    'name' => $name,
                    'email' => $user->getEmail(),
                    'password' => Hash::make($name . '@' . $user->getId())
                ]);
            } else {
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            $user = Auth::loginUsingId($saveUser->id);
            $token = $user->createToken('main')->plainTextToken;

            $oldCart = Cart::whereSessionId($request->sessionId)->first() ?? null;
            if (is_null($oldCart->user_id)) {
                $oldCart->user_id = $user->id;
                $oldCart->save();
            } else {
                Cart::createCart();
            }


            return response([
                'success' => true,
                'user' => $user,
                'token' => $token,
            ]);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
