<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\LoginRequest as RequestsLoginRequest;
use App\Models\User;
use Exception;
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

        // dd($credentials['username']);

        $remember_me = $request->has('remember') ? true : false;
        // $ldap = $this->ldap($credentials['username'], $credentials['password']);
        // dd($ldap);
        // $user = User::where('username', $credentials['username'])->exists();
        // dd($user);
        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return back()->withErrors([
                'username' => 'Invalid username',
                'password' => 'Invalid password'
            ]);
        }


        return back()->withErrors([
            'username' => "Can't authenticate",
            'password' => "Can't authenticate"
        ]);
    }

    private function checkdb(string $username)
    {
        User::where('username', $username)->exists();
    }

    public function ldap($username, $password)
    {
        // $credentials = $request->only('username', 'password');

        // $remember_me = $request->has('remember') ? true : false;

        $domain = 'bankbsi.co.id';

        $ldapconfig['host'] = '10.0.1.201';
        $ldapconfig['port'] = '389';
        $ldapconfig['basedn'] = 'dc=bankbsi,dc=co,dc=id';
        $ldapconfig['usersdn'] = 'ou=Users';
        $connection = ldap_connect($ldapconfig['host'], $ldapconfig['port']);

        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($connection, LDAP_OPT_NETWORK_TIMEOUT, 10);

        $dn = $ldapconfig['usersdn'] . "," . $ldapconfig['basedn'];

        try {
            $bind = ldap_bind($connection, $username . '@bankbsi.co.id', $password);
            if ($bind) {
                // if (Auth::attempt($credentials['username'], $remember_me)) {
                //     // dd(User::with('roles')->first());
                //     return redirect()->intended('/dashboard');
                // } else {
                //     throw ValidationException::withMessages([
                //         'username' => 'Invalid Username'
                //     ]);
                // }
                ldap_close($connection);
                return true;
            } else {
                return back()->withErrors([
                    'username' => 'Invalid LDAP Username'
                ]);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
