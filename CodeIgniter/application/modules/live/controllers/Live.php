<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Live extends MX_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		echo "Live store";
	}
}