<?php $blockArray = array('A', 'B', 'C', 'D', 'E');?>
<ul id="unitmenu" class="unitmenu noaccordion expandfirst">
	<?php foreach($blockArray as $block):?>

	<li style="position: static;"><a id="<?=$block?>" href="">Block <?=$block?>
	</a>
		<ul style="display: block;">
			<?php foreach($units as $row):?>

			<?php if($row->block[0] == $block) {?>

			<li class="<?= strtolower($row->block[0]).$row->number?>"
				id="<?=$row->unit_id?>"><span class="clicky"
				onclick="unitClick('<?php echo strtolower($row->block[0]).$row->number;?>', '<?=$row->unit_id?>')">
					<?=$row->block[0].$row->number?> - <?=round($row->width, 2)?>m x <?=round($row->length, 2)?>m
					<?php if($row->occupied > 0) {?>
					
					<?php if($row->visible == 1){?>
					(<?=$row->tenant_name?>)
					<?php } else { ?>
					(Occupied)
					<?php }?>
					
					 
					<?php }?>
			</span></li>


			<?php } ?>
			<?php endforeach;?>
		</ul>
	</li>
	<?php endforeach;?>
</ul>

