<?php
namespace App\Controllers\User;
use App\Controllers\PageController;

class Logout extends PageController
{
    public function index(){
        session();
        session_destroy();
        return redirect()->to('/');
    }
}