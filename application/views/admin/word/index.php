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
</style>
<input class="tag">
<script>
	$(".tag").focus();
	$(".tag").keyup(function(event) {
		if(event.which==13){
			if(!$(this).val()) return;
			$(".tag").after("<span class='ele_tag'>"+$(this).val()+" <a>x</a></span>");
			$(this).val("");
		}
	});
	$(document).on("click","a",function(){
		$(this).parent().remove();
	});

</script>
<?php $this->load->view('_include/footer'); ?>
