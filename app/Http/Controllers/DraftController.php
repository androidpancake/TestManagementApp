<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function read()
    {
        $draft = Draft::all();

        return $draft;
    }

    public function index()
    {
        $data = $this->read();
        return view('draft.index', compact('data'));
    }
}
