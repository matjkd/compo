<?php $blockArray = array('A', 'B', 'C', 'D', 'E');?>
<?php $tenantArray[0] = 'None';?>
<?php foreach($tenants as $row2):?>

<?php $tenantArray[$row2->tenant_id] = $row2->tenant_name; ?>

<?php endforeach;?>

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
					<?php if($row->occupied > 0) {?> (<?=$row->tenant_name?>) <?php }?>
			</span> 
			<?=form_open('admin/assign_tenant')?> 
			<?=form_hidden('unit_id', $row->unit_id)?>
			<?=form_dropdown('tenants', $tenantArray, $row->tenant_id)?>
<?=form_submit('submit',"Assign Tenant")?>

			<?=form_close()?>
			</li>


			<?php } ?>
			<?php endforeach;?>
		</ul>
	</li>
	<?php endforeach;?>
</ul>
