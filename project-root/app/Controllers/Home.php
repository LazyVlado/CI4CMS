<?php

namespace App\Controllers;

class Home extends PageController
{
    public function index()
    {
        return view('welcome_message');
    }
}
