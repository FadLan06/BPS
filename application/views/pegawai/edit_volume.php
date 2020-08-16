<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Tambah Data Rincian Volume
                <!-- <a href="<?= base_url('Admin/Tmbh_FormPer/' . $this->uri->segment(4)) ?>" class="btn btn-warning btn-sm float-right">Selesai</a> -->
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="<?= base_url('Pegawai/Aksi') ?>" method="POST">
                                <div class="form-group">
                                    <label for="uraian">Uraian/Penjelasan</label>
                                    <input type="hidden" class="form-control" id="kd_volume" name="kd_volume" value="<?= $this->uri->segment(3); ?>">
                                    <input type="hidden" class="form-control" id="kd_trans" name="kd_trans" value="<?= $this->uri->segment(4); ?>">
                                    <input type="text" class="form-control" id="uraian" name="uraian" value="">
                                    <?= form_error('uraian', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="text" class="form-control" id="volume" name="volume" value="">
                                    <?= form_error('volume', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" value="">
                                    <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Satuan</label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="">
                                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <button type="submit" name="rinvol1" class="btn btn-info float-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table class="table table-bordered responsive" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr align="center">
                                        <th width="5%">#</th>
                                        <th width="25%">Uraian/Penjelasan</th>
                                        <th>Volume</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total = 0;
                                    foreach ($rinvolume as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->uraian_vol ?></td>
                                            <td><?= $row->volume_vol ?></td>
                                            <td><?= $row->satuan_vol ?></td>
                                            <td><?= $row->harga_vol ?></td>
                                            <td><?= $row->biaya_vol ?></td>
                                            <td align="center">
                                                <a title="Hapus Data" href="<?= base_url('Pegawai/hps_Volume1/') . $row->kd_rincianvol . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $total += $row->biaya_vol ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <form action="<?= base_url('Pegawai/Aksi') ?>" method="POST">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="kd_volume" name="kd_volume" value="<?= $this->uri->segment(3); ?>">
                                    <input type="hidden" class="form-control" id="kd_trans" name="kd_trans" value="<?= $this->uri->segment(4); ?>">
                                    <input type="hidden" class="form-control" id="hasil" name="hasil" value="<?= $total ?>">
                                </div>
                                <button type="submit" name="total1" class="btn btn-warning">Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->