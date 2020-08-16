<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <h6 class="m-0 font-weight-bold text-white">Input Data Program</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Admin/Aksi') ?>" method="POST">
                        <div class="form-group">
                            <label for="kode">KODE</label>
                            <input type="text" class="form-control" id="kode" name="kode">
                            <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="program">Nama Program</label>
                            <textarea name="program" id="program" class="form-control" cols="30" rows="3"></textarea>
                            <?= form_error('program', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="biaya">Jumlah Biaya</label>
                            <input type="text" class="form-control" id="biaya" name="biaya">
                            <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-info float-right">Lanjut</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->