<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.change');
    }

    public function store(ChangePasswordRequest $request)
    {
        $data = $request->only('username', 'password');
        // dd($data);
        if (Auth::attempt($data)) {

            $user = User::where('username', $data['username'])->first();
            // dd($user);
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('login');
        } else {
            return back();
        }
    }
}
