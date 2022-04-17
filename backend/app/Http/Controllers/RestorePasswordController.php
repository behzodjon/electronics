<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetNewPasswordRequest;
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

    public function setNewPassword(SetNewPasswordRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->whereHas('passwordReset', function ($query) use ($data) {
            $query->where('token',  $data['code']);
        })->first();

        if (!$user) {
            throw ValidationException::withMessages(['code' => 'Invalid code...']);
        }

        $user->update(['password' => bcrypt($data['password'])]);
        $user->passwordReset()->delete();

        return response()->noContent();
    }
}
