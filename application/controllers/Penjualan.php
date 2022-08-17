<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
		
		if(!empty($this->input->get('tgl_awal')) && !empty($this->input->get('tgl_akhir'))){
			$where = [
				'tanggal_jual >=' => $this->input->get('tgl_awal'),
				'tanggal_jual <=' => $this->input->get('tgl_akhir')
			];
		}elseif(!empty($this->input->get('tgl_awal'))){
			$where = [
				'tanggal_jual >=' => $this->input->get('tgl_awal'),
			];
		}elseif(!empty($this->input->get('tgl_akhir'))){
			$where = [
				'tanggal_jual <=' => $this->input->get('tgl_akhir'),
			];
		}
		$where['status'] = 'terjual';
		$data = [
			'page' => 'penjualan/penjualan_index',
			'data' => $this->crud_model->read('table_kendaraan', $where, 'tanggal_jual', 'ASC')->result(),
		];
		$this->load->view('main_layout', $data);
	}
}
