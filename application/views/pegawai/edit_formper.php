<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>


    <div class="row">
        <div class="col-md">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a href="<?= base_url('Pegawai/Permin') ?>" class="btn btn-info mb-3">Kembali</a>
                    <a href="<?= base_url('Pegawai/edit_Anggaran/') . $this->uri->segment(3) ?>" class="btn btn-warning mb-3 float-right">Lanjut</a>
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
                                        <a title="Tambah Data" href="<?= base_url('Pegawai/edit_Volume/') . $row->kd_volume . '/' . $this->uri->segment(3); ?>" class="text-info mr-2"><i class="fas fa-edit"></i></a>
                                        <a title="Hapus Data" href="<?= base_url('Pegawai/hps_FormPer1/') . $row->kd_volume . '/' . $this->uri->segment(3); ?>" class="text-danger"><i class="fas fa-trash"></i></a>
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