<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_word extends CI_Controller {

	public function index()
	{
		$this->load->model('word');
		$this->load->view('admin/word/index');
	}

	public function get_link_for_word_audio(){
		$this->load->model('word');
		$none_audio = $this->word->get_word_none_audio();
		print_r($this->word->strtolower_all_word_name());
		foreach ($none_audio as $key => $value) {
			$value = strtolower($value);
			echo "
				<p>
					<a href='https://translate.google.com/translate_tts?ie=UTF-8&q=$value&tl=en&total=1&idx=0&textlen=9&tk=384427|261984&client=t&prev=input'>
						".$value."
					</a>
				</p>
			";
		}
	}

	private function _get_data_google_translate_api($word){
		$link = "https://translate.google.com/translate_a/single?client=t&sl=en&tl=vi&hl=vi&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&otf=1&ssel=0&tsel=0&kc=3&tk=208724|331224&q=".$word;
		$json = file_get_contents($link);
		$array = (array_values((explode(",", str_replace(["[","]"], ["",""], $json)))) );
		return $array;
	}
}

/* End of file word.php */
/* Location: ./application/controllers/admin/word.php */