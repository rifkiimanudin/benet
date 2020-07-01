<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function pendaftaran()
    {
        $data['title'] = 'Data Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pendaftar'] = $this->db->get('tb_daftar')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemesanan/pendaftaran', $data);
        $this->load->view('templates/footer');
    }

    public function form()
    {
        $data['title'] = 'Formulir Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('ktp', 'KTP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat tanggal lahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pemesanan/form', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'ktp' => $this->input->post('ktp'),
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->db->insert('tb_daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('pemesanan/pendaftaran');
        }
    }
    public function ubah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('ttl', 'tanggallahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('ktp', 'ktp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Gagal Di Edit");
            redirect('pendaftaran');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'telp' => $this->input->post('telp'),
                'ktp' => $this->input->post('ktp'),
                'alamat' => $this->input->post('alamat')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_daftar', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('pemesanan/pendaftaran');
        }
    }
    public function delete_daftar($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pemesanan/pendaftaran');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_daftar');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pemesanan/pendaftaran');
        }
    }

    public function paket()
    {
        $data['title'] = 'Paket Be Net';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['paket'] = $this->db->get('tb_paket')->result_array();

        $this->form_validation->set_rules('nama_paket', 'nama_paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'kecepatan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pemesanan/paket', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_paket' => $this->input->post('nama_paket'),
                'kecepatan' => $this->input->post('kecepatan'),
                'harga' => $this->input->post('harga')

            ];
            $this->db->insert('tb_paket', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Paket Berhasil Ditambahkan!</div>');
            redirect('pemesanan/paket');
        }
    }
    public function edit_pkt()
    {
        $this->form_validation->set_rules('nama_paket', 'nama_paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'kecepatan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Gagal Di Edit");
            redirect('paket');
        } else {
            $data = array(
                'nama_paket' => $this->input->post('nama_paket'),
                'kecepatan' => $this->input->post('kecepatan'),
                'harga' => $this->input->post('harga')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_paket', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('pemesanan/paket');
        }
    }
    public function delete_pkt($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pemesanan/paket');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_paket');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pemesanan/paket');
        }
    }

    public function pelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model', 'pelanggan');

        $data['pelanggan'] = $this->pelanggan->getPelanggan();
        $data['daftarkan'] = $this->db->get('tb_daftar')->result_array();
        $data['paketkan'] = $this->db->get('tb_paket')->result_array();


        $this->form_validation->set_rules('id_daftar', 'Daftar', 'required');
        $this->form_validation->set_rules('id_paket', 'Paket', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pemesanan/pelanggan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_daftar' => $this->input->post('id_daftar'),
                'id_paket' => $this->input->post('id_paket'),
                'tanggal' => date('Y-m-d'),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('tb_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pelanggan Telah di daftarkan</div>');
            redirect('pemesanan/pelanggan');
        }
    }

    public function edit_pl($id)

    {
        $this->form_validation->set_rules('id_daftar', 'Daftar', 'required');
        $this->form_validation->set_rules('id_paket', 'Paket', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Data Gagal Di Edit");
            redirect('pemesanan/pelanggan');
        } else {
            $data = array(
                'id_daftar' => $this->input->post('id_daftar'),
                'id_paket' => $this->input->post('id_paket'),
                'tanggal' => date('Y-m-d'),
                'status' => $this->input->post('status')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_pelanggan', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('pemesanan/pelanggan');
        }
    }
    public function delete($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pemesanan/pelanggan');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_pelanggan');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pemesanan/pelanggan');
        }
    }
}
