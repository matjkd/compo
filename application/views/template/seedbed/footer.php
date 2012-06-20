<!-- JS
	================================================== -->
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="<?=base_url()?>js/tabs.js"></script>
 <!-- cookie cuttr
================================================== -->
<script src="<?=base_url()?>js/cookiecuttr.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>css/cookiecuttr.css">
<script>
$(document).ready(function () {
	$.cookieCuttr();	
	});

	</script>
  
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
  <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
 

  <!-- scripts concatenated and minified via ant build script-->
   <script src="http://cdn.jquerytools.org/1.2.6/all/jquery.tools.min.js"></script>
    <script src="<?=base_url()?>js/wymeditor/jquery.wymeditor.min.js"></script>
  <script src="<?=base_url()?>js/plugins.js"></script>
     <script src="<?=base_url()?>js/datatables.js"></script>
      <script src="<?=base_url()?>js/script.js"></script>

      
      <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="<?=base_url()?>js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->
