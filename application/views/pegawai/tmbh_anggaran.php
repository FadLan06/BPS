<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table width="100%" cellpadding="5">
                        <tr>
                            <td colspan="2"></td>
                            <td width="25%" align="center" style="border:3px solid"><b>FORM - <span style="color:red">BARANG</span></b></td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                    <table width="100%" style="font-size:14">
                        <tr>
                            <td width="6%"></td>
                            <td align="center"><b>FORMULIR PERMINTAAN</b></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="6%"></td>
                            <td align="center"><b>BELANJA BIAYA PEMELIHARAAN PERALATAN DAN MESIN</b></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="6%"></td>
                            <td align="center"><b>Nomor : 089</b></td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                    <table width="100%" style="font-size:12">
                        <tr>
                            <td width="10%"></td>
                            <td>Kepada Yth,</td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td>Pejabat Pembuat Komitmen</td>
                        </tr>
                        <tr>
                            <td width="10%"></td>
                            <td>BPS Kab. Boalemo</td>
                        </tr>
                    </table><br>
                    <table width="100%" style="font-size:12">
                        <tr>
                            <td width="10%"></td>
                            <td>Bersama ini disampaikan formulir permintaan balanja barang operasional :</td>
                        </tr>
                    </table><br>
                    <table width="100%" border="0" cellpadding="3" style="font-size:12">
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">1</td>
                            <td width="15%">Program</td>
                            <td width="2%" align="center">:</td>
                            <td width="8%"><?= $trans->kode_pro ?></td>
                            <td><?= $trans->program ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">2</td>
                            <td width="15%">Kegiatan</td>
                            <td width="2%" align="center">:</td>
                            <td width="8%"><?= $trans->kode_keg ?></td>
                            <td><?= $trans->kegiatan ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">3</td>
                            <td width="15%">Output</td>
                            <td width="2%" align="center">:</td>
                            <td width="8%"><?= $trans->kode_out ?></td>
                            <td><?= $trans->output ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">4</td>
                            <td width="15%">Komponen</td>
                            <td width="2%" align="center">:</td>
                            <td width="8%"><?= $trans->kode_kom ?></td>
                            <td><?= $trans->komponen ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">5</td>
                            <td width="15%">Sub. Komponen</td>
                            <td width="2%" align="center">:</td>
                            <td width="8%"><?= $trans->kode_sub ?></td>
                            <td><?= $trans->subkomponen ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">6</td>
                            <td width="15%">Akun</td>
                            <td width="2%" align="center">:</td>
                            <td width="8%"><?= $trans->kode_akun ?></td>
                            <td><?= $trans->akun ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">7</td>
                            <td width="15%">Rincian di POK</td>
                            <td width="2%" align="center">:</td>
                            <td colspan="2"><?= $trans->rincian ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">8</td>
                            <td width="15%">Volume</td>
                            <td width="2%" align="center">:</td>
                            <td colspan="2"><?= $trans->volume_trans ?> (BMN)</td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">9</td>
                            <td width="15%">Pengambilan Dana</td>
                            <td width="2%" align="center">:</td>
                            <td colspan="2"><?= date('d F Y', $trans->tgl) ?></td>
                            <td width="10%"></td>
                        </tr>
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">10</td>
                            <td width="15%">Penggunaan Anggaran</td>
                            <td width="2%" align="center"></td>
                            <td colspan="2"></td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr align="center">
                            <th width="13%"></th>
                            <th width="4%" style="border:1px solid">No</th>
                            <th width="20%" style="border:1px solid">Item Kegiatan/Spesifikasi</th>
                            <th width="10%" style="border:1px solid">Pagu POK</th>
                            <th width="10%" style="border:1px solid">Realisasi Anggaran (Kumulatif)</th>
                            <th width="12%" style="border:1px solid">Sisa anggaran yang masih dapat digunakan</th>
                            <th width="15%" style="border:1px solid">Anggaran yang akan digunakan</th>
                            <th width="10%" style="border:1px solid">Sisa anggaran</th>
                            <td width="10%"></td>
                        </tr>
                        <tr align="center">
                            <td width="13%"></td>
                            <td width="4%" style="border:1px solid">(1)</td>
                            <td width="20%" style="border:1px solid">(2)</td>
                            <td width="10%" style="border:1px solid">(3)</td>
                            <td width="10%" style="border:1px solid">(4)</td>
                            <td width="12%" style="border:1px solid">(5)</td>
                            <td width="15%" style="border:1px solid">(6)</td>
                            <td style="border:1px solid">(7)</td>
                        </tr>
                        <?php
                        $jumlah = $this->db->query("SELECT sum(biaya) as total FROM tb_volume WHERE kd_transaksi=$trans->kd_transaksi")->row();
                        ?>
                        <tr>
                            <td width="13%"></td>
                            <td width="4%" style="border:1px solid" align="center">1</td>
                            <td width="20%" style="border:1px solid"><?= $trans->rincian ?></td>
                            <td width="10%" style="border:1px solid" align="center"><?php $pok = $trans->biaya ?><?= rupiah($pok) ?></td>
                            <td width="10%" style="border:1px solid" align="center">
                                <span style="color:red">
                                    <?php if ($trans->sisa == 0) {
                                        echo $real = 0;
                                    } else {
                                        $real = $trans->biaya - $trans->sisa;
                                        echo rupiah($real);
                                    } ?>
                                </span>
                            </td>
                            <td width="12%" style="border:1px solid" align="center"><?php $sisa = $trans->biaya - $real ?><?= rupiah($sisa) ?></td>
                            <td width="15%" style="border:1px solid" align="center"><span style="color:red"><?php $gunakan = $jumlah->total ?><?= rupiah($gunakan) ?></span></td>
                            <td style="border:1px solid" align="center"><?php $hasil = $sisa - $gunakan ?><?= rupiah($hasil) ?></td>
                        </tr>
                    </table><br>
                    <table width="100%" border="0" cellpadding="3" style="font-size:12">
                        <tr valign="top">
                            <td width="12%"></td>
                            <td width="2%">11</td>
                            <td width="15%">Penjelasan Tambahan</td>
                            <td width="2%" align="center"></td>
                            <td colspan="2"></td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                    <table width="100%" border="0">
                        <tr align="center">
                            <th width="11%"></th>
                            <th width="4%" style="border:1px solid">No</th>
                            <th width="20%" style="border:1px solid">Uraian/Penjelasan</th>
                            <th width="10%" style="border:1px solid">Volume</th>
                            <th width="10%" style="border:1px solid">Satuan</th>
                            <th width="10%" style="border:1px solid">Harga Satuan</th>
                            <th width="10%" style="border:1px solid">Jumlah</th>
                            <th width="5%"></th>
                        </tr>
                        <tr align="center">
                            <td width="11%"></td>
                            <td width="4%" style="border:1px solid">(1)</td>
                            <td width="20%" style="border:1px solid">(2)</td>
                            <td width="10%" style="border:1px solid">(3)</td>
                            <td width="10%" style="border:1px solid">(4)</td>
                            <td width="10%" style="border:1px solid">(5)</td>
                            <td width="10%" style="border:1px solid">(6)</td>
                        </tr>
                        <?php $no = 1;
                        foreach ($volume as $row) : ?>
                            <tr>
                                <td width="11%"></td>
                                <td width="4%" style="border:1px solid" align="center"><b><?= $no++; ?></b></td>
                                <td width="20%" style="border:1px solid"><b><?= $row->uraian ?></b></td>
                                <td width="10%" style="border:1px solid" align="center"><b><?= $row->volume ?></b></td>
                                <td width="10%" style="border:1px solid" align="center"><b><?= $row->satuan ?></b></td>
                                <td width="10%" style="border:1px solid" align="center"></td>
                                <td width="10%" style="border:1px solid" align="center"><b><?= rupiah($row->biaya) ?></b></td>
                                <?php foreach ($rincianvol as $dt) : ?>
                                    <?php if ($dt['kd_volume'] == $row->kd_volume) : ?>
                            <tr>
                                <td width="11%"></td>
                                <td width="4%" style="border:1px solid"></td>
                                <td width="20%" style="border:1px solid"><?= '- ' . $dt['uraian_vol'] ?></td>
                                <td width="10%" style="border:1px solid" align="center"><?= $dt['volume_vol'] ?></td>
                                <td width="10%" style="border:1px solid" align="center"><?= $dt['satuan_vol'] ?></td>
                                <td width="10%" style="border:1px solid" align="center"><?= rupiah($dt['harga_vol']) ?></td>
                                <td width="10%" style="border:1px solid" align="center"><?= rupiah($dt['biaya_vol']) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tr>
                    <tr align="center">
                        <td width="11%"></td>
                        <td width="4%" style="border:1px solid"></td>
                        <td width="25%" style="border:1px solid"></td>
                        <td width="10%" style="border:1px solid"></td>
                        <td width="10%" style="border:1px solid"></td>
                        <td width="10%" style="border:1px solid"></td>
                        <td width="10%" style="border:1px solid"></td>
                    </tr>
                <?php endforeach; ?>
                    </table><br>
                    <table width="100%" border="0" style="font-size:12">
                        <tr>
                            <td width="12%"></td>
                            <td width="40%"></td>
                            <td width="40%" align="center">Tilamuta, <?= date('d F Y') ?></td>
                            <td width="12%"></td>
                        </tr>
                        <tr>
                            <td width="12%"></td>
                            <td width="40%" align="center">Menyetujui</td>
                            <td width="40%" align="center">Staf</td>
                            <td width="12%"></td>
                        </tr>
                        <tr>
                            <td width="12%"></td>
                            <td width="40%" align="center">Pejabat Pembuat Komitmen</td>
                            <td width="40%" align="center">Seksi IPDS</td>
                            <td width="12%"></td>
                        </tr>
                        <tr>
                            <td width="12%"></td>
                            <td width="40%" align="center">BPS Kabupaten Boalemo</td>
                            <td width="40%" align="center">BPS Kabupaten Boalemo</td>
                            <td width="12%"></td>
                        </tr>
                        <tr>
                            <td width="12%" height="70"></td>
                            <td width="40%" align="center"></td>
                            <?php if (empty($trans->ttd_pegawai)) : ?>
                                <td width="40%" align="center" height="70">
                                    <a href="<?= base_url('Pegawai/TTD_Pegawai/') . $this->uri->segment(3) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> TTD</a>
                                </td>
                            <?php else : ?>
                                <td width="40%" align="center">
                                    <img src="<?= base_url('assets/img/ttd_pegawai/') . $trans->ttd_pegawai ?>" width="210" height="90" alt="">
                                </td>
                            <?php endif; ?>
                            <td width="12%"></td>
                        </tr>
                        <tr>
                            <td width="12%"></td>
                            <td width="40%" align="center"><b>Lambang Haris Wijayanto, S.ST</b></td>
                            <td width="40%" align="center"><b><?= $user['nama'] ?></b></td>
                            <td width="12%"></td>
                        </tr>
                        <tr>
                            <td width="12%"></td>
                            <td width="40%" align="center">NIP. 19930130 201701 1 001</td>
                            <td width="40%" align="center">NIP. <?= $user['nip'] ?></td>
                            <td width="12%"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('Pegawai/Aksi') ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kd_trans" name="kd_trans" value="<?= $this->uri->segment(3); ?>">
                            <input type="hidden" class="form-control" id="kd_rincian" name="kd_rincian" value="<?= $trans->kd_rincian; ?>">
                            <input type="hidden" class="form-control" id="sisa" name="sisa" value="<?= $hasil ?>">
                        </div>
                        <a href="<?= base_url('Pegawai/tmbh_FormPer/') . $this->uri->segment(3) ?>" class="btn btn-info">Kembali</a>
                        <?php if (empty($trans->ttd_pegawai)) : ?>
                            <a href="" name="anggaran" class="btn btn-warning float-right disabled">Selesai</a>
                        <?php else : ?>
                            <button type="submit" name="anggaran" class="btn btn-warning float-right">Selesai</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->