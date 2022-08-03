<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = [
			'page' => 'pembelian/pembelian_add',
			'data_tipe' => $this->crud_model->read('tipe_kendaraan')->result(),
			'data_warna' => $this->crud_model->read('warna_kendaraan')->result(),
		];
		$this->load->view('main_layout', $data);
	}

	public function create()
	{
		$data = [
			'kode_tipe' => $this->input->post('kode_tipe'),
			'kode_warna' => $this->input->post('kode_warna'),
			'no_rangka' => $this->input->post('no_rangka'),
			'cabang' => $this->input->post('cabang'),
			'tanggal_order' => $this->input->post('tanggal_order'),
			'status' => 'stok',
			'id_admin' => $this->session->id_admin
		];
		if((empty($data['cabang'])) && (empty($data['no_rangka'])) && (empty($data['tanggal_order'])))
		{
			$message = 'isi semua data';
			$status = 0;
		}elseif(empty($data['cabang'])){
			$message = 'data belum lengkap';
			$status = 0;
		
		}elseif(empty($data['no_rangka'])){
			$message = 'data belum lengkap';
			$status = 0;
		
		}else{
			$message = 'data berhasil di simpan';
			$status = 1;
			$this->crud_model->create('table_kendaraan', $data);
		}
		
		$this->session->set_flashdata('cabang', $data['cabang']);
		$this->session->set_flashdata('no_rangka', $data['no_rangka']);
		$this->session->set_flashdata('tanggal_order', $data['tanggal_order']);

		redirect(site_url('pembelian').'?status='.$status.'&message='.$message);
	}
}
