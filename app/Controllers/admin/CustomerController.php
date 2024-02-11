<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CustomerController extends BaseController
{
    public function index()
    {

        $clientModel = new \App\Models\ClientModel();

        // cari semua data
        $dataClient = $clientModel->orderBy('id_client', 'DESC')->findAll();
        $data = [
            'title' => 'Customer',
            'subtitle' => '',
            'data' => $dataClient,

        ];
        return view('admin/customer/customer', $data);
    }

    public function add()
    {
        $clientModel = new \App\Models\ClientModel();
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
            $clientModel->insert($data);
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }
        return redirect()->to(base_url('dashboard/customer'))->with('success', 'Data berhasil ditambahkan');
    }
}
