<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      return view('greeting');
    }

    public function show($id)
    {
      return 'User id is '.$id;
    }
}
