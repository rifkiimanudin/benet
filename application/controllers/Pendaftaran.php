<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }


    public function index()
    {
        $data['title'] = 'Data Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->db->get('tb_daftar')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('ttl', 'tanggallahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('ktp', 'ktp', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ttl' => $this->input->post('ttl'),
                'telp' => $this->input->post('telp'),
                'ktp' => $this->input->post('ktp'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->db->insert('tb_daftar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('pendaftaran');
        }
    }
    public function ubah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('ttl', 'tanggallahir', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');
        $this->form_validation->set_rules('ktp', 'ktp', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
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
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat')
            );
            $this->db->where('id', $_POST['id']);
            $this->db->update('tb_daftar', $data);
            $this->session->set_flashdata('sukses', "Data Berhasil Diedit");
            redirect('pendaftaran');
        }
    }

    public function delete($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('pendaftaran');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('tb_daftar');
            $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
            redirect('pendaftaran');
        }
    }
}
