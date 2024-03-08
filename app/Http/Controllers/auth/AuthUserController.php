<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\LoginRequest as RequestsLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthUserController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->intended('/dashboard');
        }


        return back()->withErrors(['username' => 'Invalid Username', 'password' => 'Wrong Password']);
    }

    public function ldap(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        $remember_me = $request->has('remember') ? true : false;

        $domain = 'bankbsi.co.id';

        $ldapconfig['host'] = '10.0.1.201';
        $ldapconfig['port'] = '389';
        $ldapconfig['basedn'] = 'dc=bankbsi,dc=co,dc=id';
        $ldapconfig['usersdn'] = 'ou=Users';
        $ds = ldap_connect($ldapconfig['host'], $ldapconfig['port']);

        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

        $dn = $ldapconfig['usersdn'] . "," . $ldapconfig['basedn'];

        try {
            $bind = ldap_bind($ds, $credentials['username'] . '@' . $domain, $credentials['password']);
        } catch (RequestsLoginRequest $e) {
            throw $e;
        }

        // dd($bind);
        if ($bind) {
            if (Auth::attempt($credentials, $remember_me)) {
                return redirect()->intended('/dashboard');
            } else {
                throw ValidationException::withMessages([
                    'username' => 'Invalid Username'
                ]);
            }
        } else {
            return back();
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
