<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <div class="form-group">
        <label for="kode">KODE</label>
        <input type="hidden" class="form-control" id="kd_komponen" name="kd_komponen" value="<?= $kom->kd_komponen; ?>">
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $kom->kode_kom ?>">
        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="komponen">Nama Komponen</label>
        <textarea name="komponen" id="komponen" class="form-control" cols="30" rows="3"><?= $kom->komponen ?></textarea>
        <?= form_error('komponen', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="kom" class="btn btn-info float-right">Simpan</button>
</form>