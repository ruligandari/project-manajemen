<?= $this->extend('layouts/layouts'); ?>
<?= $this->section('header'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= base_url() ?>/assets/img/curved-images/curved1.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body  mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $project['name'] ?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        Project Manager: <?= $project['project_manager'] ?>
                    </p>
                    <p class="mb-0 font-weight-bold text-sm">
                        Client: <?= $project['client_name'] ?>
                    </p>
                    <div class="progress-wrapper w-100 mx-auto mb-3 mt-3">
                        <div class="progress-info mb-2">
                            <div class="progress-percentage">
                                <span class="badge bg-gradient-primary"><?= $project['status'] ?> <?= $project['progress'] ?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-gradient-info w-<?= floor($project['progress'] / 10) * 10 ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active " href="#detail-project">
                                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(603.000000, 0.000000)">
                                                    <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                    </path>
                                                    <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                                    <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ms-1">Detail Project</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 " href="#tugas">
                                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>document</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(154.000000, 300.000000)">
                                                    <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                    <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ms-1">Tugas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>settings</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(304.000000, 151.000000)">
                                                    <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                    </polygon>
                                                    <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                                    <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="ms-1">Setting</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <!-- sweet alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session()->getFlashdata('success') ?>'
            });
        </script>
    <?php endif ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session()->getFlashdata('error') ?>'
            });
        </script>
    <?php endif ?>
    <div class="row">
        <div class="col-12 col-xl-12" id="detail-project">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Detail Project</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Project"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <p class="text-sm">
                        <?= $project['description'] ?>
                    </p>
                    <p class="text-sm">
                        Budget Project: Rp. <?= number_format($project['price'], 0, ',', '.') ?>
                    </p>
                    <hr class="horizontal gray-light my-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Team Project:</strong></li>
                        <?php foreach ($project['teamProject'] as $item) : ?>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"><?= $item ?></strong></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-lg-0 mb-4" id="tugas">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Task Project</h6>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTaskModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Task Baru</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php foreach ($project['tasks'] as $task) : ?>
                        <div class="col-12 col-xl-12 mt-2">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-11 d-flex align-items-center" <?= $task['status'] == 'Not Started' ? '' : 'data-bs-toggle="collapse" data-bs-target="#collapseExample' . $task['id_task'] . '" aria-expanded="false" aria-controls="collapseExample' . $task['id_task'] . '"' ?>>
                                            <h6 class="mb-0"><?= $task['task'] ?></h6>
                                            <span class="badge bg-gradient-success mx-3"><?= $task['status'] ?></span>
                                        </div>
                                        <div class="col-1 my-auto text-end ">
                                            <div class="dropdown float-lg-end pe-4">
                                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                                    <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;"><i class="fa fa-trash text-danger"></i>&nbsp;&nbsp;Delete</a></li>
                                                    <?php if (!$task['status'] == 'Done' || $task['status'] == 'On Progress') : ?>
                                                        <li><button class="dropdown-item border-radius-md" onclick="markAsDone('<?= $task['id_task'] ?>','<?= $task['task'] ?>', '<?= $project['id_project'] ?>')"><i class="fa fa-check text-secondary"></i>&nbsp;&nbsp;Selesai</button></li>
                                                    <?php endif ?>
                                                    <?php if ($task['status'] == 'Not Started') : ?>
                                                        <li><button class="dropdown-item border-radius-md" onclick="startTask('<?= $task['id_task'] ?>')"><i class="fa fa-check text-secondary"></i>&nbsp;&nbsp;Mulai Task</button></li>
                                                    <?php endif ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseExample<?= $task['id_task'] ?>">
                                    <div class="card card-body">
                                        <ul class="list-group">
                                            <?php foreach ($task['activity'] as $activity) : ?>
                                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                    <div class="d-flex flex-column">
                                                        <h6 class="mb-3 text-sm"><?= $activity['team_name'] . ' - ' . $activity['created_at'] ?></h6>
                                                        <?= $activity['activity'] ?>
                                                    </div>
                                                    <!-- <div class="ms-auto text-end">
                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="fas fa-trash-alt me-2"></i>Delete</a>
                                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                    </div> -->
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                        <form action="<?= base_url('dashboard/project/' . $project['id_project']) ?>" method="POST">
                                            <input type="hidden" name="id_task" value="<?= $task['id_task'] ?>">
                                            <input type="hidden" name="id_team" value="1">
                                            <textarea id="editor<?= $task['id_task'] ?>" name="activity" class="form-control">
                                            </textarea>
                                            <button class="btn btn-primary mt-2" type="submit">
                                                Tambah Aktivitas
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Task Baru</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard/project/task/' . $project['id_project']) ?>" method="POST">
                    <div class="mb-3">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" class="form-control" placeholder="Masukan Task" id="task" name="task" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="Not Started" selected>Not Started</option>
                            <option value="On Progress">On Progress</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    <?php foreach ($project['tasks'] as $items) : ?>
        ClassicEditor
            .create(document.querySelector('#editor<?= $items['id_task'] ?>'))
            .catch(error => {
                console.error(error);
            });

    <?php endforeach ?>

    function markAsDone(id_task, name, id_project) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Task " + name + " akan di tandai sebagai selesai",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Selesai'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('dashboard/project/task/mark-as-done/') ?>',
                    type: 'POST',
                    data: {
                        id_task: id_task,
                        id_project: id_project
                    },
                    success: function(res) {
                        console.log(res);
                        Swal.fire(
                            'Berhasil!',
                            'Task telah di tandai sebagai selesai, ' + res.progress + '%',
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    }
                });
            }
        })

    }

    function startTask(id) {
        $.ajax({
            url: '<?= base_url('dashboard/project/task/start-task/') ?>',
            type: 'POST',
            data: {
                id_task: id
            },
            success: function(res) {
                console.log(res);
                Swal.fire(
                    'Berhasil!',
                    'Task telah di mulai',
                    'success'
                ).then((result) => {
                    location.reload();
                });
            }
        });

    }
</script>

<?= $this->endSection(); ?>