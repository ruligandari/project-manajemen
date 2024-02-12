<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProjectModel;
use App\Models\ActivityModel;
use App\Models\ClientModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $activityModel = new ActivityModel();
        $clientModel = new ClientModel();
        $projects = $projectModel->getAllProject();

        $idLogin =  session()->get('id');

        $activity = $activityModel->overViewActivity($idLogin);

        // omset
        $omset = $projectModel->select('SUM(price) as omset')->get()->getRowArray();
        $client = $clientModel->select('COUNT(id_client) as client')->get()->getRowArray();
        $dashboardData = [
            'omset' => number_format($omset['omset'], 0, ',', '.'), // format rupiah
            'uangMasuk' => 0,
            'client' => $client['client'],
        ];
        $data = [
            'title' => 'Dashboard',
            'subtitle' => '',
            'projects' => $projects,
            'activity' => $activity,
            'dashboardData' => $dashboardData,
        ];

        return view('admin/dashboard/dashboard', $data);
    }
}
