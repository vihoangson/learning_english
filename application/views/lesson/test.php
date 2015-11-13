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
				$array = $data;
				$i=0;
				$key_a = array_keys($array);
				shuffle($key_a);
				foreach ($key_a as $key => $value) {
					echo '<span class="word'.$key.'" data-mean="'.htmlentities($array[$value]).'" >'.$value.'</span>';
					if($key>20){
						break;
					}
				}
				?>
				<div class="clearfix"></div>
			</div>
			<input type="text" name="" id="input" class="typing form-control" value="" required="required" pattern="" title="">
		</div>

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
				$("#xemketqua").after("\
					<h1>Game Over !</h1>\
					<p>Bạn đã không hoàn thành được mời thử lại</p>\
					");
				$("#xemketqua").html("Làm lại");
			}else{
				location.reload();
			}
		});

		$(".typing").focus();
		cur = 0;
		$(".word"+cur).addClass('current');	
		$(".box_word").data("cur",parseInt($(".box_word").data("cur")));

		$(".typing").keydown(function(event) {
			if(event.which==116){
			}
		});

		$(".typing").keyup(function(event) {
			if(event.which==13){
				$.ajax({
					url: '<?= base_url(); ?>Lesson/ajax_test/',
					type: 'post',
					dataType: 'text',
					data: {text: $(".word"+cur).html(),type:$(".typing").val()},
				})
				.done(function(data) {
					if(parseInt(data)==1){
						$(".word"+(parseInt(cur))).addClass('success');
						$(".typing").val("");
						$(".box_word").data("cur",parseInt($(".box_word").data("cur"))+1);
						$(".current").removeClass('current');
						cur = $(".box_word").data("cur");
						$(".word"+cur).addClass('current');
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
						}, 4000);
					}					
				});
			}
		});

		function nhaplai3lan(){			


		}
		</script>
<?php $this->load->view('_include/footer'); ?>
