<div>

	<?php if ($news != NULL) {
    foreach ($news as $row): ?>
	<div class="newsDiv">
		<?php if($row->news_image != NULL) {?>
		<div class="newsImage">
			<img
				src="https://s3-eu-west-1.amazonaws.com/<?=$this->bucket?>/<?= $row->news_image ?>" />
		</div>
		<?php }?>

		<div class="newsContent">
			<h4>
				<a href="<?=base_url()?>welcome/home/<?=$row->menu?>"><?= $row->title ?></a>
				<?php
				$is_logged_in = $this->session->userdata('is_logged_in');
				if (!isset($is_logged_in) || $is_logged_in == true) {
					echo " - <a href='" . base_url() . "admin/edit/" . $row->content_id . "'>edit</a><br/>";
				}
				?></h4>
				<em>By <?= $row->added_by ?></em><?php 
			
			$datestring = "%D %d%S of %M %Y";
			$time = $row->date_added;
			
			$date_added  = mdate($datestring, $time);
			
			?>
			
			<br/><em>Added <?=$date_added?></em><br/>
			<?= $row->content ?>
			
			
		</div>
		<div style="clear: both"></div>
	</div>
	<?php endforeach;
} ?>

</div>
