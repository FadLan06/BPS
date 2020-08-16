<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        if ($this->session->userdata('role_id') != 1) {
            if ($this->session->userdata('role_id') != 3) {
                redirect('Auth');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ppk/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function permin()
    {
        $data['title'] = 'Data Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['trans'] = $this->Admin_model->getPerminn()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ppk/permin', $data);
        $this->load->view('template/footer', $data);
    }

    public function verifikasi()
    {
        $data['title'] = 'Data Permintaan';
        $data['judul'] = 'Verifikasi Form Permintaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['trans'] = $this->Admin_model->getTransaksi()->row();
        $data['volume'] = $this->db->get_where('tb_volume', ['kd_transaksi' => $this->uri->segment(3)])->result();
        $data['rincianvol'] = $this->Admin_model->getVol()->result_array();
        $id = $data['trans']->user;
        $data['nama'] = $this->Admin_model->nama($id)->row();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ppk/verifikasi', $data);
        $this->load->view('template/footer', $data);
    }

    function aksi()
    {
        if (isset($_POST['ver'])) {
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $data = ['status' => htmlspecialchars($this->input->post('status', true))];

            $this->db->where('kd_transaksi', $kd_trans);
            $this->db->update('tb_transaksi', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Formulir Permintaan Sudah di Verifikasi! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('PPK/Permin');
        } elseif (isset($_POST['komn'])) {
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $data = ['komentar' => htmlspecialchars($this->input->post('komentar', true))];

            $this->db->where('kd_transaksi', $kd_trans);
            $this->db->update('tb_transaksi', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Formulir Permintaan Sudah di Verifikasi! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('PPK/Permin');
        }
    }

    public function ttd_ppk()
    {
        $data['title'] = 'Data Permintaan';
        $data['judul'] = 'TTD Verifikasi Form Permintaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['data'] = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $this->uri->segment(3)])->row();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ppk/ttd_ppk', $data);
        $this->load->view('template/footer', $data);
    }

    public function simpan()
    {
        if (isset($_POST['signaturesubmit'])) {
            $signature = $_POST['signature'];
            $signatureFileName = uniqid() . '.png';
            $signature = str_replace('data:image/png;base64,', '', $signature);
            $signature = str_replace(' ', '+', $signature);
            $data = base64_decode($signature);
            $file = 'assets/img/ttd_ppk/' . $signatureFileName;
            file_put_contents($file, $data);

            $id = $this->input->post('kd_transaksi');
            $data = ['ttd_ppk' => $signatureFileName];

            $this->db->where('kd_transaksi', $id);
            $this->db->update('tb_transaksi', $data);

            $this->session->set_flashdata('flash', '<div class="alert alert-success">Signature Uploaded</div>');
            redirect('PPK/Verifikasi/' . $id);
        }
    }
}
