<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'project';
    protected $primaryKey       = 'id_project';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllProject()
    {
        $projectModel = new \App\Models\ProjectModel();
        $teamsProjectModel = new \App\Models\TeamsProjectModel();
        $team = new \App\Models\TeamModel();
        $clientModel = new \App\Models\ClientModel();
        $taskModel = new \App\Models\TaskModel();

        // 1 ambil semua data pada tabel project
        // dapatkan id_project_manager dan cari pada tabel team
        // dapatkan id_team dan cari pada tabel teams_project kemudian ambil semua data pada tabel teams_project
        // setelah itu dapatkan id_team dan cari pada tabel team dapatkan nama team
        // output yang dihasilkan adalah nama project, nama project manager, dan nama team dari teams_project

        $project = $projectModel->orderBy('id_project', 'DESC')->findAll();
        $projects = [];
        foreach ($project as $key) {
            // dapatkan id_project_manager
            $id_project_manager = $key['id_project_manager'];
            // dapatlan id_team pada tabel project
            $teamProject = $teamsProjectModel->where('id_project', $key['id_project'])->findAll();

            // dapatkan id_client
            $id_client = $key['id_client'];
            $clientName = $clientModel->select('name')->where('id_client', $id_client)->first();

            $teamProjectName = [];
            foreach ($teamProject as $item) {
                $id_team = $item['id_team'];
                // dapatkan nama team
                $teamProjectNames = $team->select('name')->where('id_team', $id_team)->first();
                // dapatkan email team
                $teamProjectEmail = $team->select('email')->where('id_team', $id_team)->first();

                // merge dengan teamProjectName
                $teamProjectName[] = [
                    'name' => $teamProjectNames['name'],
                    'email' => $teamProjectEmail['email'],
                ];
            }

            // dapatkan nama project manager
            $projectManager = $team->select('name')->where('id_team', $id_project_manager)->first();
            // tampilkan semua data
            $projects[] = [
                'id_project' => $key['id_project'],
                'name' => $key['name'],
                'description' => $key['description'],
                'price' => $key['price'],
                'client_name' => $clientName['name'],
                'project_manager' => $projectManager['name'],
                'teamProject' => $teamProjectName,
                'status' => $key['status'],
                'start_date' => $key['start_date'],
                'end_date' => $key['end_date'],
                'progress' => $key['progress'],
            ];
        }

        return $projects;
    }

    public function getProjectDetail($id)
    {
        $projectModel = new \App\Models\ProjectModel();
        $teamsProjectModel = new \App\Models\TeamsProjectModel();
        $team = new \App\Models\TeamModel();
        $clientModel = new \App\Models\ClientModel();
        $taskModel = new \App\Models\TaskModel();
        $activityModel = new \App\Models\ActivityModel();

        // cari project berdasarkan $id
        $project = $projectModel->where('id_project', $id)->first();

        // dapatkan id_client
        $id_client = $project['id_client'];
        $clientName = $clientModel->select('name')->where('id_client', $id_client)->first();

        // dapatkan id_project_manager
        $id_project_manager = $project['id_project_manager'];
        // dapatkan nama project manager
        $projectManager = $team->select('name')->where('id_team', $id_project_manager)->first();

        // dapatkan id_team pada tabel project
        $teamProject = $teamsProjectModel->where('id_project', $id)->findAll();
        $teamProjectName = [];
        foreach ($teamProject as $item) {
            $id_team = $item['id_team'];
            // dapatkan nama team
            $teamProjectNames = $team->select('name')->where('id_team', $id_team)->first();
            $teamProjectName[] = $teamProjectNames['name'];
        }

        // dapatkan semua task pada project
        $taskProject = $taskModel->where('id_project', $id)->findAll();


        $taskProjects = [];
        foreach ($taskProject as $key) {
            $id_task = $key['id_task'];
            $activities = $activityModel->where('task_id', $id_task)->findAll();

            $activity = [];
            foreach ($activities as $item) {
                $id_team = $item['id_team'];
                $teamName = $team->select('name')->where('id_team', $id_team)->first();
                $activity[] = [
                    'activity' => $item['activity'],
                    'team_name' => $teamName['name'],
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at'],
                ];
            }

            $taskProjects[] = [
                'id_task' => $key['id_task'],
                'task' => $key['task'],
                'file' => $key['file'],
                'status' => $key['status'],
                'activity' => $activity,
            ];
        }

        $data = [
            'id_project' => $project['id_project'],
            'name' => $project['name'],
            'description' => $project['description'],
            'price' => $project['price'],
            'client_name' => $clientName['name'],
            'project_manager' => $projectManager['name'],
            'teamProject' => $teamProjectName,
            'status' => $project['status'],
            'start_date' => $project['start_date'],
            'end_date' => $project['end_date'],
            'progress' => $project['progress'],
            'tasks' => $taskProjects,
        ];
        return $data;
    }
}
