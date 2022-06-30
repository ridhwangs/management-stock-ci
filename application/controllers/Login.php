<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if($this->session->logged_in == true){
			redirect('welcome');
		}else{
			$this->load->view('view_login');
		}
	
	}

	public function doLogin()
	{
		$where = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];
		$query = $this->crud_model->read('admin_gudang', $where);
		$cek = $query->num_rows();
		if($cek > 0){
			// user ditemukan
			$status = 1;
			$data = $query->row();
			$newdata = array(
					'username'  => $where['username'],
					'id_admin' 	=> $data->id_admin,
					'logged_in' => TRUE,
					'is_marketing' => FALSE,
			);
			$this->session->set_userdata($newdata);
		}else{
		
			// cek user marketing
			$m_query = $this->crud_model->read('marketing', $where);
			$m_cek = $m_query->num_rows();
			if($m_cek > 0){
				$status = 1;
				$m_data = $m_query->row();
				$newdata = array(
						'username'  => $where['username'],
						'id_marketing' 	=> $m_data->id_admin,
						'logged_in' => TRUE,
						'is_marketing' => TRUE,
				);
				$this->session->set_userdata($newdata);
				// marketing ditemukan
			}else{
					// user tidak ditemukan
				$status = 0;
			}
		}

		redirect($this->agent->referrer().'?status='.$status);
	}

	public function doLogout()
	{
		$status = 1;
		$newdata = array(
				'username'  => "",
				'logged_in' => FALSE
		);
		$this->session->set_userdata($newdata);
		redirect('login');
	}
}
