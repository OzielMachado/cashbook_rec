<?php namespace App\Controllers;

class Moviment extends BaseController{

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index(){

        $modelMoviment = new \App\Models\MovimentModel();
        $moviments = $modelMoviment->select('moviment.id, moviment.description, moviment.date, moviment.value, moviment.type, user.name')->join('user', 'moviment.user_id=user.id', 'left')->get();
        
        return view('moviment/index', [
            'moviments' => $moviments,
        ]);
    }

    public function create(){
        
        if($this->request->getPost()){

            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'moviment');
            $errors = $this->validation->getErrors();

            if(!$errors){

                $movimentModel = new \App\Models\MovimentModel();

                $moviment = new \App\Entities\Moviment();

                $moviment->fill($data);

                $moviment->user_id = 1;
                $moviment->date = date('Y-m-d H:i:s');

                $movimentModel->save($moviment);

                $id = $movimentModel->insertID();

                $segments = ['moviment', 'index'];

                $this->session->setFlashdata('success', 'Movimento adicionado com sucesso.');

                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);

        }

        if($this->session->type === 'admin'){

            return view('moviment/create');
        } else {

            $this->session->setFlashData('errors', ['Permissão negada.']);
            return redirect()->to(base_url('moviment/index'));

        }
    }

    public function update(){

        if($this->session->type === 'admin'){

            $id = $this->request->uri->getSegment(3);

            $modelMoviment = new \App\Models\MovimentModel();

            if($this->request->getPost()){

                $data = $this->request->getPost();
                $this->validation->run($data, 'moviment');
                $errors = $this->validation->getErrors();

                if(!$errors){

                    $movimentEntity = new \App\Entities\Moviment();
                    $movimentEntity->fill($data);

                    $modelMoviment->save($movimentEntity);

                    $segments = ['moviment', 'index'];

                    $this->session->setFlashdata('success', 'Movimento alterado com sucesso.');

                    return redirect()->to(base_url($segments));
                }

            }

            $moviment = $modelMoviment->find($id);

            return view('moviment/update', [
                'moviment' => $moviment,
            ]);

        } else {

            $this->session->setFlashData('errors', ['Permissão negada.']);
            return redirect()->to(base_url('moviment/index'));
        }
    }

    public function delete(){

        if($this->session->type === 'admin'){

            $id = $this->request->uri->getSegment(3);

            $modelMoviment = new \App\Models\MovimentModel();

            $modelMoviment->delete($id);

            $this->session->setFlashdata('success', 'Movimento deletado com sucesso.');

            return redirect()->to(base_url('moviment/index'));

        } else {

            $this->session->setFlashData('errors', ['Permissão negada.']);
            return redirect()->to(base_url('moviment/index'));
        }

    }
}