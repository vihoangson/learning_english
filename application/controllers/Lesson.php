<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

	public function index()
	{
		$this->load->view('lesson/index');
	}

	public function list_v()
	{
		$this->load->model('vocabulary');
		$data = ["data" => $this->vocabulary->getAll()];
		$this->load->view('lesson/list',$data);
	}
}

/* End of file lesson.php */
/* Location: ./application/controllers/lesson.php */