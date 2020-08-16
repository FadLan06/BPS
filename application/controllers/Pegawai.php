<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('Dasar_model');
        $this->load->model('Admin_model');
        if ($this->session->userdata('role_id') != 1) {
            if ($this->session->userdata('role_id') != 2) {
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
        $this->load->view('pegawai/index', $data);
        $this->load->view('template/footer', $data);
    }

    function aksi()
    {
        if (isset($_POST['formper'])) {
            $kd = rand();
            $data = [
                'kd_transaksi' => $kd,
                'kd_program' => htmlspecialchars($this->input->post('program', true)),
                'kd_kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
                'kd_output' => htmlspecialchars($this->input->post('output', true)),
                'kd_komponen' => htmlspecialchars($this->input->post('komponen', true)),
                'kd_subkomponen' => htmlspecialchars($this->input->post('subkomponen', true)),
                'kd_akun' => htmlspecialchars($this->input->post('akun', true)),
                'kd_rincian' => htmlspecialchars($this->input->post('rincian', true)),
                'user' => htmlspecialchars($this->input->post('user', true)),
                'volume_trans' => htmlspecialchars($this->input->post('volume', true)),
                'tgl' => htmlspecialchars(time()),
                'biaya_trans' => 0,
                'sisa' => htmlspecialchars($this->input->post('sisa', true)),
                'status' => 0,

            ];

            $this->db->insert('tb_transaksi', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/tmbh_FormPer/' . $kd);
        } elseif (isset($_POST['vol'])) {
            $kd = rand();
            $kd_trans = htmlspecialchars($this->input->post('kd_transaksi', true));
            $data = [
                'kd_volume' => $kd,
                'kd_transaksi' => htmlspecialchars($kd_trans),
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'volume' => htmlspecialchars($this->input->post('volume', true)),
                'satuan' => htmlspecialchars($this->input->post('satuan', true)),
                'biaya' => 0,
                'tgl_vol' => date('Y-m-d'),
            ];

            $this->db->insert('tb_volume', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/tmbh_FormPer/' . $kd_trans);
        } elseif (isset($_POST['rinvol'])) {
            $kd = rand();
            $kd_volume = htmlspecialchars($this->input->post('kd_volume', true));
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $data = [
                'kd_rincianvol' => htmlspecialchars($kd),
                'kd_volume' => htmlspecialchars($kd_volume),
                'uraian_vol' => htmlspecialchars($this->input->post('uraian', true)),
                'volume_vol' => htmlspecialchars($this->input->post('volume', true)),
                'satuan_vol' => htmlspecialchars($this->input->post('satuan', true)),
                'harga_vol' => htmlspecialchars($this->input->post('harga', true)),
                'biaya_vol' => htmlspecialchars($this->input->post('volume', true) * $this->input->post('harga', true))
            ];

            $this->db->insert('tb_rincianvol', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/tmbh_Volume/' . $kd_volume . '/' . $kd_trans);
        } elseif (isset($_POST['rinvol1'])) {
            $kd = rand();
            $kd_volume = htmlspecialchars($this->input->post('kd_volume', true));
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $data = [
                'kd_rincianvol' => htmlspecialchars($kd),
                'kd_volume' => htmlspecialchars($kd_volume),
                'uraian_vol' => htmlspecialchars($this->input->post('uraian', true)),
                'volume_vol' => htmlspecialchars($this->input->post('volume', true)),
                'satuan_vol' => htmlspecialchars($this->input->post('satuan', true)),
                'harga_vol' => htmlspecialchars($this->input->post('harga', true)),
                'biaya_vol' => htmlspecialchars($this->input->post('volume', true) * $this->input->post('harga', true))
            ];

            $this->db->insert('tb_rincianvol', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/edit_Volume/' . $kd_volume . '/' . $kd_trans);
        } elseif (isset($_POST['total'])) {
            $kd_volume = htmlspecialchars($this->input->post('kd_volume', true));
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $data = [
                'biaya' => htmlspecialchars($this->input->post('hasil', true))
            ];

            $this->db->where('kd_volume', $kd_volume);
            $this->db->update('tb_volume', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/tmbh_FormPer/' . $kd_trans);
        } elseif (isset($_POST['total1'])) {
            $kd_volume = htmlspecialchars($this->input->post('kd_volume', true));
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $data = [
                'biaya' => htmlspecialchars($this->input->post('hasil', true))
            ];

            $this->db->where('kd_volume', $kd_volume);
            $this->db->update('tb_volume', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/edit_FormPer/' . $kd_trans);
        } elseif (isset($_POST['anggaran'])) {
            $kd_trans = htmlspecialchars($this->input->post('kd_trans', true));
            $kd_rincian = htmlspecialchars($this->input->post('kd_rincian', true));
            $data = ['biaya_trans' => htmlspecialchars($this->input->post('sisa', true))];
            $dataa = ['sisa_rin' => htmlspecialchars($this->input->post('sisa', true))];

            $this->db->where('kd_transaksi', $kd_trans);
            $this->db->update('tb_transaksi', $data);
            $this->db->where('kd_rincian', $kd_rincian);
            $this->db->update('tb_rincian', $dataa);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Program Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai/Permin');
        }
    }

    public function formper()
    {
        $data['title'] = 'Form Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['program'] = $this->db->get('tb_program')->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/formper', $data);
        $this->load->view('template/footer', $data);
    }

    public function tmbh_formper()
    {
        $data['title'] = 'Form Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['program'] = $this->db->get('tb_program')->result();
        $data['volume'] = $this->db->get_where('tb_volume', ['kd_transaksi' => $this->uri->segment(3)])->result();
        $data['formper'] = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $this->uri->segment(3)])->row();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/tmbh_formper', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_formper()
    {
        $data['title'] = 'Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['program'] = $this->db->get('tb_program')->result();
        $data['volume'] = $this->db->get_where('tb_volume', ['kd_transaksi' => $this->uri->segment(3)])->result();
        $data['formper'] = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $this->uri->segment(3)])->row();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/edit_formper', $data);
        $this->load->view('template/footer', $data);
    }

    function hps_formper($id)
    {
        $this->db->where('kd_volume', $id);
        $this->db->delete('tb_volume');
        $this->db->where('kd_volume', $id);
        $this->db->delete('tb_rincianvol');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data SPT Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/tmbh_FormPer/' . $this->uri->segment(4) . '');
    }

    function hps_formper1($id)
    {
        $this->db->where('kd_volume', $id);
        $this->db->delete('tb_volume');
        $this->db->where('kd_volume', $id);
        $this->db->delete('tb_rincianvol');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data SPT Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/edit_FormPer/' . $this->uri->segment(4) . '');
    }

    public function tmbh_volume()
    {
        $data['title'] = 'Form Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['trans'] = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $this->uri->segment(4)])->row();
        $data['volume'] = $this->db->get('tb_rincianvol')->row();
        $data['rinvolume'] = $this->db->get_where('tb_rincianvol', ['kd_volume' => $this->uri->segment(3)])->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/tmbh_volume', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_volume()
    {
        $data['title'] = 'Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['trans'] = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $this->uri->segment(4)])->row();
        $data['volume'] = $this->db->get('tb_rincianvol')->row();
        $data['rinvolume'] = $this->db->get_where('tb_rincianvol', ['kd_volume' => $this->uri->segment(3)])->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/edit_volume', $data);
        $this->load->view('template/footer', $data);
    }

    function hps_volume($id)
    {
        $this->db->where('kd_rincianvol', $id);
        $this->db->delete('tb_rincianvol');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data SPT Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/tmbh_Volume/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '');
    }

    function hps_volume1($id)
    {
        $this->db->where('kd_rincianvol', $id);
        $this->db->delete('tb_rincianvol');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data SPT Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/edit_Volume/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '');
    }

    public function tmbh_anggaran()
    {
        $data['title'] = 'Form Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['trans'] = $this->Admin_model->getTransaksi()->row();
        $data['volume'] = $this->db->get_where('tb_volume', ['kd_transaksi' => $this->uri->segment(3)])->result();
        $data['rincianvol'] = $this->Admin_model->getVol()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/tmbh_anggaran', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_anggaran()
    {
        $data['title'] = 'Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['trans'] = $this->Admin_model->getTransaksi()->row();
        $data['volume'] = $this->db->get_where('tb_volume', ['kd_transaksi' => $this->uri->segment(3)])->result();
        $data['rincianvol'] = $this->Admin_model->getVol()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/edit_anggaran', $data);
        $this->load->view('template/footer', $data);
    }

    public function listKegiatan()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_program = $this->input->post('kd_program');

        $kegiatan = $this->db->get_where('tb_kegiatan', ['kd_program' => $kd_program])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--- Pilih ---</option>";

        foreach ($kegiatan as $data) {
            $lists .= "<option value='" . $data->kd_kegiatan . "'>" . $data->kode_keg . " - " . $data->kegiatan . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_kegiatan' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listOutput()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_kegiatan = $this->input->post('kd_kegiatan');

        $output = $this->db->get_where('tb_output', ['kd_kegiatan' => $kd_kegiatan])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--- Pilih ---</option>";

        foreach ($output as $data) {
            $lists .= "<option value='" . $data->kd_output . "'>" . $data->kode_out . " - " . $data->output . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_output' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listKomponen()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_output = $this->input->post('kd_output');

        $komponen = $this->db->get_where('tb_komponen', ['kd_output' => $kd_output])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--- Pilih ---</option>";

        foreach ($komponen as $data) {
            $lists .= "<option value='" . $data->kd_komponen . "'>" . $data->kode_kom . " - " . $data->komponen . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_komponen' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listSubKomponen()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_komponen = $this->input->post('kd_komponen');

        $subkomponen = $this->db->get_where('tb_subkomponen', ['kd_komponen' => $kd_komponen])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--- Pilih ---</option>";

        foreach ($subkomponen as $data) {
            $lists .= "<option value='" . $data->kd_subkomponen . "'>" . $data->kode_sub . " - " . $data->subkomponen . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_subkomponen' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listAkun()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_subkomponen = $this->input->post('kd_subkomponen');

        $akun = $this->db->get_where('tb_akun', ['kd_subkomponen' => $kd_subkomponen])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--- Pilih ---</option>";

        foreach ($akun as $data) {
            $lists .= "<option value='" . $data->kd_akun . "'>" . $data->kode_akun . " - " . $data->akun . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_akun' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listRincian()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_akun = $this->input->post('kd_akun');

        $rincian = $this->db->get_where('tb_rincian', ['kd_akun' => $kd_akun])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--- Pilih ---</option>";

        foreach ($rincian as $data) {
            $lists .= "<option value='" . $data->kd_rincian . "'>" . $data->rincian . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_rincian' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listSisa()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kd_rincian = $this->input->post('kd_rincian');

        $sisa = $this->db->get_where('tb_rincian', ['kd_rincian' => $kd_rincian])->result();

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "";

        foreach ($sisa as $data) {
            // $lists .= "<option value='" . $data->sisa_rin . "'>" . $data->sisa_rin . "</option>"; // Tambahkan tag option ke variabel $lists
            $lists .= "<label for='sisa'>Sisa Anggaran</label><input type='text' class='form-control' id='sisa' name='sisa' value='" . $data->sisa_rin . "' readonly>";
        }

        $callback = array('list_sisa' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function permin()
    {
        $data['title'] = 'Permintaan';
        $data['judul'] = 'SI Raba';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $data['user']['id'];
        $data['trans'] = $this->Admin_model->getPermin($id)->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/permin', $data);
        $this->load->view('template/footer', $data);
    }

    public function cetak()
    {
        $data['trans'] = $this->Admin_model->getTransaksi()->row();
        $data['volume'] = $this->db->get_where('tb_volume', ['kd_transaksi' => $this->uri->segment(3)])->result();
        $data['rincianvol'] = $this->Admin_model->getVol()->result_array();
        $id = $data['trans']->user;
        $data['nama'] = $this->Admin_model->nama($id)->row();

        $this->load->library('pdf');

        $this->pdf->setPaper('Legal', 'potrait');
        $this->pdf->filename = $data['nama']->nip . ' - Formulir Permintaan.pdf';
        $this->pdf->load_view('pegawai/cetak', $data);
        // $this->load->view('data/cetak_spt', $data);
    }

    public function ttd_pegawai()
    {
        $data['title'] = 'Form Permintaan';
        $data['judul'] = 'TTD Form Permintaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['data'] = $this->db->get_where('tb_transaksi', ['kd_transaksi' => $this->uri->segment(3)])->row();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pegawai/ttd_pegawai', $data);
        $this->load->view('template/footer', $data);
    }

    public function simpan1()
    {
        if (isset($_POST['signaturesubmit'])) {
            $signature = $_POST['signature'];
            $signatureFileName = uniqid() . '.png';
            $signature = str_replace('data:image/png;base64,', '', $signature);
            $signature = str_replace(' ', '+', $signature);
            $data = base64_decode($signature);
            $file = 'assets/img/ttd_pegawai/' . $signatureFileName;
            file_put_contents($file, $data);

            $id = $this->input->post('kd_transaksi');
            $data = ['ttd_pegawai' => $signatureFileName];

            $this->db->where('kd_transaksi', $id);
            $this->db->update('tb_transaksi', $data);

            $this->session->set_flashdata('flash', '<div class="alert alert-success">Signature Uploaded</div>');
            redirect('Pegawai/tmbh_Anggaran/' . $id);
        }
    }
}
