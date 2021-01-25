<?php 
/**
* 
*/
class Data_model extends CI_Model
{
	
	function get_imb($id = null) {
		if ($id === null) {
			return $this->db->get('view_kepemilikan_izin')->result_array();
		} else {
			return $this->db->get_where('view_kepemilikan_izin',['nomor_izin'=>$id])->result_array();
		}
	}
}