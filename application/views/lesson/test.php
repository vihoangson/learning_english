<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$data_header= [
		"css"=>[base_url()."asset/css/lesson_test.css"]
	];
	$this->load->view('_include/header',$data_header);
?>
<p>
				<button type="button" id="trogiup" class="btn btn-warning">Trợ giúp</button>
				<button type="button" id="xemketqua" class="btn btn-danger">Xem kết quả</button>
			</p>
			<div class="box_word" data-cur="0">
				<?php 
				foreach ($data as $key => $value) {
					echo '<span class="word'.$key.'" data-word-id="'.$value["id"].'" data-mean="'.htmlentities($value["word_mean"]).'" data-word="'.strtolower($value["word_name"]).'">'.$value["word_name"].'</span>';
					if($key>20){
						break;
					}
				}
				?>
				<div class="clearfix"></div>
			</div>
			<input type="text" name="" id="input" class="typing form-control" value="" required="required" pattern="" title="">
		</div>
		<audio class="audioDemo play_sound" controls preload="auto" hidden="hidden"> 
		   <source src="" type="audio/mp3">
		</audio>
		<script>

		$("#trogiup").click(function(event) {
			if($(".mean").length==0){
				$(".box_word span").each(function(index, el) {
					$(this).prepend("<p class='mean'>"+$(this).data("mean")+"</p>");
				});
				$(".mean").fadeIn(3000);
				window.setTimeout(function(){
					$(".mean").remove();
				
				}, 4000);
			}
		});

		$("#xemketqua").click(function(event) {
			if($(".mean").length==0){
				$(".box_word span").each(function(index, el) {
					$(this).prepend("<p class='mean'>"+$(this).data("mean")+"</p>");
				});
				$(".typing").remove();		
				$("#xemketqua").html("Làm lại");
			}else{
				location.reload();
			}
		});

		$(".typing").focus();
		cur = 0;
		$(".word"+cur).addClass('current');	
		word = $(".word"+cur).data("word");
		phatam(word);
		$(".box_word").data("cur",parseInt($(".box_word").data("cur")));

		$(".typing").keydown(function(event) {
			if(event.which==116){
			}
			if(event.which==112){
				$("#trogiup").trigger("click");
				event.preventDefault();
			}
			if(event.which==113){
				word = $(".word"+cur).data("word");
				phatam(word);
				event.preventDefault();
			}
			if(event.which==114){
				event.preventDefault();
			}
		});

		$(".typing").keyup(function(event) {
			if(event.which==13){
				$.ajax({
					url: '<?= base_url(); ?>Lesson/ajax_test/',
					type: 'post',
					dataType: 'text',
					data: {text: $(".word"+cur).data("word-id"),type:$(".typing").val()},
				})
				.done(function(data) {
					if(parseInt(data)==1){
						if($(".card").length==0){
							$("body").append("<div class='card'></div>");
						}
						$(".card").html("\
							<img src='<?= base_url(); ?>asset/images/"+word+"_0.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_1.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_2.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_3.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_4.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_5.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_6.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_7.jpg'>\
							<img src='<?= base_url(); ?>asset/images/"+word+"_8.jpg'>\
							");
						$(".card").fadeIn(200);
						window.setTimeout(function(){
							$(".card").fadeOut(200);
							$(".typing").val("");
						}, 500);
						phatam(word);

						$(".word"+(parseInt(cur))).addClass('success');
						$(".typing").val("");
						$(".box_word").data("cur",parseInt($(".box_word").data("cur"))+1);
						$(".current").removeClass('current');
						cur = $(".box_word").data("cur");
						$(".word"+cur).addClass('current');
						word = $(".word"+cur).data("word");
						phatam(word);


					}else{
						$(".word"+(parseInt(cur))).addClass('error');
						if($(".card").length==0){
							$("body").append("<div class='card'></div>");
						}
						$(".card").html(data);
						$(".card").fadeIn(200);
						window.setTimeout(function(){
							$(".card").fadeOut(200);
							$(".typing").val("");
						}, 1000);
					}					
				});
			}
		});

		function phatam(word){			
			$(".play_sound source").attr("src","<?= base_url(); ?>asset/audio/"+word+".mp3");
			$(".play_sound").trigger('load');
			$(".play_sound").trigger("play");
		}
		</script>
<?php $this->load->view('_include/footer'); ?>
