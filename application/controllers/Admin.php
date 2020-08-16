<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        if ($this->session->userdata('role_id') != 1) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['uuser'] = $this->Admin_model->pegawai();
        $data['trans'] = $this->Admin_model->trans();
        $data['selesai'] = $this->Admin_model->selesai();
        $data['proses'] = $this->Admin_model->proses();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function pegawai()
    {
        $data['title'] = 'Data Pegawai';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->where('id !=', 1);
        $data['pegawai'] = $this->db->get('user');
        $data['peg'] = $this->db->get('user');


        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', ['min_length' => 'Password too short!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pegawai', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (isset($_POST['simpan'])) {

                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'nip' => htmlspecialchars($this->input->post('nip', true)),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                    'image' => 'User.png',
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => htmlspecialchars($this->input->post('role', true)),
                    'is_active' => 1,
                    'date_created' => time()
                ];

                $this->db->insert('user', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Pegawai Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Admin/Pegawai');
            }
        }
    }

    public function reset($id)
    {
        $passnew = rand();
        $data = ['password' => password_hash($passnew, PASSWORD_DEFAULT)];

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Baru' . $passnew . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/Pegawai');
    }

    public function hps_pegawai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Pegawai Berhasil di Hapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/Pegawai');
    }

    public function pok()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['prog'] = $this->db->get('tb_program');
        $data['keg'] = $this->Admin_model->kegiatan();
        $data['out'] = $this->Admin_model->output();
        $data['komp'] = $this->Admin_model->komponen();
        $data['sub'] = $this->Admin_model->subkomponen();
        $data['akun'] = $this->Admin_model->akun();
        $data['rin'] = $this->Admin_model->rincian();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/pok', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_program()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Program';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_program', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_kegiatan()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Kegiatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['prog'] = $this->db->get_where('tb_program', ['kd_program' => $this->uri->segment(3)])->row_array();
        $data['keg'] = $this->db->get_where('tb_kegiatan', ['kd_program' => $this->uri->segment(3)]);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_kegiatan', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_output()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Output';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['out'] = $this->db->get_where('tb_output', ['kd_kegiatan' => $this->uri->segment(3)]);
        $data['keg'] = $this->db->get_where('tb_kegiatan', ['kd_kegiatan' => $this->uri->segment(3)])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_output', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_komponen()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Komponen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['out'] = $this->db->get_where('tb_output', ['kd_output' => $this->uri->segment(3)])->row_array();
        $data['komp'] = $this->db->get_where('tb_komponen', ['kd_output' => $this->uri->segment(3)]);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_komponen', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_subkomponen()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Sub Komponen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['subkomp'] = $this->db->get_where('tb_subkomponen', ['kd_komponen' => $this->uri->segment(3)]);
        $data['komp'] = $this->db->get_where('tb_komponen', ['kd_komponen' => $this->uri->segment(3)])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_subkomponen', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_akun()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Akun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['subkomp'] = $this->db->get_where('tb_subkomponen', ['kd_subkomponen' => $this->uri->segment(3)])->row_array();
        $data['akun'] = $this->db->get_where('tb_akun', ['kd_subkomponen' => $this->uri->segment(3)]);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_akun', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_rincian()
    {
        $data['title'] = 'Data POK';
        $data['judul'] = 'Tambah Data Akun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['rincian'] = $this->db->get_where('tb_rincian', ['kd_akun' => $this->uri->segment(3)]);
        $data['akun'] = $this->db->get_where('tb_akun', ['kd_akun' => $this->uri->segment(3)])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/tmbh_rincian', $data);
        $this->load->view('template/footer', $data);
    }

    function aksi()
    {
        if (isset($_POST['simpan'])) {

            $kd = rand();
            $data = [
                'kd_program' => $kd,
                'kode_pro' => htmlspecialchars($this->input->post('kode', true)),
                'program' => htmlspecialchars($this->input->post('program', true)),
                'biaya' => htmlspecialchars($this->input->post('biaya', true))
            ];

            $this->db->insert('tb_program', $data);

            $this->session->set_flashdata('message1', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_kegiatan/' . $kd . '');
        } elseif (isset($_POST['save'])) {

            $kd = rand();
            $lik = $this->input->post('kd_program', true);
            $data = [
                'kd_kegiatan' => $kd,
                'kd_program' => htmlspecialchars($lik),
                'kode_keg' => htmlspecialchars($this->input->post('kode', true)),
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'biaya' => htmlspecialchars($this->input->post('biaya', true))
            ];

            $this->db->insert('tb_kegiatan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Kegiatan Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_kegiatan/' . $lik . '');
        } elseif (isset($_POST['input'])) {

            $kd = rand();
            $lik1 = $this->input->post('kd_kegiatan', true);
            $data = [
                'kd_output' => $kd,
                'kd_kegiatan' => htmlspecialchars($lik1),
                'kode_out' => htmlspecialchars($this->input->post('kode', true)),
                'output' => htmlspecialchars($this->input->post('output', true)),
            ];

            $this->db->insert('tb_output', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Output Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_output/' . $lik1);
        } elseif (isset($_POST['komp'])) {

            $kd = rand();
            $lik2 = $this->input->post('kd_output', true);
            $data = [
                'kd_komponen' => $kd,
                'kd_output' => htmlspecialchars($lik2),
                'kode_kom' => htmlspecialchars($this->input->post('kode', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true)),
            ];

            $this->db->insert('tb_komponen', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Komponen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_komponen/' . $lik2);
        } elseif (isset($_POST['subkomp'])) {

            $kd = rand();
            $lik3 = $this->input->post('kd_komponen', true);
            $data = [
                'kd_subkomponen' => $kd,
                'kd_komponen' => htmlspecialchars($lik3),
                'kode_sub' => htmlspecialchars($this->input->post('kode', true)),
                'subkomponen' => htmlspecialchars($this->input->post('subkomponen', true)),
            ];

            $this->db->insert('tb_subkomponen', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Komponen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_subkomponen/' . $lik3);
        } elseif (isset($_POST['akunn'])) {

            $kd = rand();
            $lik3 = $this->input->post('kd_subkomponen', true);
            $data = [
                'kd_akun' => $kd,
                'kd_subkomponen' => htmlspecialchars($lik3),
                'kode_akun' => htmlspecialchars($this->input->post('kode', true)),
                'akun' => htmlspecialchars($this->input->post('akun', true)),
            ];

            $this->db->insert('tb_akun', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Komponen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_akun/' . $lik3);
        } elseif (isset($_POST['satuann'])) {

            $kd = rand();
            $lik3 = $this->input->post('kd_akun', true);
            $biaya = $this->input->post('volume', true) * $this->input->post('satuan', true);
            $data = [
                'kd_rincian' => $kd,
                'kd_akun' => htmlspecialchars($lik3),
                'rincian' => htmlspecialchars($this->input->post('rincian', true)),
                'volume' => htmlspecialchars($this->input->post('volume', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'biaya' => htmlspecialchars($biaya),
                'sisa_rin' => htmlspecialchars($biaya),
            ];

            $this->db->insert('tb_rincian', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Komponen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/tmbh_rincian/' . $lik3);
        }
    }

    public function permin()
    {
        $data['title'] = 'Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // $id = $data['user']['id'];
        $data['trans'] = $this->Admin_model->getPerminn()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/permin', $data);
        $this->load->view('template/footer', $data);
    }

    public function ubah()
    {
        if (isset($_POST['prog'])) {
            $data = [
                'kode_pro' => htmlspecialchars($this->input->post('kode', true)),
                'program' => htmlspecialchars($this->input->post('program', true)),
                'biaya' => htmlspecialchars($this->input->post('biaya', true))
            ];

            $kd = htmlspecialchars($this->input->post('kd_program', true));
            $this->db->where('kd_program', $kd);
            $this->db->update('tb_program', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        } elseif (isset($_POST['keg'])) {
            $data = [
                'kode_keg' => htmlspecialchars($this->input->post('kode', true)),
                'kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'biaya' => htmlspecialchars($this->input->post('biaya', true))
            ];

            $kd = htmlspecialchars($this->input->post('kd_kegiatan', true));
            $this->db->where('kd_kegiatan', $kd);
            $this->db->update('tb_kegiatan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Kegiatan Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        } elseif (isset($_POST['out'])) {
            $data = [
                'kode_out' => htmlspecialchars($this->input->post('kode', true)),
                'output' => htmlspecialchars($this->input->post('output', true)),
            ];

            $kd = htmlspecialchars($this->input->post('kd_output', true));
            $this->db->where('kd_output', $kd);
            $this->db->update('tb_output', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Output Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        } elseif (isset($_POST['kom'])) {
            $data = [
                'kode_kom' => htmlspecialchars($this->input->post('kode', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true))
            ];

            $kd = htmlspecialchars($this->input->post('kd_komponen', true));
            $this->db->where('kd_komponen', $kd);
            $this->db->update('tb_komponen', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Komponen Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        } elseif (isset($_POST['subkom'])) {
            $data = [
                'kode_sub' => htmlspecialchars($this->input->post('kode', true)),
                'subkomponen' => htmlspecialchars($this->input->post('subkomponen', true))
            ];

            $kd = htmlspecialchars($this->input->post('kd_subkomponen', true));
            $this->db->where('kd_subkomponen', $kd);
            $this->db->update('tb_subkomponen', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Sub Komponen Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        } elseif (isset($_POST['aku'])) {
            $data = [
                'kode_akun' => htmlspecialchars($this->input->post('kode', true)),
                'akun' => htmlspecialchars($this->input->post('akun', true)),
            ];

            $kd = htmlspecialchars($this->input->post('kd_akun', true));
            $this->db->where('kd_akun', $kd);
            $this->db->update('tb_akun', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Akun Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        } elseif (isset($_POST['rin'])) {
            $biaya = $this->input->post('volume', true) * $this->input->post('satuan', true);
            $data = [
                'rincian' => htmlspecialchars($this->input->post('rincian', true)),
                'volume' => htmlspecialchars($this->input->post('volume', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'biaya' => htmlspecialchars($biaya),
            ];

            $kd = htmlspecialchars($this->input->post('kd_rincian', true));
            $this->db->where('kd_rincian', $kd);
            $this->db->update('tb_rincian', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Rincian Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/POK');
        }
    }

    public function get_program()
    {
        if ($_POST['kd_program']) {
            $kd = $_POST['kd_program'];
            $data['prog'] = $this->db->get_where('tb_program', ['kd_program' => $kd])->row();

            $this->load->view('Admin/_program', $data);
        }
    }

    public function get_kegiatan()
    {
        if ($_POST['kd_kegiatan']) {
            $kd = $_POST['kd_kegiatan'];
            $data['keg'] = $this->db->get_where('tb_kegiatan', ['kd_kegiatan' => $kd])->row();

            $this->load->view('Admin/_kegiatan', $data);
        }
    }

    public function get_output()
    {
        if ($_POST['kd_output']) {
            $kd = $_POST['kd_output'];
            $data['out'] = $this->db->get_where('tb_output', ['kd_output' => $kd])->row();

            $this->load->view('Admin/_output', $data);
        }
    }

    public function get_komponen()
    {
        if ($_POST['kd_komponen']) {
            $kd = $_POST['kd_komponen'];
            $data['kom'] = $this->db->get_where('tb_komponen', ['kd_komponen' => $kd])->row();

            $this->load->view('Admin/_komponen', $data);
        }
    }

    public function get_subkomponen()
    {
        if ($_POST['kd_subkomponen']) {
            $kd = $_POST['kd_subkomponen'];
            $data['sub'] = $this->db->get_where('tb_subkomponen', ['kd_subkomponen' => $kd])->row();

            $this->load->view('Admin/_subkomponen', $data);
        }
    }

    public function get_akun()
    {
        if ($_POST['kd_akun']) {
            $kd = $_POST['kd_akun'];
            $data['aku'] = $this->db->get_where('tb_akun', ['kd_akun' => $kd])->row();

            $this->load->view('Admin/_akun', $data);
        }
    }

    public function get_rincian()
    {
        if ($_POST['kd_rincian']) {
            $kd = $_POST['kd_rincian'];
            $data['rin'] = $this->db->get_where('tb_rincian', ['kd_rincian' => $kd])->row();

            $this->load->view('Admin/_rincian', $data);
        }
    }
}
