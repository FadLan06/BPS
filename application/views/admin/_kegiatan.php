<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <div class="form-group">
        <label for="kode">KODE</label>
        <input type="hidden" class="form-control" id="kd_kegiatan" name="kd_kegiatan" value="<?= $keg->kd_kegiatan ?>">
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $keg->kode_keg ?>">
        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="kegiatan">Nama Kegiatan</label>
        <textarea name="kegiatan" id="kegiatan" class="form-control" cols="30" rows="3"><?= $keg->kegiatan ?></textarea>
        <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="biaya">Jumlah Biaya</label>
        <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $keg->biaya ?>">
        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="keg" class="btn btn-info float-right">Simpan</button>
</form>