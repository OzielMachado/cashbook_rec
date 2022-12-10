<?php namespace App\Controllers;

class User extends BaseController{

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index(){

        if($this->session->type === 'admin'){


            $modelUser = new \App\Models\UserModel();
            $users = $modelUser->findAll();
    
            return view('user/index', [
                'users' => $users,
            ]);

        } else {

            $this->session->setFlashData('errors', ['Permissão negada.']);
            return redirect()->to(base_url('dashboard/index'));
        }

    }

    public function create(){
        
        if($this->request->getPost()){

            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'user');
            $errors = $this->validation->getErrors();

            if(!$errors){

                $userModel = new \App\Models\UserModel();

                $user = new \App\Entities\User();

                $user->fill($data);

                $userModel->save($user);

                $id = $userModel->insertID();

                $segments = ['user', 'index'];

                $this->session->setFlashdata('success', 'Usuário adicionado com sucesso.');

                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);

        }

        if($this->session->type === 'admin'){

            return view('user/create');

        } else {

            return redirect()->to(base_url('home/index'));

        }
    }

    public function update(){

        if($this->session->type === 'admin'){


            $id = $this->request->uri->getSegment(3);

            $modelUser = new \App\Models\UserModel();

            if($this->request->getPost()){

                $data = $this->request->getPost();
                $this->validation->run($data, 'userupdate');
                $errors = $this->validation->getErrors();

                if(!$errors){

                    $userEntity = new \App\Entities\User();
                    $userEntity->fill($data);

                    $modelUser->save($userEntity);

                    $segments = ['user', 'index'];

                    $this->session->setFlashdata('success', 'Usuário alterado com sucesso.');

                    return redirect()->to(base_url($segments));
                }

            }

            $user = $modelUser->find($id);

            return view('user/update', [
                'user' => $user,
            ]);

        } else {

            return redirect()->to(base_url('home/index'));
        }
    }

    public function delete(){

        if($this->session->type === 'admin'){

            $id = $this->request->uri->getSegment(3);

            $modelUser = new \App\Models\UserModel();

            $modelUser->delete($id);

            $this->session->setFlashdata('success', 'Usuário deletado com sucesso.');

            return redirect()->to(base_url('user/index'));
        } else {

            return redirect()->to(base_url('home/index'));

        }

    }
}