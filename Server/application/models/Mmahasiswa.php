<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmahasiswa extends CI_Model
{

    function get_data()
    {
        $this->db->select("id AS id_mhs, npm AS npm_mhs, nama AS nama_mhs, telepon AS telepon_mhs, jurusan AS jurusan_mhs");
        $this->db->from("tb_mahasiswa");
        $this->db->order_by("npm");
        $query = $this->db->get()->result();
        return $query;
    }
    
    // fungsi hapus data
    function hapus_data($token){
        // cek NPM tersedia
        $this->db->select("npm");
        $this->db->from("tb_mahasiswa");
        $this->db->where("npm='$token'");
        $query=$this->db->get()->result();

        // jika data "NPM" ditemukan
        if(count($query)==1)
        // ($query)!=0) = memungkinkan penarikan data lebih dari 1
        {
            // hapus data
            $this->db->where("npm = '$token'");
            $this->db->delete("tb_mahasiswa");
            $hasil=1;
        }
        // jika data "NPM" tidak ditemukan
        else{
            $hasil=0;
        }
        return $hasil;
    }
}
