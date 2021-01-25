<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trial_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function create_table()
	{
		$sql = "CREATE TABLE good (id int, title varchar(255), content varchar(255))";
		$this->db->query($sql);
	}

	function insert($title, $content) 
	{
		$show_table = $this->db->query("SHOW TABLES LIKE 'good'");
		if (count($show_table->result()) > 0)
		{
			echo "Ada table";
		}
		else
		{
			$this->create_table();
			echo "Table tidak ada";
		}
	}
}