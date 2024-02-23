<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function ldap(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd($credentials['username']);

        $domain = 'bankbsi.co.id';

        $ldapconfig['host'] = '10.0.1.201'; //CHANGE THIS TO THE CORRECT LDAP SERVER
        $ldapconfig['port'] = '389';
        $ldapconfig['basedn'] = 'dc=bankbsi,dc=co,dc=id'; //CHANGE THIS TO THE CORRECT BASE DN
        $ldapconfig['usersdn'] = 'ou=Users'; //CHANGE THIS TO THE CORRECT USER OU/CN
        $ds = ldap_connect($ldapconfig['host'], $ldapconfig['port']);

        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

        $dn = $ldapconfig['usersdn'] . "," . $ldapconfig['basedn'];

        if ($request->has('username')) {
            // dd($ds, $dn, $credentials);

            $bind = ldap_bind($ds, $credentials['username'] . '@' . $domain, $credentials['password']);
            if ($bind) {
                // dd($bind);
                echo 'success';
            } else {
                return back()->withErrors(['username' => 'Invalid Username', 'password' => 'Wrong Password']);
            }
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
