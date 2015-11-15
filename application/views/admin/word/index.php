<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('_include/header'); ?>
<style>
span.ele_tag {
    background-color: red;
    margin: 5px;
    padding: 5px;
    border-radius: 5px;
}
</style>
<div class="tag_box"></div><input class="tag">
<script>
	$(".tag").keyup(function(event) {
		if(event.which==13){
			$(".tag_box").append("<span class='ele_tag'>"+$(this).val()+"</span>");
			$(this).val("");
		}
	});
</script>
<?php $this->load->view('_include/footer'); ?>
