<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('index');
        // return request('home');
    }

    public function about()
    {
        $name = 'Saifudin Mahara';
        return view('about', ['nama' => $name]);
    }
}
