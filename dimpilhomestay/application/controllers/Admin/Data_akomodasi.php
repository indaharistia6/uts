<?php

class Data_akomodasi extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda Belum Login!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['akomodasi'] = $this->model_akomodasi->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_akomodasi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_kamar		= $this->input->post('nama_kamar');
		$keterangan		= $this->input->post('keterangan');
		$kategori		= $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');
		$gambar_kamar	= $_FILES['gambar_kamar']['name'];
		if ($gambar_kamar=''){}else{
			$config ['upload_path']		= './uploads';
			$config ['allowed_types']	= 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar_kamar')){
				echo "Gambar Gagal Diupload";
			}else {
				$gambar_kamar=$this->upload->data('file_name');
			}
		}

		$data = array(
			'nama_kamar'	=> $nama_kamar,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar_kamar'	=> $gambar_kamar
		);

		$this->model_akomodasi->tambah_akomodasi($data, 'tb_akomodasi');
		redirect('admin/data_akomodasi/index');
	}

	public function edit($id)
	{
		$where = array('id' =>$id);
		$data['akomodasi'] = $this->model_akomodasi->edit_akomodasi($where, 'tb_akomodasi')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_akomodasi', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id				= $this->input->post('id');
		$nama_kamar		= $this->input->post('nama_kamar');
		$keterangan		= $this->input->post('keterangan');
		$kategori		= $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');

		$data = array(

			'nama_kamar'	=> $nama_kamar,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok
		);

		$where = array(
			'id'	=> $id
		);

		$this->model_akomodasi->update_data($where, $data, 'tb_akomodasi');
		redirect('admin/data_akomodasi/index');
	}

	public function hapus ($id)
	{
		$where = array('id'	=> $id);
		$this->model_akomodasi->hapus_data($where, 'tb_akomodasi');
		redirect('admin/data_akomodasi/index');
	}
}