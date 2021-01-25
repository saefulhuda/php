<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Helper extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		echo "Let we learn helper codeigniter";
	}

	function captcha_help_practice()
	{
		$this->load->helper('captcha');

		$vals = array(
			'word'          => rand(121, 78293),
			'img_path'      => './captcha/',
			'img_url'       => base_url('captcha'),
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
			'colors'		=> array(
			'background'	=> array(255, 255, 255),
			'border' 		=> array(255, 255, 255),
			'text' 			=> array(0, 0, 0),
			'grid' 			=> array(255, 40, 40)
			)
		);

		$cap = create_captcha($vals);
		echo $cap['image'];
	}

	function download_help_practice()
	{
		echo "Download helper";
		$this->load->helper('download');
		force_download(base_url('captcha/1584003834.3299.jpg'), NULL);
	}
}