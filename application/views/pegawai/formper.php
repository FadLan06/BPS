<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <h6 class="m-0 font-weight-bold text-white">Input Form Permintaan</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Pegawai/Aksi') ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-md">
                                <label for="program">Program</label>
                                <select name="program" id="program" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                    <?php foreach ($program as $row) : ?>
                                        <option value="<?= $row->kd_program ?>"><?= $row->kode_pro ?> - <?= $row->program ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('program', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md">
                                <label for="kegiatan">Kegiatan</label>
                                <select name="kegiatan" id="kegiatan" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                </select>
                                <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md">
                                <label for="output">Output</label>
                                <select name="output" id="output" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                </select>
                                <?= form_error('output', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md">
                                <label for="komponen">Komponen</label>
                                <select name="komponen" id="komponen" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                </select>
                                <?= form_error('komponen', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md">
                                <label for="subkomponen">Sub Komponen</label>
                                <select name="subkomponen" id="subkomponen" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                </select>
                                <?= form_error('subkomponen', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md">
                                <label for="akun">Akun</label>
                                <select name="akun" id="akun" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                </select>
                                <?= form_error('akun', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="rincian">Rincian</label>
                                <select name="rincian" id="rincian" class="form-control">
                                    <option value="0">--- Pilih ---</option>
                                </select>
                                <?= form_error('rincian', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-3" id="sisa">
                                <label for="sisa">Sisa Anggaran</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="volume">Volume</label>
                                <input type="text" name="volume" id="volume" class="form-control">
                                <input type="hidden" name="user" id="user" class="form-control" value="<?= $user['id'] ?>">
                                <?= form_error('volume', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md mt-4">
                                <button type="submit" name="formper" class="btn btn-info float-right">Lanjut</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->