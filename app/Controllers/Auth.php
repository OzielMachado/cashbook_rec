<?php namespace App\Controllers;

class Auth extends BaseController{

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function login(){

        if($this->request->getPost()){

            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if(!$errors){

                $userModel = new \App\Models\UserModel();

                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user = $userModel->where('email', $email)->first();

                if($user){

                    if($user->password === md5($password)){

                        $sessData = [
                            'name' => $user->name,
                            'id' => $user->id,
                            'type' => $user->type,
                            'isLoggedIn' => true,
                        ];

                        $this->session->set($sessData);
                        $this->session->setFlashData('success', 'Login realizado com sucesso.');

                        return redirect()->to(base_url('home/index'));
                    } else {

                        $this->session->setFlashData('errors', ['Senha incorreta.']);
                    }
                } else {

                    $this->session->setFlashData('errors', ['E-mail inválido.']);
                }
            } else {

                $this->session->setFlashData('errors', $errors);
            }

        }

        return view('login');
    }

    public function logout(){

        $this->session->destroy();
        return redirect()->to(base_url('auth/login'));

    }

    public function register(){
        
        if($this->request->getPost()){

            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'user');
            $errors = $this->validation->getErrors();

            if(!$errors){

                $userModel = new \App\Models\UserModel();

                $user = new \App\Entities\User();

                $user->fill($data);
                $user->type = 'counter';

                $userModel->save($user);

                $id = $userModel->insertID();

                $segments = ['auth', 'login'];

                $this->session->setFlashdata('success', 'Usuário cadastrado com sucesso.');

                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);

        }
        return view('register');
    }

}