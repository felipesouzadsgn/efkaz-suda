<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function login()
    {
        return view('user/login');
    }

    public function index()
    {
        return view('user/index');
    }

    public function autorizar()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];

            if (password_verify($password, $pass)) {
                $session->set([
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('error', 'Senha incorreta.');
                return redirect()->to('/entrar');
            }
        } else {
            $session->setFlashdata('error', 'Email não encontrado.');
            return redirect()->to('/entrar');
        }
    }

    public function add()
    {
        // $session = session();
        // $simulationData = $session->get('step1Data');
        return view('user/adicionar');
    }

    public function registrar()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('email');

        if ($model->where('email', $email)->first()) {
            session()->setFlashdata('error', 'O e-mail já está registrado.');
            return redirect()->back()->withInput();
        }

        $model->save([
            'name' => $this->request->getPost('name'),
            'email' => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/admin');
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/entrar');
    }
}