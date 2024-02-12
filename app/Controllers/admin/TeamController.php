<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TeamController extends BaseController
{
    public function index()
    {
        $teamModel = new \App\Models\TeamModel();
        $data = [
            'title' => 'Team',
            'subtitle' => 'List Team',
            'data' => $teamModel->findAll()
        ];

        return view('admin/team/team', $data);
    }
}
