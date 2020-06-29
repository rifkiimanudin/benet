<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelanggan();
        $data['daftarkan'] = $this->db->get('tb_daftar')->result_array();
        $data['paketkan'] = $this->db->get('tb_paket')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {

        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelangganbyid($id);

        $data['transaksi'] = $this->db->get_where('tb_transaksi', ['id_pelanggan' => $id])->result_array();

        $this->form_validation->set_rules('bulan', 'Bulan');
        $this->form_validation->set_rules('tahun', 'Tahun');
        $this->form_validation->set_rules('harga', 'Tahun');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelanggan' => $id,
                'bulan' => $this->input->post('bulan'),
                'tahun' => $this->input->post('tahun'),
                'tanggal' => date('Y-m-d'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('tb_transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil</div>');
            redirect('pembayaran/detail');
        }
    }
    public function transaksi($id)
    {

        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelangganbyid($id);

        $data['transaksi'] = $this->db->get_where('tb_transaksi', ['id_pelanggan' => $id])->result_array();

        $this->form_validation->set_rules('bulan', 'Bulan');
        $this->form_validation->set_rules('tahun', 'Tahun');
        $this->form_validation->set_rules('harga', 'Tahun');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/detail', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelanggan' => $id,
                'bulan' => $this->input->post('bulan'),
                'tahun' => $this->input->post('tahun'),
                'tanggal' => date('Y-m-d'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('tb_transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil</div>');
            redirect('pembayaran/detail');
        }
    }
    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pembayaran/detail');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_transaksi');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pembayaran/detail');
        }
    }
}
