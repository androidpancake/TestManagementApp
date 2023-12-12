<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ADMIN');
    }

    public function index()
    {
        return view('user.index')->with([
            'title' => 'List Users',
            'description' => 'List of User involved at Project'
        ]);
    }
}
