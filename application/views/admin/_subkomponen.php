<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <div class="form-group">
        <label for="kode">KODE</label>
        <input type="hidden" class="form-control" id="kd_subkomponen" name="kd_subkomponen" value="<?= $sub->kd_subkomponen; ?>">
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $sub->kode_sub ?>">
        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="subkomponen">Nama Sub Komponen</label>
        <textarea name="subkomponen" id="subkomponen" class="form-control" cols="30" rows="3"><?= $sub->subkomponen ?></textarea>
        <?= form_error('subkomponen', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="subkom" class="btn btn-info float-right">Simpan</button>
</form>