<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Data Form Permintaan
            </h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th width="5%">#</th>
                            <th width="6%">Komponen</th>
                            <th width="6%">Sub. Komponen</th>
                            <th width="6%">Akun</th>
                            <th width="20%">Rincian</th>
                            <th width="6%">Total Biaya</th>
                            <th width="6%">Status</th>
                            <th width="8%">Keterangan</th>
                            <th width="11%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($trans as $row) : ?>
                            <?php $jumlah = $this->db->query("SELECT sum(biaya) as total FROM tb_volume WHERE kd_transaksi=$row->kd_transaksi")->row(); ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td title="<?= $row->komponen ?>"><?= $row->kode_kom ?></td>
                                <td title="<?= $row->subkomponen ?>"><?= $row->kode_sub ?></td>
                                <td title="<?= $row->akun ?>"><?= $row->kode_akun ?></td>
                                <td align="left"><?= $row->rincian ?></td>
                                <td><?= rupiah($jumlah->total) ?></td>
                                <td>
                                    <?php if ($row->status == 1) : ?>
                                        <span class="badge badge-success">Selesai</span>
                                    <?php else : ?>
                                        <span class="badge badge-warning">Proses</span>
                                    <?php endif; ?>
                                </td>
                                <td align="left"><?= $row->komentar ?></td>
                                <td>
                                    <?php if ($row->status == 1) : ?>
                                        <a href="<?= base_url('Pegawai/Cetak/') . $row->kd_transaksi ?>" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('Pegawai/Cetak/') . $row->kd_transaksi ?>" target="_blank" class="btn btn-sm btn-info disabled"><i class="fas fa-print"></i></a>
                                    <?php endif; ?>
                                    <?php if ($row->status == 1) : ?>
                                        <a title="Tambah Data" href="<?= base_url('Pegawai/edit_FormPer/' . $row->kd_transaksi) ?>" class="btn btn-sm btn-success disabled"><i class="fas fa-edit"></i></a>
                                    <?php else : ?>
                                        <a title="Tambah Data" href="<?= base_url('Pegawai/edit_FormPer/' . $row->kd_transaksi) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    <?php endif; ?>
                                    <a title="Hapus Data" href="" onclick="alert('Maaf Data Permintaan Tidak Dapat di Hapus')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->