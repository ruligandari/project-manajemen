<?= $this->extend('layouts/layouts'); ?>
<?= $this->section('header'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
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
            <a class="btn bg-gradient-dark mb-0" href="<?= base_url('dashboard/project/add') ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;Project Baru</a>
        </div>
    </div>
    <div class="row mt-4">
        <?php

        use function App\Helpers\gravatar_url;

        foreach ($project as $item) : ?>
            <div class="col-lg-4 mb-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <div class="avatar-group mt-2">
                                        <?php
                                        helper('avatar');
                                        $no_gambar = 1;
                                        foreach ($item['teamProject'] as $key) : ?>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $key['name'] ?>">
                                                <img src="<?= gravatar_url($key['email']) ?>" alt="team">
                                            </a>
                                        <?php endforeach ?>
                                    </div>
                                    <p class="mb-1 text-bold"><?= $item['client_name'] ?></p>
                                    <h5 class="font-weight-bolder"><?= $item['name'] ?></h5>
                                    <p class="mb-1 text-sm"><?= $item['start_date'] ?></p>
                                    <p class="mb-1 text-sm"><?= $item['end_date'] ?></p>
                                    <div class="progress-wrapper w-100 mx-auto mb-3">
                                        <div class="progress-info mb-2">
                                            <div class="progress-percentage">
                                                <span class="badge bg-gradient-primary"><?= $item['status'] ?> <?= $item['progress'] ?>%</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info w-<?= $item['progress'] ?>" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="<?= base_url('dashboard/project/' . $item['id_project']) ?>">
                                        Lihat Project
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- <div class="row mt-4">
        <div class=" col-lg-12 text-center">
            <h8 class="">Belum Ada Project</h8>
        </div>
    </div> -->

</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>

<script>
    $(document).ready(function() {

        $.ajax({
            url: '<?= base_url('dashboard/getTeams') ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Bersihkan opsi yang sudah ada di Select2
                $('.js-example-basic-multiple').empty();
                // Loop melalui data dan tambahkan setiap opsi ke Select2
                $.each(response, function(index, item) {
                    console.log(item);
                    $('.js-example-basic-multiple').append('<option value="' + item.id + '">' + item.name + '</option>');
                });
                // Inisialisasi ulang Select2 setelah mengisikan opsi
                $('.js-example-basic-multiple').select2();
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });

    });
</script>
<?= $this->endSection(); ?>