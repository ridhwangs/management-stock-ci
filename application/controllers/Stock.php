<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

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
			'page' => 'stock/stock_index',
			'data' => $this->crud_model->read('table_kendaraan', ['status' => 'stok'])->result()
		];
		$this->load->view('main_layout', $data);
	}

	public function view($id)
	{
		$data = [
			'page' => 'stock/stock_update',
			'data_tipe' => $this->crud_model->read('tipe_kendaraan')->result(),
			'data_warna' => $this->crud_model->read('warna_kendaraan')->result(),
			'data_marketing' => $this->crud_model->read('marketing')->result(),
			'data' => $this->crud_model->read('table_kendaraan', ['id_kendaraan' => $id])->row()
		];
		$this->load->view('main_layout', $data);
	}

	public function update()
	{
		$data = [
			'cabang' => $this->input->post('cabang'),
			'status' => $this->input->post('status'),
		];
		if($data['status'] == 'terjual'){
			$data['id_marketing'] = $this->input->post('id_marketing');
		}
		$this->crud_model->update('table_kendaraan',['id_kendaraan' => $this->input->post('id_kendaraan')], $data);
		redirect('stock');
	}
}
