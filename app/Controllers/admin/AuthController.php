<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use function App\Helpers\gravatar_url;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('admin/auth/login', $data);
    }

    public function auth()
    {
        // teamModel
        $teamModel = new \App\Models\TeamModel();
        helper('avatar');
        $email = $this->request->getPost('email');
        $password = $this->request->getVar('password');

        $team = $teamModel->where('email', $email)->first();

        if ($team) {
            if (password_verify($password, $team['password'])) {
                $data = [
                    'id' => $team['id_team'],
                    'name' => $team['name'],
                    'link_profile' => gravatar_url($team['email']),
                    'email' => $team['email'],
                    'role' => 'team',
                    'isLoggedIn' => true
                ];

                session()->set($data);

                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Email tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
