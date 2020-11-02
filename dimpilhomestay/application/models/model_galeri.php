<?php

class Model_galeri extends CI_Model{

	public function tampil_data(){
		return $this->db->get('tb_galeri');
	}

	public function tambah_galeri($data, $table){
		$this->db->insert($table,$data);
	}

	public function edit_galeri($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id_galeri){
		$result = $this->db->where('id_galeri', $id_galeri)
						   ->limit(1)
						   ->get('tb_galeri');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_galeri($id_galeri)
	{
		$result = $this->db->where('id_galeri',$id_galeri)->get('tb_galeri');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}
}