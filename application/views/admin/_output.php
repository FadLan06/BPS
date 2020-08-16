<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <div class="form-group">
        <label for="kode">KODE</label>
        <input type="hidden" class="form-control" id="kd_output" name="kd_output" value="<?= $out->kd_output; ?>">
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $out->kode_out ?>">
        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="output">Nama Output</label>
        <textarea name="output" id="output" class="form-control" cols="30" rows="3"><?= $out->output ?></textarea>
        <?= form_error('output', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="out" class="btn btn-info float-right">Simpan</button>
</form>