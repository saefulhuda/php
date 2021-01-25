<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Code using allman style coding
* Dont leave debug on commnet
**/
class Library extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		echo "Let we learn library codeigniter";
	}

	function debug()
	{
		echo '<body onload=alert("Bahaya")>';
	}

	function calendar_lib_practice()
	{
		$prefs = array(
			'start_day'    => 'saturday',
			'month_type'   => 'long',
			'day_type'     => 'short'
		);

		$prefs['template'] = array(
			'table_open'           => '<table class="calendar">',
			'cal_cell_start'       => '<td class="day">',
			'cal_cell_start_today' => '<td class="today">'
		);

		$this->load->library('calendar', $prefs); // define start on day
		echo $this->calendar->generate();
		echo $this->calendar->generate(2010, 8);

		$data = array(
			3  => 'http://example.com/news/article/2006/06/03/',
			7  => 'http://example.com/news/article/2006/06/07/',
			13 => 'http://example.com/news/article/2006/06/13/',
			26 => 'http://example.com/news/article/2006/06/26/'
		);

		echo $this->calendar->generate(2006, 6, $data); //show multiple selected

		echo $this->calendar->generate();

	}

	function shopping_cart_lib_practice()
	{
		$this->load->library('cart');
		$data = array(
			'id'      => 12231,
			'qty'     => 3,
			'price'   => 39.95,
			'name'    => 'Shoes cool',
			'options' => array('Size' => 'L', 'Color' => 'Red') // id, qty, price, name is require while options is option input
		);
		$this->cart->insert($data); // insert into shopping cart class
		$this->cart->update($data); // update into shopping cart class
		var_dump($this->cart->contents()).PHP_EOL; // read shoping cart class

	}

	function mail_lib_practice()
	{
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'saefulhuda54@gmail.com',  // Email gmail
            'smtp_pass'   => "",  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $this->email->from('saefulhuda54@gmail.com', 'Saeful Huda');
        $this->email->to('moshuda204@gmail.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        if ($this->email->send()) 
        {
        	echo "Terkirim";
        }
        else
        {
        	echo "Email gagal";
        }
    }

    function output_lib_practice()
    {
    	$this->output
    	->set_content_type('application/json')
    	->set_output(json_encode(array('foo' => 'bar'))); // show output array to json

    	$this->output
    	->set_content_type('jpeg') // You could also use ".jpeg" which will have the full stop removed before looking in config/mimes.php
    	->set_output(file_get_contents('https://images.pexels.com/photos/1236701/pexels-photo-1236701.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500')); // show ouptput to image

    	// $this->output->set_content_type('text/plain', 'UTF-8');
    	// echo $this->output->get_header('content-type');

    	$response = array('status' => 'OK');

    	$this->output
    	->set_status_header(200)
    	->set_content_type('application/json', 'utf-8')
    	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    	->_display();
    	exit;
    }

    function pagination_lib_practice()
    {
    	$this->load->library('pagination');
    	$config['base_url'] = base_url().'index.php/library/pagination_lib_practice';
    	$config['total_rows'] = 100;
    	$config['per_page'] = 20;

    	for ($i=0; $i <= $this->uri->segment(3); $i++) 
    	{
    		$data[] = $i;
    	}
    	print_r($data).PHP_EOL;

    	$this->pagination->initialize($config);
    	echo $this->pagination->create_links();
    }

    function security_lib_practice()
    {
    	echo form_open('index.php/library/security_lib_practice');
    	echo form_input(['name'=>'string']);
    	echo form_submit(['name'=>'submit', 'value'=>'Sanitize']);
    	if (isset($_POST['submit'])) 
    	{
    		$clean = $this->security->xss_clean($this->input->post('string',TRUE));
    		echo $clean;
    	}
    }

    function unit_testing_lib_practice()
    {
    	$this->load->library('unit_test');
    	$test = 11 + 1;

    	$expected_result = 12;

    	$test_name = 'Adds one plus one';

    	echo $this->unit->run($test, $expected_result, $test_name);
    }

    function agent_lib_practice()
    {
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
            $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        echo $agent;

        echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
    }

    function maps_lib_practice()
    {
        $this->load->library('googlemaps');
            $config                 = array();
            $config['center']       = "-6.1783052,106.650149";
            $config['zoom']         = 20;
            $config['map_height']   = "400px";
            $this->googlemaps->initialize($config);
            $marker=array();
            $marker['position']     ="-6.178244, 106.650321";
            $this->googlemaps->add_marker($marker);
            $data['map']=$this->googlemaps->create_map();
        $this->load->view('v_map',$data);
    }
}