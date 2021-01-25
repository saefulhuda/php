<?php 

class Users_model extends CI_Model
{
	
	function get_user($id = null) {
		if ($id === null) {
			return $this->db->get('view_kepemilikan_izin')->result_array();
		} else {
			return $this->db->get_where('view_kepemilikan_izin',['id_user'=>$id])->result_array();
		}
		
	}
	function delete_user($id = null) {
		$this->db->delete('view_kepemilikan_izin',['id_user' => $id]);
		return $this->db->affected_rows();
	}
	function create_user($data) {
		$this->db->insert('view_kepemilikan_izin',$data);
		return $this->db->affected_rows();
	}
	function update_user($data, $id) {
		$this->db->update('view_kepemilikan_izin', $data, ['id_user'=>$id]);
		return $this->db->affected_rows();
	}
}