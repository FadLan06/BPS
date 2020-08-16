<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php $kd_transaksi = $this->uri->segment(3); ?>
                    <?php $vol = $this->db->query("SELECT count(kd_transaksi) as total FROM tb_volume WHERE kd_transaksi=$kd_transaksi")->row(); ?>
                    <?php $trans = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $kd_transaksi])->row(); ?>
                    <?php if ($vol->total == $trans->volume_trans) : ?>
                        <form action="<?= base_url('Pegawai/Aksi') ?>" method="POST">
                            <div class="form-group">
                                <label for="uraian">Uraian/Penjelasan</label>
                                <input type="hidden" class="form-control" id="kd_transaksi" name="kd_transaksi" value="<?= $this->uri->segment(3); ?>">
                                <input type="text" class="form-control" id="uraian" name="uraian" value="" readonly>
                                <?= form_error('uraian', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control" id="volume" name="volume" value="" readonly>
                                <?= form_error('volume', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" value="" readonly>
                                <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <a href="" name="vol" class="btn btn-info float-right disabled">Simpan</a>
                        </form>
                    <?php else : ?>
                        <form action="<?= base_url('Pegawai/Aksi') ?>" method="POST">
                            <div class="form-group">
                                <label for="uraian">Uraian/Penjelasan</label>
                                <input type="hidden" class="form-control" id="kd_transaksi" name="kd_transaksi" value="<?= $this->uri->segment(3); ?>">
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
                            <button type="submit" name="vol" class="btn btn-info float-right">Simpan</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php if ($vol->total == $trans->volume_trans) : ?>
                        <a href="<?= base_url('Pegawai/tmbh_Anggaran/') . $this->uri->segment(3) ?>" class="btn btn-warning mb-3">Lanjut</a>
                    <?php else : ?>
                        <a href="<?= base_url('Pegawai/tmbh_Anggaran/') . $this->uri->segment(3) ?>" class="btn btn-warning mb-3 disabled">Lanjut</a>
                    <?php endif; ?>
                    <table class="table table-bordered responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th width="5%">#</th>
                                <th width="45%">Uraian/Penjelasan</th>
                                <th>Volume</th>
                                <th>Satuan</th>
                                <th>Jumlah</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($volume as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->uraian ?></td>
                                    <td><?= $row->volume ?></td>
                                    <td><?= $row->satuan ?></td>
                                    <td><?= $row->biaya ?></td>
                                    <td align="center">
                                        <a title="Tambah Data" href="<?= base_url('Pegawai/tmbh_Volume/') . $row->kd_volume . '/' . $this->uri->segment(3); ?>" class="text-info mr-2"><i class="fas fa-plus-circle"></i></a>
                                        <a title="Hapus Data" href="<?= base_url('Pegawai/hps_FormPer/') . $row->kd_volume . '/' . $this->uri->segment(3); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->