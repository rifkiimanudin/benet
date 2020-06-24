<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function getPelanggan()
    {
        $query = "SELECT *
            FROM tb_pelanggan AS pelanggan
           INNER JOIN tb_paket AS paket
           ON paket.id = pelanggan.id_paket
           INNER JOIN tb_daftar AS daftar
           ON daftar.id = pelanggan.id_daftar";
        return $this->db->query($query)->result_array();
    }

    public function getPaket()
    {
        $query = "SELECT `tb_data`.*, `tb_data`.`id_paket`
                  FROM `tb_paket` JOIN `tb_data`
                  ON `tb_data`.`id_paket` = `tb_paket`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
}
