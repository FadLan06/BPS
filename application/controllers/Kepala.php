<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        if ($this->session->userdata('role_id') != 1) {
            if ($this->session->userdata('role_id') != 5) {
                redirect('Auth');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['uuser'] = $this->Admin_model->pegawai();
        $data['trans'] = $this->Admin_model->trans();
        $data['selesai'] = $this->Admin_model->selesai();
        $data['proses'] = $this->Admin_model->proses();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kepala/index', $data);
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
        $this->load->view('kepala/permin', $data);
        $this->load->view('template/footer', $data);
    }

}
