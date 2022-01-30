<?php

namespace App\Controllers\User;
use App\Controllers\PageController;
//use CodeIgniter\Controller;
use App\Models\UserModel;


class LoginController extends PageController
{
    public function index()
    {
        $session = session();
        if($_SESSION['isSignedIn']){
            return redirect()->to('/dashboard');
        }
        helper(['form']);
        echo view('common/header');
        echo view('user/login');
        echo view('common/footer');
    }

    public function signin()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();

        if($data){
            $hash = $data['password'];
            $pwd_verify = password_verify($password, $hash);
            if($pwd_verify){
                $ses_data = [
                    'userID' => $data['userID'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'rights' => explode(',', $data['rights']),
                    'isSignedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'wrong password.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'wrong email.');
            return redirect()->to('/login');
        }
    }
}