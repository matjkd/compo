<?=form_open('admin/create_tenant')?>
<p>
<?=form_label('Tenant Name')?>
	<?=form_input('tenant_name')?>

</p>
<p>
<?=form_label('Website')?>
	<?=form_input('website')?>

</p>
<p>
<?=form_label('Visible')?>
	<?=form_checkbox('visible', 1, TRUE)?>

</p>
<p>

	<?=form_submit('submit',"Add Tenant")?>

</p>
<?=form_close()?>