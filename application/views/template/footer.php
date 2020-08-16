<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>


<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<script>
    $('.custom-control-input').on('click', function() {
        var checkStatus = this.checked ? '1' : '0';

        // alert(checkStatus);
        $.post("<?= base_url('PPK/Change') ?>", {
                "status": checkStatus
            },
            function(data) {
                $('<?= base_url('PPK/Permin') ?>').html(data);
            });
    });
</script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#program").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#kegiatan").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listKegiatan"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_program: $("#program").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#kegiatan").html(response.list_kegiatan).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

        $("#kegiatan").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#output").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listOutput"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_kegiatan: $("#kegiatan").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#output").html(response.list_output).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

        $("#output").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#komponen").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listKomponen"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_output: $("#output").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#komponen").html(response.list_komponen).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

        $("#komponen").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#subkomponen").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listsubkomponen"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_komponen: $("#komponen").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#subkomponen").html(response.list_subkomponen).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

        $("#subkomponen").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#akun").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listakun"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_subkomponen: $("#subkomponen").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#akun").html(response.list_akun).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

        $("#akun").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#rincian").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listrincian"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_akun: $("#akun").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#rincian").html(response.list_rincian).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

        $("#rincian").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#sisa").hide(); // Sembunyikan dulu combobox kota nya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("pegawai/listsisa"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    kd_rincian: $("#rincian").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#sisa").html(response.list_sisa).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#program').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_program') ?>',
                data: 'kd_program=' + kd,
                success: function(data) {
                    $('.v_program').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $(document).ready(function() {
        $('#kegiatan').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_kegiatan') ?>',
                data: 'kd_kegiatan=' + kd,
                success: function(data) {
                    $('.v_kegiatan').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $(document).ready(function() {
        $('#output').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_output') ?>',
                data: 'kd_output=' + kd,
                success: function(data) {
                    $('.v_output').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $(document).ready(function() {
        $('#komponen').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_komponen') ?>',
                data: 'kd_komponen=' + kd,
                success: function(data) {
                    $('.v_komponen').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $(document).ready(function() {
        $('#subkomponen').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_subkomponen') ?>',
                data: 'kd_subkomponen=' + kd,
                success: function(data) {
                    $('.v_subkomponen').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $(document).ready(function() {
        $('#akun').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_akun') ?>',
                data: 'kd_akun=' + kd,
                success: function(data) {
                    $('.v_akun').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
    $(document).ready(function() {
        $('#rincian').on('show.bs.modal', function(e) {
            var kd = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: '<?= base_url('Admin/get_rincian') ?>',
                data: 'kd_rincian=' + kd,
                success: function(data) {
                    $('.v_rincian').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

</body>

</html>