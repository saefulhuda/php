<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Users extends CI_Controller
{
	use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }
	
	function __construct()
	{
		parent::__construct();
        $this->__resTraitConstruct();

		$this->load->model('Users_model');
		$this->methods['index_get']['limit'] = 30;
	}

	public function index_get() {
		$id = $this->get('id');
		if ($id === null ) {
			$users = $this->Users_model->get_user();
		} else {
			$users = $this->Users_model->get_user($id);
		}
		
		if ($users) {
			$message = [
                'status' 	=> true,
                'data' 		=> $users 
                ];
			$this->set_response($message, 200);
		} 
	}
	public function index_delete() {
		$id = $this->delete('id');
		if ($id === null) {
			$message = [
				'status'  => false,
				'message' => 'Provide an id'];
			$this->set_response($message, 204);
		} else {
			if ($this->Users_model->delete_user($id) > 0) {
				$message = [
                'status' 	=> true,
                'id' 		=> $id,
                'message' 	=> 'Deleted'
                ];
                $this->set_response($message, 200);
			} else {
				$message = [
				'status'  => true,
				'message' => 'Provide an id'];
				$this->set_response($message, 400);
			}
		}
	}
	public function index_post() {
		$data = [
		'id_user' 	=> $this->post('id'),
		'nama_user' => $this->post('nama'),
		'email' 	=> $this->post('email'),
		];
		if ($this->Users_model->create_user($data) > 0) {
			$message = [
            'status' 	=> true,
            'message' 	=> 'Created' ];
            $this->set_response($message, 200);
		} else {
			$message = [
			'status'  => false,
			'message' => 'Data Undefine']	;
			$this->set_response($message, 204);
		}
	}
	public function index_put() {
		$id 	= $this->put('id');
		$data 	= [
		'nama_user' => $this->put('nama'),
		'email' 	=> $this->put('email'),
		];
		if ($this->Users_model->update_user($data, $id) > 0) {
			$message = [
            'status' 	=> true,
            'message' 	=> 'Updated'
                 ];
			$this->set_response($message, 200);

		} else {
			$message = [
			'status'  => false,
			'message' => 'Data Undefine'];
			$this->set_response($message, 400);
		}
	}
}