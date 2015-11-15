<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Word extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/word/index');
	}

}

/* End of file word.php */
/* Location: ./application/controllers/admin/word.php */