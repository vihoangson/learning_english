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
		$data = [
			"data" => $this->vocabulary->getByCat($this->uri->segment(3)),
		];
		$this->load->view('lesson/list',$data);
	}

	public function test_v()
	{
		$this->load->model('vocabulary');
		$data = ["data" => $this->vocabulary->getAll($this->uri->segment(3))];
		$this->load->view('lesson/test',$data);
	}

	public function ajax_test(){
		$this->load->helper('LE');
		$this->load->model('vocabulary');
		$value = $this->vocabulary->getById($_POST["text"])[0];
		if(remove_special_character($value["word_mean"])== remove_special_character($_POST["type"])){
			echo 1;
		}else{
			echo "<h2>".$value["word_name"]."</h2>";
			echo "<h2>/".$value["word_prononciation"]."/</h2>";
			echo "<h2 class='vietnamese' style='display:none;'>".$value["word_mean"]."</h2>";
			echo "<div class='img_box'>";
			for($i=0;$i<19;$i++){
				echo "
				<div class='img_ele'>
					<img src='".base_url()."asset/images/".$value["word_name"]."_".$i.".jpg'/>
				</div>";
			}
			echo "</div>
			";
		}
		?>
		<script>
			word = $(".word"+cur).data("word");
			phatam(word);
			$(document).unbind('keyup');
			$(document).keyup(function(e){
				if(e.which==113||e.which==114){
					console.log(e.which);
					$(".vietnamese").toggle();
					e.preventDefault();
				}
			});
		</script>
		<?php
	}

	private function get_data_google_translate_api($word){
		$link = "https://translate.google.com/translate_a/single?client=t&sl=en&tl=vi&hl=vi&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&ie=UTF-8&oe=UTF-8&otf=1&ssel=0&tsel=0&kc=3&tk=208724|331224&q=".$word;
		$json = file_get_contents($link);
		$array = (array_values((explode(",", str_replace(["[","]"], ["",""], $json)))) );
		return $array;
	}

	public function transtale_api(){
		// $this->load->model('vocabulary');
		// $array_w = $this->vocabulary->getByCat(1);
		// foreach ($array_w as $key => $value) {
		// 	$array = $this->get_data_google_translate_api(strtolower($key));
		// 	echo "<p>".$key."____".($array[8])."____".$value."</p>";
		// }
	}


}

/* End of file lesson.php */
/* Location: ./application/controllers/lesson.php */
