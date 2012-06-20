<!--Main content page for garden site-->



<?php foreach ($content as $row): ?>


    <?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    if (!isset($is_logged_in) || $is_logged_in == true) {
        echo "<a href='" . base_url() . "admin/edit/" . $row->content_id . "'>edit this page</a><br/>";
    }
    ?>

    <?php
    if (isset($age)) {
        $body = str_replace("[age]", "$age", "$row->content");
    } else {
        $body = $row->content;
    }
    ?>


    <?php $body = str_replace("Loughton Seedbed Centre", "<strong>Loughton Seedbed Centre</strong>", "$body"); ?>
<?php if($row->category == "news") {?>

<?php if($row->news_image != NULL) {?>
		<div class="newsImage">
			<img
				src="https://s3-eu-west-1.amazonaws.com/<?=$this->bucket?>/thumb_<?= $row->news_image ?>" />
		</div>
		
		<em>By <?= $row->added_by ?></em>
				<?php 
			
			$datestring = "%D %d%S of %M %Y";
			$time = $row->date_added;
			
			$date_added  = mdate($datestring, $time);
			
			?>
			
			<br/><em>Added <?=$date_added?></em><br/>
			<!-- Place this tag where you want the +1 button to render -->
<div class="g-plusone" data-annotation="inline" data-href="<?=base_url()?>/welcome/home/<?=$row->menu?>"></div>
		<?php }?>


<?php }?>

    <?= $body ?>

<?php endforeach; ?>


<?php foreach ($content as $row): ?>
    <?php if ($row->extra != NULL) { ?>
        <?= $this->load->view($row->extra) ?>
    <?php } ?>
<?php endforeach; ?>
    <div style="clear:both;"></div>