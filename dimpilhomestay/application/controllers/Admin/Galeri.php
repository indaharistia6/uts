<?php

class Galeri extends CI_Controller{

	public function index()
	{
		$data['galeri'] = $this->model_galeri->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/galeri', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$judul			= $this->input->post('judul');
		$deskripsi		= $this->input->post('deskripsi');
		$tanggal		= $this->input->post('tanggal');
		$gambar_galeri	= $_FILES['gambar_galeri']['name'];
		if ($gambar_galeri=''){}else{
			$config ['upload_path']		= './uploads';
			$config ['allowed_types']	= 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar_galeri')){
				echo "Gambar Gagal Diupload";
			}else {
				$gambar_galeri=$this->upload->data('file_name');
			}
		}

		$data = array(
			'judul'			=> $judul,
			'deskripsi'		=> $deskripsi,
			'tanggal'		=> $tanggal,
			'gambar_galeri'	=> $gambar_galeri
		);

		$this->model_galeri->tambah_galeri($data, 'tb_galeri');
		redirect('admin/galeri/index');
	}

	public function edit($id_galeri)
	{
		$where = array('id_galeri' =>$id_galeri);
		$data['galeri'] = $this->model_galeri->edit_galeri($where, 'tb_galeri')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_galeri', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id_galeri		= $this->input->post('id_galeri');
		$judul			= $this->input->post('judul');
		$deskripsi		= $this->input->post('deskripsi');
		$tanggal		= $this->input->post('tanggal');

		$data = array(

			'judul'			=> $judul,
			'deskripsi'		=> $deskripsi,
			'tanggal'		=> $tanggal
		);

		$where = array(
			'id_galeri'	=> $id_galeri
		);

		$this->model_galeri->update_data($where, $data, 'tb_galeri');
		redirect('admin/galeri/index');
	}

	public function hapus ($id_galeri)
	{
		$where = array('id_galeri'	=> $id_galeri);
		$this->model_galeri->hapus_data($where, 'tb_galeri');
		redirect('admin/galeri/index');
	}
}