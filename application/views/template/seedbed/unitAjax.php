<?php foreach($unit as $row):?>
<h4>Unit  <?=$row->block[0]?><?=$row->number?></h4>



<?php 

function convert_to_inches($meters) {
	$inches_per_meter = 39.3700787;
	
	$inches_total = round($meters * $inches_per_meter);  /* round to integer */
	$feet = floor($inches_total / 12);  /* assumes division truncates result; if not use floor() */
	$inches = $inches_total % 12; /* modulus */
	
	if($inches == 0) {
		$total = $feet."ft ";
	} else {
		$total = $feet."ft ".$inches."ins";
	}
	
	return $total;
}https://www.google.co.uk/search?q=baking+goods&hl=en&prmd=imvns&source=lnms&tbm=isch&ei=nuTZT-O6IsqmhAf6iPXXAw&sa=X&oi=mode_link&ct=mode&cd=2&ved=0CLwBEPwFKAE



?>
<?php if($row->occupied > 0) {?>
<?php if($row->visible == 1){?>
					<strong><?=$row->tenant_name?></strong><br/><br/>
					<?php } else {?>
					<strong>Occupied</strong><br/><br/>
					<?php }?>
					<?php }?>

<strong>Width</strong>:<?=round($row->width, 2)?>m (<?=convert_to_inches($row->width)?>)<br/>

<strong>Length</strong>:<?=round($row->length, 2)?>m (<?=convert_to_inches($row->length)?>)<br/>

<strong>Maximum Internal Height</strong>: <?=round($row->max_internal_height, 2)?>m (<?=convert_to_inches($row->max_internal_height)?>)<br/>

<strong>Minimum Internal Height</strong>: <?=round($row->min_internal_height, 2)?>m (<?=convert_to_inches($row->min_internal_height)?>)<br/>

<strong>Door Height</strong>: <?=round($row->door_height,2)?>m (<?=convert_to_inches($row->door_height)?>)<br/>

<strong>Door Width</strong>: <?=round($row->door_width,2)?>m (<?=convert_to_inches($row->door_width)?>)<br/>


<?php endforeach;?>