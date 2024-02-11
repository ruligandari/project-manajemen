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
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Project</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard/project/add') ?>" method="POST">
                        <div class="mb-3">
                            <label for="task" class="form-label">Nama Project</label>
                            <input type="text" class="form-control" placeholder="Nama Project" id="task" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" placeholder="Deskripsi" id="task" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Client</label>
                            <select name="client" class="form-select">
                                <option value="">Pilih Client</option>
                                <?php foreach ($client as $item) : ?>
                                    <option value="<?= $item['id_client'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="task" class="form-label">Tanggal Awal</label>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <input class="form-control" type="date" placeholder="Tanggal Awal" id="example-date-input" name="start_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="task" class="form-label">Tanggal Akhir</label>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <input class="form-control" type="date" placeholder="Tanggal Akhir" id="example-date-input" name="end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="task" class="form-label">Project Manager</label>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <select name="project-manager" class="form-select js-example-basic-multiple2" data-placeholder="Silahkan PIlih">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="task" class="form-label">Team</label>
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <select name="teams[]" class="form-control js-example-basic-multiple" multiple="multiple" data-placeholder="Silahkan PIlih">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Budget Project</label>
                            <input type="number" class="form-control" placeholder="2.500.000" id="task" name="budget" required>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark">Tambah Project</button>
                    </form>
                </div>
            </div>
        </div>
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
                $('.js-example-basic-multiple2').empty();
                // Loop melalui data dan tambahkan setiap opsi ke Select2
                $.each(response, function(index, item) {
                    console.log(item);
                    $('.js-example-basic-multiple').append('<option value="' + item.id + '">' + item.name + '</option>');
                });
                $.each(response, function(index, item) {
                    console.log(item);
                    $('.js-example-basic-multiple2').append('<option value="' + item.id + '">' + item.name + '</option>');
                });
                // Inisialisasi ulang Select2 setelah mengisikan opsi
                $('.js-example-basic-multiple').select2();
                $('.js-example-basic-multiple2').select2();
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });

    });
</script>
<?= $this->endSection(); ?>