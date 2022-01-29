<?php
namespace App\Controllers\User;
use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index(){
        session();
        session_destroy();
        return redirect()->to('/');
    }
}