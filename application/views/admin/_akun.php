<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <div class="form-group">
        <label for="kode">KODE</label>
        <input type="hidden" class="form-control" id="kd_akun" name="kd_akun" value="<?= $aku->kd_akun; ?>">
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $aku->kode_akun ?>">
        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="akun">Nama Akun</label>
        <textarea name="akun" id="akun" class="form-control" cols="30" rows="3"><?= $aku->akun ?></textarea>
        <?= form_error('akun', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="aku" class="btn btn-info float-right">Simpan</button>
</form>