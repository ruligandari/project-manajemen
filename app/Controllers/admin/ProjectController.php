<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityModel;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProjectController extends BaseController
{
    public function index()
    {
        $projectModel = new \App\Models\ProjectModel();
        $projects = $projectModel->getAllProject();

        $clientModal = new \App\Models\ClientModel();

        $data = [
            'title' => 'Project',
            'subtitle' => '',
            'project' => $projects,
            'client' => $clientModal->findAll(),
        ];
        return view('admin/project/project', $data);
    }

    public function show($id)
    {
        $projectModel = new \App\Models\ProjectModel();
        $project = $projectModel->getProjectDetail($id);
        $data = [
            'title' => 'Project',
            'subtitle' => 'Detail Project',
            'project' => $project,
        ];


        return view('admin/project/detail/detail', $data);
    }

    public function addActivity($id)
    {
        $id_project = $id;
        $id_task = $this->request->getPost('id_task');
        $id_team = $this->request->getPost('id_team');
        $activity = $this->request->getVar('activity');

        $activityModel = new ActivityModel();
        // date waktu sekarang dalam WIB
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'task_id' => $id_task,
            'activity' => $activity,
            'id_team' => $id_team,
            'created_at' => date('Y-m-d H:i:s')
        ];

        //   insert data
        try {
            $activityModel->insert($data);
        } catch (\Exception $e) {
            return redirect()->to('/dashboard/project/' . $id_project)->with('error', $e->getMessage());
        }
        // redirect back
        return redirect()->to('/dashboard/project/' . $id_project)->with('success', 'Activity has been added');
    }

    public function addTask($id)
    {
        $id_project = $id;
        $task = $this->request->getVar('task');
        $status = $this->request->getVar('status');

        $taskModel = new TaskModel();
        // date waktu sekarang dalam WIB
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'id_project' => $id_project,
            'task' => $task,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        //   insert data
        try {
            $taskModel->insert($data);
        } catch (\Exception $e) {
            return redirect()->to('/dashboard/project/' . $id_project)->with('error', $e->getMessage());
        }
        // redirect back
        return redirect()->to('/dashboard/project/' . $id_project)->with('success', 'Task has been added');
    }

    public function add()
    {
        $clientModal = new \App\Models\ClientModel();
        $data = [
            'title' => 'Project',
            'subtitle' => 'Tambah Project',
            'client' => $clientModal->findAll(),
        ];
        return view('admin/project/add/addProject', $data);
    }

    public function addProject()
    {
        $projectModel = new \App\Models\ProjectModel();
        $teamProjectModel = new \App\Models\TeamsProjectModel();
        $name = $this->request->getVar('name');
        $description = $this->request->getVar('description');
        $client = $this->request->getVar('client');
        $budget = $this->request->getVar('budget');
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $project_manager = $this->request->getVar('project-manager');
        $teams = $this->request->getVar('teams');

        //  cek jika team kosong
        if (empty($teams)) {
            return redirect()->to('/dashboard/project/add')->with('error', 'Team tidak boleh kosong');
        }


        // cek length team
        $data = [
            'name' => $name,
            'description' => $description,
            'id_client' => $client,
            'price' => $budget, // 'price' => 'budget
            'start_date' => $start_date,
            'end_date' => $end_date,
            'id_project_manager' => $project_manager,
        ];

        //   insert data
        try {
            $projectModel->insert($data);
            $project_id = $projectModel->getInsertID();

            if (count($teams) > 0) {
                // insert team
                foreach ($teams as $team) {
                    $dataTeam = [
                        'id_project' => $project_id,
                        'id_team' => $team,
                    ];
                    $teamProjectModel->insert($dataTeam);
                }
            }
        } catch (\Exception $e) {
            return redirect()->to('/dashboard/project/add')->with('error', $e->getMessage());
        }
        // redirect back
        return redirect()->to('/dashboard/project')->with('success', 'Project has been added');
    }

    public function getTeams()
    {
        $teamModel = new \App\Models\TeamModel();
        $teams = $teamModel->findAll();
        // buat menjadi data [0 => 'name', 1 => 'name']
        $data = [];
        foreach ($teams as $team) {
            $data[] = [
                'id' => $team['id_team'],
                'name' => $team['name']
            ];
        }
        return $this->response->setJSON($data);
    }
}
