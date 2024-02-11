<?= $this->extend('layouts/layouts'); ?>
<!-- header -->

<?= $this->section('header'); ?>

<?= $this->endSection(); ?>
<!-- content -->
<?= $this->section('content'); ?>
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
        <div class="col-6">
            <button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#addTaskModal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Customer Baru</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Customer</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Whatsapp</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terdaftar</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                use function App\Helpers\gravatar_url;

                                helper('avatar');
                                foreach ($data as $item) : ?>
                                    <!-- helper avatar -->

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?= gravatar_url($item['email']) ?>" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $item['name'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $item['email'] ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success"><?= $item['phone'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Customer Baru</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/customer/') ?>" method="POST">
                        <div class="mb-3">
                            <label for="task" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="task" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Email</label>
                            <input type="text" class="form-control" id="task" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Whatsapp</label>
                            <input type="text" class="form-control" id="task" name="phone" required>
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

    <!-- footer -->
    <?= $this->section('script'); ?>
    >
    <?= $this->endSection(); ?>