<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('_include/header'); ?>
	<h1>Danh sách từ</h1>
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php 
	foreach ($data as $key => $value) {
		?>
		<tr>
			<td><h2><?php echo $key ?></h2></td>
			<td class="vietnamese" style="display:none;"><?php echo $value ?></td>
			<td><img src='images/<?php echo $key ?>_0.jpg'><img src='<?= base_url(); ?>asset/images/<?php echo $key ?>_1.jpg'><img src='images/<?php echo $key ?>_2.jpg'></td>
		</tr>
		<?php
	}
?>
				</tbody>
			</table>
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
<?php $this->load->view('_include/footer'); ?>
