<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
	
	 public function tipe($params = null)
	 {
		switch ($params) {
			case 'add':
				$data = [
					'page' => 'master/tipe/tipe_add',
				];
				break;
			case 'update':
				$data = [
					'page' => 'master/tipe/tipe_edit',
					'data' => $this->crud_model->read('tipe_kendaraan', ['kode_tipe' => $this->uri->segment(4)])->row(),
				];
				break;
			default:
				$data = [
					'page' => 'master/tipe/tipe_index',
					'data' => $this->crud_model->read('tipe_kendaraan')->result(),
				];
				break;
		}
		
		$this->load->view('main_layout', $data);
	}

	 public function warna($params = null)
	 {
		switch ($params) {
			case 'add':
				$data = [
					'page' => 'master/warna/warna_add',
				];
				break;
			case 'update':
					$data = [
						'page' => 'master/warna/warna_edit',
						'data' => $this->crud_model->read('warna_kendaraan', ['kode_warna' => $this->uri->segment(4)])->row(),
					];
					break;
			default:
				$data = [
					'page' => 'master/warna/warna_index',
					'data' => $this->crud_model->read('warna_kendaraan')->result(),
				];
				break;
		}
		
		$this->load->view('main_layout', $data);
	}

	public function create($params)
	{
		switch ($params) {
			case 'tipe':
					$data = [
						'nama_tipe' => $this->input->post('nama_tipe'),
						'reorderpoint' => $this->input->post('reorderpoint'),
					];
					$this->crud_model->create('tipe_kendaraan', $data);
					redirect('master/tipe');
				break;
			case 'warna':
					$data = [
						'nama_warna' => $this->input->post('nama_warna')
					];
					$this->crud_model->create('warna_kendaraan', $data);
					redirect('master/warna');
				break;
			default:
				# code...
				break;
		}
	}

	public function update($params)
	{
		switch ($params) {
			case 'tipe':
				$data = [
					'nama_tipe' => $this->input->post('nama_tipe'),
					'reorderpoint' => $this->input->post('reorderpoint'),
				];
				$where = [
					'kode_tipe' => $this->input->post('kode_tipe')
				];
				$this->crud_model->update('tipe_kendaraan', $where, $data);
				redirect('master/tipe');
			break;
			case 'warna':
					$data = [
						'nama_warna' => $this->input->post('nama_warna')
					];
					$where = [
						'kode_warna' => $this->input->post('kode_tkode_warnaipe')
					];
					$this->crud_model->create('warna_kendaraan',$where, $data);
					redirect('master/warna');
				break;
			default:
				# code...
				break;
		}
	}

	public function delete($attr, $id)
	{
		switch ($attr) {
			case 'tipe':
				$this->crud_model->delete('tipe_kendaraan', ['kode_tipe' => $id]);
				redirect('master/tipe?message=Tipe berhasil di hapus');
				break;
			case 'warna':
				$this->crud_model->delete('warna_kendaraan', ['kode_warna' => $id]);
				redirect('master/warna?message=Warna berhasil di hapus');
				break;
			
			default:
				# code...
				break;
		}
	}
}
