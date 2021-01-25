<?php 
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;

class Data extends Home
{
    use ResponseTrait;
	public $raw = ['Nama' => 'Saeful Huda', 'NIM' => '201581232'];
	public function index()
	{
		return view('welcome_message');
	}

	public function raw()
	{
		$data['mahasiswa'] = $this->processor($this->raw);
		echo view('data', $data);
	}

	function docker()
	{
		$this->response->setHeader('Location', 'http://example.com')
         ->setHeader('WWW-Authenticate', 'Negotiate');
		$data = ['success' => TRUE, 'status' => 1, 'data' => $this->raw];
		// return $this->response->setJSON($data);
		// return $this->response->setXML($data);
		$data = 'Here is some text!';
		$name = 'mytext.txt';
		return $this->response->download($name, $data);
	}

	function database()
	{
		$db = \Config\Database::connect('smartsore');
		$users = $db->query("SELECT * FROM users")->getResult('array');
		return $this->response->setJSON($users);
	}

	function curl()
	{
		$key = 'e41d6fe760e64f9bb020399a2d356964';
		$url = 'http://newsapi.org/v2/top-headlines?country=id&apiKey=' . $key;
		$curl = \Config\Services::curlrequest();
		$get = $curl->request('GET', $url);
	}

	//--------------------------------------------------------------------

}
