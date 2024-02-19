<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TeamController extends BaseController
{
    public $teamModel;

    public function __construct()
    {
        $this->teamModel = new \App\Models\TeamModel();
    }

    public function index()

    {

        $data = [
            'title' => 'Team',
            'subtitle' => 'List Team',
            'data' => $this->teamModel->findAll()
        ];

        return view('admin/team/team', $data);
    }

    public function add()
    {
        $name = $this->request->getVar('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        // generate password otomatis dengan mengambil dari $name huruf kecil dan tampa spasi
        $password = str_replace(' ', '', strtolower($name));

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        // insert data
        try {
            $this->teamModel->insert($data);
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }
        return redirect()->to(base_url('dashboard/team'))->with('success', 'Data berhasil ditambahkan');
    }
}
