<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;


class DashboardController extends BaseController
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