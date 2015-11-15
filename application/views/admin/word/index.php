<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('_include/header'); ?>
<style>
span.ele_tag {
    background-color: #EAEAEA;
    margin: 5px;
    padding: 5px;
    border-radius: 5px;
}
span a {
    color: black;
    font-weight: bold;
    cursor: pointer;
}
.autocomplete_box{
	position:relative;
}
.box_m {
    position: absolute;
    top: 25px;
    left: 0px;
    background-color: #F1F1F1;
    width: 174px;
    border-radius: 4px;
}
.box_m ul {
    margin: 0;
    padding: 0;
}
.box_m li {
    list-style: none;
    margin: 0;
    padding: 6px 11px;
}
.box_m li.active {
    background-color: #CCCCCC;
    font-weight: bold;
}

</style>
<div class="autocomplete_box"><input class="tag"></div>
<script>

	i=0;
	create_box();
	$(".box_m").hide();
	$(".tag").focus();

	$(document).on("click",".box_m li",function(){
		text_c = $(this).html();
		$(".box_m li").removeClass('active');
		$(".tag").after("<span class='ele_tag'>"+text_c+" <a>x</a></span>");
		$(this).val("");
		$(".box_m").hide();
	});

	$(document).on("click",".ele_tag a",function(){// Xóa tag
		$(this).parent().remove();
	});


	$(document).keyup(function(){// Bấn nút esc tắt box_m
		if(event.which==27){
			$(".box_m").hide();
		}
	});

	$(document).on("click",function(event){
		 if(!( $(event.target).is(".box_m") || $(event.target).is(".tag") ) ){
		 	$(".box_m").hide();
		 }
	});

	$(".tag").focus(function(event) {// Focus vào show box_m
		$(".box_m").show();
	});

	$(".tag").keyup(function(event) {
		if(!(event.which==38 || event.which==40)){ // Khi nhấn chữ bình thường
			show_data();
		}
		if(event.which==13){ // Enter để chọn vào tag
			if($(".box_m li.active").length>0){
				text_c = $(".box_m li.active").html();
				$(".box_m li").removeClass('active');
				$(".box_m").hide();
				i=0;
			}else{
				if(!$(this).val()) return;
				text_c = $(this).val();
			}
			$(".tag").after("<span class='ele_tag'>"+text_c+" <a>x</a></span>");
			$(this).val("");
		}

		if(event.which==38 || event.which==40){ // Bấm xuống hay lên cũng đều show box_m ra
			$(".box_m").show();
			if(event.which==40){ // Bấm nút xuống di chuyển active
				if($(".box_m li").length <= i){
					i=0;
				}
				i=i+1;
			}
			if(event.which==38){ // Bấm nút Lên di chuyển active
				i=i-1;
				if(i <= 0){
					i= $(".box_m li").length;
				}
			}
			$(".box_m li").removeClass('active');
			$(".box_m li:nth-child("+(i)+")").addClass('active');
		}
	});


	function show_data(){
		if($(".tag").val().length > 0){
			$(".box_m").show();
		}else{
			$(".box_m").hide();
			return;
		}
		$.post('<?= base_url(); ?>ajax/autocomplete', {var_input: $(".tag").val()}, function(data, textStatus, xhr) {
			var m_content="";
			if(!data) return;
			$.each(data, function(index, val) {
				m_content = m_content+("<li>"+val+"</li>");
			});
			$(".box_m ul").html(m_content);
		});
	}

	function create_box(){
		if($(".box_m").length==0){
			$(".tag").after("\
				<div class='box_m'><ul></ul></div>");
		}
	}



</script>
<?php $this->load->view('_include/footer'); ?>
