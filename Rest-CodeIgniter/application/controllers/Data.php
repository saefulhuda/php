<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
* 
*/
class Data extends CI_Controller
{
	use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }
	
	function __construct()
	{
		$this->__resTraitConstruct();
		parent::__construct();	
		$this->load->model('Data_model','data');
	}
	function index_get() {
		$id = $this->get('id');
		if ($id === null ) {
			$imb = $this->data->get_imb();
		} else {
			$imb = $this->data->get_imb($id);
		}
		
		if ($imb) {
			$message = [
                'status' 	=> true,
                'data' 		=> $imb 
                ];
			$this->set_response($message, 200);
		}
	}
}