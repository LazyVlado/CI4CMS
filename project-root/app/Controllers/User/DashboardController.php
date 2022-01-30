<?php

namespace App\Controllers\User;
use App\Controllers\PageController;


class DashboardController extends PageController
{
    public function index()
    {
        $session = session();
        $rights = $session->get('rights');

        echo view('common/header');
        echo view('user/dashboard');
        echo view('common/footer');
    }

}