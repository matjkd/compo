
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <?= $this->load->view('template/' . $this->config_theme . '/header') ?>

    </head>

    <body>

        <!--   hidden input to pass base url to js files-->
        <input type="hidden" id="baseurl" value="<?= base_url() ?>"/>


        <div id="fullbackground" style="display:none;">
            <?php
            if (isset($slideshow) && $slideshow != '0') {
                $this->load->view($slideshow);
            } else {
                $this->load->view('slideshow/main');
            }
            ?>
        </div>

        <div id="whitefade">&nbsp;</div>
        <div id="whitefadefiller">&nbsp;</div>

        <!-- Primary Page Layout
        ================================================== -->

        <!-- Main site! -->
        <div id="top_heading">
            <div class="container">
                <div class="sixteen columns" >
                    <h2 class="remove-bottom" ><img src="<?= base_url() ?>images/titles/logo.png"/></h2>

                </div>
            </div>


        </div>
        <div class="nav">
            <div class="container">
                <div class="sixteen columns" id="menutop">
<?= $this->load->view('global/seedbed/menu') ?>

                </div>
            </div>
        </div>

        <div class="big_menu">
            <div class="container">

                <div class="eight  columns">&nbsp;</div>
                <div class="eight columns" id="headertext"><img src="<?= base_url() ?>images/titles/seedbed/big_heading.png"> </div>


            </div>
        </div>

        <div class="container">


            <!--add top section here-->
<?php
if (isset($topsection) && $topsection != NULL) {
    $this->load->view($topsection);
}
?>



            <div class="sixteen columns mainheading"  id="contenttop">
                <h2>
<?php
if (isset($title)) {
    echo $title;
}
?>
                </h2>
            </div>

            <!--   set size of columns. -->
<?php
if (!isset($mainsize) || $mainsize == NULL) {
    $mainsize = "twelve";
}
if (!isset($rightsize) || $rightsize == NULL) {
    $rightsize = "four";
}
?>

            <div class="<?= $mainsize ?> columns">



<?= $this->load->view($main_content) ?>   
            </div>


            <div class="<?= $rightsize ?> columns "  >  
<?php
if (isset($sidebox) && $sidebox != NULL) {
    $this->load->view($sidebox);
}
?>
            </div>

        </div><!-- container -->
        <div class="sixteen columns" id="footerblock">
            <div class="container">
                <div class="eight columns">
                    Site being developed by <a href="http://www.redstudio.co.uk">redstudio design limited</a>
                </div>


                <div class="four columns">


                    <p><strong>EFI (Loughton) Ltd</strong><br/>
                        The Loughton Seedbed Centre<br/>
                        Langston Road<br/>
                        Loughton<br/>
                        Essex<br/>
                        IG10 3TQ<br/><br/>


                </div>

                <div class="four columns">

                    <p>

                        Tel No: 020 8787 7000<br/>
                        Fax No: 020 8787 7003<br/>
                        Email:  <a href="mailto:info@seedbedloughton.com">info@seedbedloughton.com</a></p>
                </div>




            </div>


        </div>




<?= $this->load->view('template/' . $this->config_theme . '/footer') ?>

        <!-- End Document
        ================================================== -->
    </body>
</html>