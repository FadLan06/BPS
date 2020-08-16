<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">
                <a href="<?= base_url('Admin/Tmbh_Program') ?>" class="btn btn-warning btn-sm float-right">Tambah Data</a>
            </h6>
        </div>
    </div>
                    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Data Program</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($prog->result_array() as $row) : ?>
                        <li class="list-group-item">
                            <?= $row['kode_pro'] . ' => ' . $row['program'] ?>
                            <a href="" class="badge badge-info float-right" data-toggle="collapse" data-target="#<?= str_replace(' ', '', $row['program']) ?>" aria-expanded="false" aria-controls="<?= $row['program'] ?>">View</a>
                            <a href="" data-toggle="modal" data-target="#program" data-id="<?= $row['kd_program'] ?>" class="badge badge-warning float-right mr-2">Edit</a>
                        </li><br>
                        <div class="collapse multi-collapse" id="<?= str_replace(' ', '', $row['program']) ?>">
                            <div class="card shadow mb-4">
                                <div class="card-header bg-info py-3">
                                    <h6 class="m-0 font-weight-bold text-white">Data Kegiatan</h6>
                                </div>
                                <div class="card-body">
                                    <?php foreach ($keg->result() as $dt) { ?>
                                        <?php if ($dt->kd_program == $row['kd_program']) { ?>
                                            <li class="list-group-item">
                                                <?= $dt->kode_keg . ' => ' . $dt->kegiatan ?>
                                                <a href="" class="badge badge-info float-right" data-toggle="collapse" data-target="#<?= str_replace(' ', '', $dt->kegiatan) ?>" aria-expanded="false" aria-controls="<?= $dt->kegiatan ?>">View</a>
                                                <a href="" data-toggle="modal" data-target="#kegiatan" data-id="<?= $dt->kd_kegiatan ?>" class="badge badge-warning float-right mr-2">Edit</a>
                                            </li><br>
                                            <div class="collapse multi-collapse" id="<?= str_replace(' ', '', $dt->kegiatan) ?>">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3 bg-warning">
                                                        <h6 class="m-0 font-weight-bold text-white">Data Output</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php foreach ($out->result() as $outp) { ?>
                                                            <?php if ($outp->kd_kegiatan == $dt->kd_kegiatan) { ?>
                                                                <li class="list-group-item">
                                                                    <?= $outp->kode_out . ' => ' . $outp->output ?>
                                                                    <a href="" class="badge badge-info float-right" data-toggle="collapse" data-target="#<?= str_replace(' ', '', $outp->output) ?>" aria-expanded="false" aria-controls="<?= $outp->output ?>">View</a>
                                                                    <a href="" data-toggle="modal" data-target="#output" data-id="<?= $outp->kd_output ?>" class="badge badge-warning float-right mr-2">Edit</a>
                                                                </li><br>
                                                                <div class="collapse multi-collapse" id="<?= str_replace(' ', '', $outp->output) ?>">
                                                                    <div class="card shadow mb-4">
                                                                        <div class="card-header bg-danger py-3">
                                                                            <h6 class="m-0 font-weight-bold text-white">Data Komponen</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <?php foreach ($komp->result() as $kom) { ?>
                                                                                <?php if ($kom->kd_output == $outp->kd_output) { ?>
                                                                                    <li class="list-group-item">
                                                                                        <?= $kom->kode_kom . ' => ' . $kom->komponen ?>
                                                                                        <a href="" class="badge badge-info float-right" data-toggle="collapse" data-target="#<?= str_replace(' ', '', $kom->komponen) ?>" aria-expanded="false" aria-controls="<?= $kom->komponen ?>">View</a>
                                                                                        <a href="" data-toggle="modal" data-target="#komponen" data-id="<?= $kom->kd_komponen ?>" class="badge badge-warning float-right mr-2">Edit</a>
                                                                                    </li><br>
                                                                                    <div class="collapse multi-collapse" id="<?= str_replace(' ', '', $kom->komponen) ?>">
                                                                                        <div class="card shadow mb-4">
                                                                                            <div class="card-header bg-dark py-3">
                                                                                                <h6 class="m-0 font-weight-bold text-white">Data Sub Komponen</h6>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <?php foreach ($sub->result() as $subkom) { ?>
                                                                                                    <?php if ($subkom->kd_komponen == $kom->kd_komponen) { ?>
                                                                                                        <li class="list-group-item">
                                                                                                            <?= $subkom->kode_sub . ' => ' . $subkom->subkomponen ?>
                                                                                                            <a href="" class="badge badge-info float-right" data-toggle="collapse" data-target="#<?= str_replace(' ', '', $subkom->subkomponen) ?>" aria-expanded="false" aria-controls="<?= $subkom->subkomponen ?>">View</a>
                                                                                                            <a href="" data-toggle="modal" data-target="#subkomponen" data-id="<?= $subkom->kd_subkomponen ?>" class="badge badge-warning float-right mr-2">Edit</a>
                                                                                                        </li><br>
                                                                                                        <div class="collapse multi-collapse" id="<?= str_replace(' ', '', $subkom->subkomponen) ?>">
                                                                                                            <div class="card shadow mb-4">
                                                                                                                <div class="card-header py-3 bg-success">
                                                                                                                    <h6 class="m-0 font-weight-bold text-white">Data Akun</h6>
                                                                                                                </div>
                                                                                                                <div class="card-body">
                                                                                                                    <?php foreach ($akun->result() as $aku) { ?>
                                                                                                                        <?php if ($aku->kd_subkomponen == $subkom->kd_subkomponen) { ?>
                                                                                                                            <li class="list-group-item">
                                                                                                                                <?= $aku->kode_akun . ' => ' . $aku->akun ?>
                                                                                                                                <a href="" class="badge badge-info float-right" data-toggle="collapse" data-target="#<?= str_replace(' ', '', $aku->akun) ?>" aria-expanded="false" aria-controls="<?= $aku->akun ?>">View</a>
                                                                                                                                <a href="" data-toggle="modal" data-target="#akun" data-id="<?= $aku->kd_akun ?>" class="badge badge-warning float-right mr-2">Edit</a>
                                                                                                                            </li><br>
                                                                                                                            <div class="collapse multi-collapse" id="<?= str_replace(' ', '', $aku->akun) ?>">
                                                                                                                                <div class="card shadow mb-4">
                                                                                                                                    <div class="card-header py-3 bg-primary">
                                                                                                                                        <h6 class="m-0 font-weight-bold text-white">Data Rincian</h6>
                                                                                                                                    </div>
                                                                                                                                    <div class="card-body">
                                                                                                                                        <table class="table">
                                                                                                                                            <tr align="center">
                                                                                                                                                <th width="35%">Rincian</th>
                                                                                                                                                <th width="10%">Volume</th>
                                                                                                                                                <th width="15%">Harga Satuan</th>
                                                                                                                                                <th width="15%">Biaya</th>
                                                                                                                                                <th width="5%">Aksi</th>
                                                                                                                                            </tr>
                                                                                                                                            <?php foreach ($rin->result() as $rinc) { ?>
                                                                                                                                                <?php if ($rinc->kd_akun == $aku->kd_akun) { ?>
                                                                                                                                                    <tr align="center">
                                                                                                                                                        <td align="left"><?= $rinc->rincian ?></td>
                                                                                                                                                        <td><?= $rinc->volume ?></td>
                                                                                                                                                        <td><?= $rinc->satuan ?></td>
                                                                                                                                                        <td><?= $rinc->biaya ?></td>
                                                                                                                                                        <td><a href="" data-toggle="modal" data-target="#rincian" data-id="<?= $rinc->kd_rincian ?>" class="badge badge-warning float-right mr-2">Edit</a></td>
                                                                                                                                                    </tr>
                                                                                                                                                <?php } ?>
                                                                                                                                            <?php } ?>
                                                                                                                                        </table>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        <?php } ?>
                                                                                                                    <?php } ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php } ?>
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="program" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_program"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_kegiatan"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="output" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Output</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_output"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="komponen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Komponen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_komponen"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="subkomponen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Sub Komponen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_subkomponen"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_akun"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="rincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Rincian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="v_rincian"></div>
            </div>
        </div>
    </div>
</div>