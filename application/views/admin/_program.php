<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <div class="form-group">
        <label for="kode">KODE</label>
        <input type="hidden" class="form-control" id="kd_program" name="kd_program" value="<?= $prog->kd_program ?>">
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $prog->kode_pro ?>">
        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="program">Nama Program</label>
        <textarea name="program" id="program" class="form-control" cols="30" rows="3"><?= $prog->program ?></textarea>
        <?= form_error('program', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="biaya">Jumlah Biaya</label>
        <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $prog->biaya ?>">
        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="prog" class="btn btn-info float-right">Simpan</button>
</form>