<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Server.php';

class Mahasiswa extends Server
{

	// buat fungsi get
	function service_get()
	{
		// panggil model Mmahasiswa
		$this->load->model("Mmahasiswa", "mdl", TRUE);

		// panggil fungsi "get_data"
		$hasil = $this->mdl->get_data();

		// memberikan response
		$this->response(array("mahasiswa" => $hasil), 200);
	}


	// buat fungsi post
	function service_post()
	{
	}



	// buat fungsi put
	function service_put()
	{
	}



	// buat fungsi delete
	function service_delete()
	{
		$this->load->model("Mmahasiswa","mdl",TRUE);
		// ambil parameter NPM
		$token=$this->delete("npm");
		// panggil method "hapus_data"
		$hasil=$this->mdl->hapus_data($token);
		// jika data berhasil dihapus
		if($hasil ==1){
			$this->response(array("status"=>"data berhasil dihapus"),200);
		}
		// jika data gagal dihapus
		else{
			$this->response(array("status"=>"data gagal dihapus!"),200);
		}
	}
}
