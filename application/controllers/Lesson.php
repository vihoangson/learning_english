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
		$data = ["data" => $this->vocabulary->getAll($this->uri->segment(3))];
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
		$array = $this->vocabulary->getAll($this->uri->segment(3));
		if(remove_special_character($array[$_POST["text"]])== remove_special_character($_POST["type"])){
			echo 1;
		}else{
			echo "<h2>".$_POST["text"]."</h2>";
			echo "<h2 class='vietnamese' style='display:none;'>".$array[$_POST["text"]]."</h2>";
			echo "<div class='img_box'>";
			for($i=0;$i<19;$i++){
				echo "<div class='img_ele'><img src='".base_url()."asset/images/".$_POST["text"]."_".$i.".jpg'/></div>";
			}
			echo "</div>
			";
		}
		?>
		<script>
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



}

/* End of file lesson.php */
/* Location: ./application/controllers/lesson.php */