<?php 

class Model_buku_tamu extends CI_Model{
	public function index()
	{
		$invoice = array (
			'nama_lengkap'	=> $nama_lengkap,
			'alamat'		=> $alamat,
			'no_hp'			=> $no_hp,
			'jk'			=> $jk,
			'email'			=> $email,
			'komentar'		=> $komentar

		);

		$this->db->insert('tb_buku_tamu', $buku_tamu);
		$id_buku_tamu = $this->db->insert_id();

	}

	public function tampil_data()
	{
		$result = $this->db->get('tb_buku_tamu');
		if($result->num_rows() > 0){
			return $result->result();
		} else{
			return FALSE;
		}
	}

	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->row();
		}else {
			return false;
		}
	}

	public function ambil_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}
}