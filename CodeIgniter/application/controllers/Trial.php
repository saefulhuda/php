<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Trial extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// $this->model->insert('title table', 'content for table');
	}

	function great($name = '')
	{
		print('Hello {$name}');
	}
}