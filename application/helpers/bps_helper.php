<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('Auth');
    }
}

function rupiah($angka)
{
    $hasil = "" . number_format($angka, 0, ',', '.');
    return $hasil;
}

function check($kode, $sta)
{
    $ci = get_instance();

    $ci->db->where('kd_transaksi', $kode);
    $ci->db->where('status', $sta);
    $result = $ci->db->get('tb_transaksi');

    if ($result->num_rows() <= 0) {
        return "checked='checked'";
    }
}
