<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table            = 'activity';
    protected $primaryKey       = 'id';
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

    public function overViewActivity($id)
    {
        $builder = $this->db->table('activity');
        // saya ingin mengeluarkan dengam hasil tabel activity yang memiliki id_team = $id
        $builder->where('id_team', $id);
        $builder->join('task', 'task.id_task = activity.task_id', 'left');
        // select semua kolom dari tabel activity order by
        $builder->select('activity.id, activity.activity, task.task, task.id_project, activity.created_at');
        // desc
        $builder->orderBy('activity.created_at', 'desc');
        // tampilkan 5 data
        $builder->limit(5);
        $query = $builder->get();
        // tambah model Project
        $projectModel = new ProjectModel();
        $dataActivity = $query->getResultArray();

        $dataBuilder = [];
        // looping $dataActivity
        foreach ($dataActivity as $value) {
            $idProject = $value['id_project'];
            // cari data
            $cariData = $projectModel->where('id_project', $idProject)->first();
            // build data
            $dataBuilder[] = [
                'id' => $value['id'],
                'activity' => $value['activity'],
                'task' => $value['task'],
                'project' => $cariData['name'],
                'created_at' => $value['created_at'],
            ];
        }

        return $dataBuilder;
    }
}
