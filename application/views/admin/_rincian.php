<form action="<?= base_url('Admin/Ubah') ?>" method="POST">
    <input type="hidden" class="form-control" id="kd_rincian" name="kd_rincian" value="<?= $rin->kd_rincian ?>">
    <div class="form-group">
        <label for="rincian">Nama Rincian</label>
        <textarea name="rincian" id="rincian" class="form-control" cols="30" rows="3"><?= $rin->rincian ?></textarea>
        <?= form_error('rincian', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="volume">Volume</label>
        <input type="text" name="volume" id="volume" class="form-control" value="<?= $rin->volume ?>">
        <?= form_error('volume', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="satuan">Harga Satuan</label>
        <input type="text" name="satuan" id="satuan" class="form-control" value="<?= $rin->satuan ?>">
        <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" name="rin" class="btn btn-info float-right">Simpan</button>
</form>