<?php

class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  Anda Belum Login!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('auth/login');
		}
	}

	public function booking($id)
	{
		$akomodasi = $this->model_akomodasi->find($id);

		//dari dokumentasi codeigniter

		$data = array(
	        'id'      => $akomodasi->id,
	        'qty'     => 1,
	        'price'   => $akomodasi->harga,
	        'name'    => $akomodasi->nama_kamar,
	);

	$this->cart->insert($data);
	redirect('welcome');

	}

	public function detail_booking()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('booking');
		$this->load->view('templates/footer');
	}

	public function hapus_booking()
	{
		$this->cart->destroy();
		redirect('welcome');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}

	public function proses_pembayaran()
	{
		$is_processed = $this->model_invoice->index();
		if($is_processed) {
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pembayaran');
			$this->load->view('templates/footer');
		} else {
			echo "Maaf Pesanan Anda Gagal Diproses";
		}
		
	}

	public function detail($id)
	{
		$data['akomodasi'] = $this->model_akomodasi->detail_akomodasi($id);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_akomodasi',$data);
		$this->load->view('templates/footer');
	}

	public function buku_tamu()
	{
		$data['buku_tamu'] = $this->model_buku_tamu->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('buku_tamu',$data);
		$this->load->view('templates/footer');
	}
}