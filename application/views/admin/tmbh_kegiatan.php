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
                    <h6 class="m-0 font-weight-bold text-white">Data Program</h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message1'); ?>
                    <form action="<?= base_url('Admin/Aksi') ?>" method="POST">
                        <div class="form-group">
                            <label for="kode">KODE</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $prog['kode_pro'] ?>" readonly>
                            <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="program">Nama Program</label>
                            <textarea name="program" id="program" class="form-control" cols="30" rows="3" readonly><?= $prog['program'] ?></textarea>
                            <?= form_error('program', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="biaya">Jumlah Biaya</label>
                            <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $prog['biaya'] ?>" readonly>
                            <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <a href="<?= base_url('Admin/POK') ?>" class="btn btn-info float-right">Kembali</a>
                        <!-- <button type="submit" name="simpan" class="btn btn-info float-right">Lanjut</button> -->
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <h6 class="m-0 font-weight-bold text-white">Input Data Kegiatan</h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10%">KODE</th>
                                    <th>Nama Kegiatan</th>
                                    <th width="25%">Jumlah Biaya</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($keg->result() as $row) : ?>
                                    <tr>
                                        <td><?= $row->kode_keg ?></td>
                                        <td><?= $row->kegiatan ?></td>
                                        <td><?= $row->biaya ?></td>
                                        <td align="center">
                                            <a title="Tambah Data" href="<?= base_url('Admin/tmbh_output/') . $row->kd_kegiatan; ?>" class="text-info"><i class="fas fa-plus-circle"></i></a>
                                            <a title="Hapus Data" href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/Aksi') ?>" method="POST">
                    <div class="form-group">
                        <label for="kode">KODE</label>
                        <input type="hidden" class="form-control" id="kd_program" name="kd_program" value="<?= $this->uri->segment(3); ?>">
                        <input type="text" class="form-control" id="kode" name="kode">
                        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Nama Kegiatan</label>
                        <textarea name="kegiatan" id="kegiatan" class="form-control" cols="30" rows="3"></textarea>
                        <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="biaya">Jumlah Biaya</label>
                        <input type="text" class="form-control" id="biaya" name="biaya">
                        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <button type="submit" name="save" class="btn btn-info float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>