
<?php foreach($content as $row):?>

<h1><img src="<?=base_url()?>images/titles/<?=$config_theme?>/<?=$row->menu?>.png"/></h1>

<?php 
$is_logged_in = $this->session->userdata('is_logged_in');
			$role = $this->session->userdata('role');
		if($is_logged_in != 0 && $role == 1)
		{
			echo "<a href='".base_url()."admin/edit/".$row->content_id."'>Edit this page</a><br/>";
		}	

?>

<?php if(isset($age)) { $body = str_replace("[age]", "$age", "$row->content"); }
else {
	$body = $row->content;
}?>


<?php  $body = str_replace("The Eagle", "<strong>The Eagle</strong>", "$body");?>
<?php  $body = str_replace("THE EAGLE", "<strong>THE EAGLE</strong>", "$body");?>
<?=$body?>

<?php endforeach;?>


	<?php foreach($content as $row):?>
			<?php if($row->extra != NULL) {?>
			<?=$this->load->view('extra/'.$row->extra)?>
			<?php }?>
	<?php endforeach;?>