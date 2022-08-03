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
			'data' => $this->crud_model->read('tipe_kendaraan')->result()
		];
		$this->load->view('main_layout', $data);
	}

	public function details($kode_tipe){
		$data  = [
			'page' => 'stock/stock_details',
			'data' => $this->crud_model->read('table_kendaraan',['status' => 'stok','kode_tipe' => $kode_tipe])->result(),
		];
		$this->load->view('main_layout', $data);
	}

	public function cari(){
		$data  = [
			'page' => 'stock/stock_cari',
			'data' => $this->crud_model->read('table_kendaraan',['status' => 'stok','no_rangka LIKE' => '%'.$this->input->get('cari').'%'])->result(),
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
			$data['tanggal_jual'] = $this->input->post('tanggal_jual');
			if(empty($data['tanggal_jual'])){
				redirect('stock/view/'.$this->input->post('id_kendaraan').'?message=Isi Semua Data');
			}
		}
		// print_r($data);
		$this->crud_model->update('table_kendaraan',['id_kendaraan' => $this->input->post('id_kendaraan')], $data);
		redirect('stock?message=Data berhasil diubah');
	}

	public function cekRumus()
	{
		$leadTime = 49;
		$leadTimeDemand = $leadTime * 10;
		$safetyStock = (20 * 54) - $leadTimeDemand;
		$reorderPoint = $leadTimeDemand + $safetyStock;

		echo "Lead time :". $leadTime.'<br>';
		echo "Lead time Demand:". $leadTimeDemand.'<br>';
		echo "Safty Stock:". $safetyStock.'<br>';
		echo "Re-order Point:". $reorderPoint.'<br>';
	}
}
