<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_login;

class Authentication extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function act()
    {
        $session = session();
        $model = new M_login();
        $username = $this->request->getVar('input_username');
        $password = $this->request->getVar('input_password');
        $data = $model->where('user_username', $username)->first(); //cari spesifik column
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass); //password_verify pencocokan data yang telah terhash
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_nama'     => $data['user_nama'],
                    'user_email'    => $data['user_email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/Authentication');
            }
        }else{
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/Authentication');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Authentication');
    }
}
