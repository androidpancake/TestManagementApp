<?php

namespace App\Http\Controllers\sit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitController extends Controller
{
    public function index()
    {
        return view('forms.sit.index')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);
    }

    public function f1()
    {
        return view('forms.form1')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);;
    }

    public function f2()
    {
        return view('forms.form2')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);;
    }

    public function f3()
    {
        return view('forms.form3')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);;
    }

    public function f4()
    {
        return view('forms.form4')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);;
    }

    public function f5()
    {
        return view('forms.form5')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);;
    }

    public function f6()
    {
        return view('forms.form6')->with([
            'title' => 'SIT Report',
            'description' => 'Please complete the documents to generate reports '
        ]);;
    }
}
