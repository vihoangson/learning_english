<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vocabulary extends CI_Model {

	public function getAll($id_lesson){
		$data = ($this->db->get('word')->result_array());
		return $data;
	}

	public function getById($id){
		$this->db->where('id', $id);
		$data = ($this->db->get('word')->result_array());
		return $data;
	}

	public function getByCat($id_cat){
		$this->db->where('word_id_cat', $id_cat);
		$data = ($this->db->get('word')->result_array());
		return $data;
	}

	public function get_cat_name($cat_id){
		switch ($cat_id) {
			case 1:
				return "animal";
				break;

			default:
				return "animal";
				break;
		}
	}

	public function get_list_audio(){
		$list_dir = scandir(APPPATH."../asset/audio/");
		foreach ($list_dir as $key => $value) {
			preg_match("/([a-z]+)/", $value,$match);
			$return[$match[1]] = $value;
		}

		return $return;
	}

	public function get_list_image(){
		$list_dir = scandir(APPPATH."../asset/images/");
		foreach ($list_dir as $key => $value) {
			preg_match("/([\w]+)_/", $value,$match);
			$return[strtolower($match[1])] = $value;
		}

		return $return;
	}

	public function insert_vocabulary($data){
		if(!$data["word_name"]) return false;
		$this->db->insert('word', $data);
	}

	public function insert_word_form_array($array=[]){
		if($array["word_name"]=="") return fasle;
	}
}

/* End of file vocabulary.php */
/* Location: ./application/models/vocabulary.php */