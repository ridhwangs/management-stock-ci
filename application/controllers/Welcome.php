<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
			'page' => 'page_dashboard' ,
			'stock' => $this->crud_model->read('tipe_kendaraan')->result(),
			
		];
		if($this->session->is_marketing == TRUE):
			$data['data'] = $this->crud_model->read('table_kendaraan',['status' => 'terjual','id_marketing' => $this->session->is_marketing, 'MONTH(tanggal_jual)' => date('m')])->result();
		endif;
		$this->load->view('main_layout', $data);
	}
}
