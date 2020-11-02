<?php 

class Model_kategori extends CI_Model{

	//kalo ingin menampilkan semua data tinggal get saja, tp kalo hanya menampilkan beberapa pakai get_where

	//return untuk mengulang mengambil data
	public function data_double(){
		return $this->db->get_where("tb_akomodasi", array('kategori' => 'double')); //mengambil data dari tb_akomodasi yang kategorinya adalah double dan direturn
	}
}