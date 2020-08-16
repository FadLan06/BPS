<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function kegiatan()
    {
        $this->db->select('*');
        $this->db->join('tb_kegiatan', 'tb_program.kd_program = tb_kegiatan.kd_program');
        $this->db->from('tb_program');
        $query = $this->db->get();
        return $query;
    }

    function kegiatan1($kd)
    {
        $this->db->select('*');
        $this->db->join('tb_kegiatan', 'tb_program.kd_program = tb_kegiatan.kd_program');
        $this->db->from('tb_program');
        $this->db->where('kd_program', $kd);
        $query = $this->db->get();
        return $query;
    }

    function output()
    {
        $this->db->select('*');
        $this->db->join('tb_output', 'tb_kegiatan.kd_kegiatan = tb_output.kd_kegiatan');
        $this->db->from('tb_kegiatan');
        $query = $this->db->get();
        return $query;
    }

    function komponen()
    {
        $this->db->select('*');
        $this->db->join('tb_komponen', 'tb_output.kd_output = tb_komponen.kd_output');
        $this->db->from('tb_output');
        $query = $this->db->get();
        return $query;
    }

    function subkomponen()
    {
        $this->db->select('*');
        $this->db->join('tb_subkomponen', 'tb_komponen.kd_komponen = tb_subkomponen.kd_komponen');
        $this->db->from('tb_komponen');
        $query = $this->db->get();
        return $query;
    }

    function akun()
    {
        $this->db->select('*');
        $this->db->join('tb_akun', 'tb_subkomponen.kd_subkomponen = tb_akun.kd_subkomponen');
        $this->db->from('tb_subkomponen');
        $query = $this->db->get();
        return $query;
    }

    function rincian()
    {
        $this->db->select('*');
        $this->db->join('tb_rincian', 'tb_akun.kd_akun = tb_rincian.kd_akun');
        $this->db->from('tb_akun');
        $query = $this->db->get();
        return $query;
    }

    function nama($id)
    {
        $this->db->select('*');
        $this->db->join('user', 'tb_transaksi.user = user.id');
        $this->db->from('tb_transaksi');
        $this->db->where('user', $id);
        $query = $this->db->get();
        return $query;
    }

    function getTransaksi()
    {
        $this->db->select('*');
        $this->db->join('tb_program', 'tb_transaksi.kd_program = tb_program.kd_program');
        $this->db->join('tb_kegiatan', 'tb_transaksi.kd_kegiatan = tb_kegiatan.kd_kegiatan');
        $this->db->join('tb_output', 'tb_transaksi.kd_output = tb_output.kd_output');
        $this->db->join('tb_komponen', 'tb_transaksi.kd_komponen = tb_komponen.kd_komponen');
        $this->db->join('tb_subkomponen', 'tb_transaksi.kd_subkomponen = tb_subkomponen.kd_subkomponen');
        $this->db->join('tb_akun', 'tb_transaksi.kd_akun = tb_akun.kd_akun');
        $this->db->join('tb_rincian', 'tb_transaksi.kd_rincian = tb_rincian.kd_rincian');
        $this->db->from('tb_transaksi');
        $this->db->where('kd_transaksi', $this->uri->segment(3));
        $query = $this->db->get();
        return $query;
    }

    function getPermin($id)
    {
        $this->db->select('*');
        $this->db->join('tb_program', 'tb_transaksi.kd_program = tb_program.kd_program');
        $this->db->join('tb_kegiatan', 'tb_transaksi.kd_kegiatan = tb_kegiatan.kd_kegiatan');
        $this->db->join('tb_output', 'tb_transaksi.kd_output = tb_output.kd_output');
        $this->db->join('tb_komponen', 'tb_transaksi.kd_komponen = tb_komponen.kd_komponen');
        $this->db->join('tb_subkomponen', 'tb_transaksi.kd_subkomponen = tb_subkomponen.kd_subkomponen');
        $this->db->join('tb_akun', 'tb_transaksi.kd_akun = tb_akun.kd_akun');
        $this->db->join('tb_rincian', 'tb_transaksi.kd_rincian = tb_rincian.kd_rincian');
        $this->db->from('tb_transaksi');
        $this->db->where('user', $id);
        $this->db->order_by('tgl', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getPerminn()
    {
        $this->db->select('*');
        $this->db->join('tb_program', 'tb_transaksi.kd_program = tb_program.kd_program');
        $this->db->join('tb_kegiatan', 'tb_transaksi.kd_kegiatan = tb_kegiatan.kd_kegiatan');
        $this->db->join('tb_output', 'tb_transaksi.kd_output = tb_output.kd_output');
        $this->db->join('tb_komponen', 'tb_transaksi.kd_komponen = tb_komponen.kd_komponen');
        $this->db->join('tb_subkomponen', 'tb_transaksi.kd_subkomponen = tb_subkomponen.kd_subkomponen');
        $this->db->join('tb_akun', 'tb_transaksi.kd_akun = tb_akun.kd_akun');
        $this->db->join('tb_rincian', 'tb_transaksi.kd_rincian = tb_rincian.kd_rincian');
        $this->db->from('tb_transaksi');
        $this->db->order_by('tgl', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getVol()
    {
        $this->db->select('*');
        $this->db->join('tb_volume', 'tb_rincianvol.kd_volume = tb_volume.kd_volume');
        $this->db->from('tb_rincianvol');
        $query = $this->db->get();
        return $query;
    }

    function pegawai()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function trans()
    {
        $query = $this->db->get('tb_transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function selesai()
    {
        $query = $this->db->get_where('tb_transaksi', ['status' => 1]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function proses()
    {
        $query = $this->db->get_where('tb_transaksi', ['status' => 0]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
