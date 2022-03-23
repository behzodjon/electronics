<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RestorePassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;

class RestorePasswordController extends Controller
{
    public function sendActivationCode(Request $request)
    {
        $request->validate(['login' => 'required']);

        $code = rand(100000, 999999);
        $user = User::where('email', $request->login)->first();

        if (!$user) {
            return response([
                'error' => 'The Provided credential is not correct'
            ], 422);
        }

        $user->passwordReset()->delete();
        $user->passwordReset()->create(['token' => $code]);

        Mail::to($user->email)->send(new RestorePassword($code));

        return response()->noContent();
    }

    public function setNewPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
            'code' => ['required', 'min:6'],
            'email' => 'required',
        ]);


        $user = User::where('email', $request->email)->whereHas('passwordReset', function ($query) use ($request) {
            $query->where('token', $request->code);
        })->first();

        if (!$user) {
            throw ValidationException::withMessages(['code' => 'Invalid code...']);
        }

        $user->update(['password' => bcrypt($request->password)]);
        $user->passwordReset()->delete();
        
        return response()->noContent();
    }
}
