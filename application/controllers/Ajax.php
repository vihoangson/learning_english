<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function word_in_cat()
	{
		if(!$_REQUEST["id"]) return false;
		$this->load->model('word');
		header('Content-Type: application/json');
		echo json_encode($this->word->getByCat($_REQUEST["id"]));
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */