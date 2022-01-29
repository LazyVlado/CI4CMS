<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
//use CodeIgniter\Controller;

use App\Models\UserModel;


class RegisterController extends BaseController
{

//    public function __construct(){
//        parent::__construct();
//    }

    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('common/header', $data);
        echo view('user/register', $data);
        echo view('common/footer', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'email'             => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
            'password'          => 'required|min_length[4]|max_length[50]',
            'confirmpassword'   => 'matches[password]'
        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $userData = [
                'username'      => $this->request->getVar('username'),
                'email'         => $this->request->getVar('email'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'created_date'  => date("Y-m-d H:i:s"),
            ];
            $model->save($userData);
            $this->sendRegistrationConfirmEmail($userData);
            return redirect()->to('login');
        }
        else{
            $data['validation'] = $this->validator;
            echo view('common/header', $data);
            echo view('user/register', $data);
            echo view('common/footer', $data);
        }
    }

    public function sendRegistrationConfirmEmail($userData){
        return false;
        $email = \Config\Services::email();

        $email->setFrom(SMTP_USER, COMMUNICATION_DISPLAY_NAME);
        $email->setTo($userData['email']);
        $email->setCC(COMMUNICATION_EMAIL_CC);

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        $email->send();
    }

}