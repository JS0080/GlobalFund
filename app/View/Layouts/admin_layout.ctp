<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Gfund</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <?php echo $this->html->css("/admin_assets/plugins/font-awesome/css/font-awesome.min.css"); ?>
        <?php echo $this->html->css("/admin_assets/plugins/bootstrap/css/bootstrap.min.css"); ?>
        <?php echo $this->html->css("/admin_assets/plugins/uniform/css/uniform.default.css"); ?>


        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <?php echo $this->html->css('/admin_assets/plugins/select2/select2.css'); ?>
        <?php echo $this->html->css('/admin_assets/plugins/select2/select2-metronic.css'); ?>

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <?php echo $this->html->css('/admin_assets/css/style-metronic.css'); ?>
        <?php echo $this->html->css('/admin_assets/css/style.css'); ?>
        <?php echo $this->html->css('/admin_assets/css/style-responsive.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/plugins.css'); ?>
        <?php echo $this->html->css('/admin_assets/css/themes/default.css', array('id' => 'style_color')); ?>
        
        <?php echo $this->html->css('/admin_assets/css/pages/login-soft.css'); ?>
        <?php echo $this->html->css('/admin_assets/css/custom.css'); ?>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'admin_index')); ?>">
                <?php //echo $this->html->image("logo.png"); ?>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <?php echo $content_for_layout; ?> 
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">

        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
                <script src="admin_assets/plugins/respond.min.js"></script>
                <script src="admin_assets/plugins/excanvas.min.js"></script> 
                <![endif]-->
        <?php echo $this->html->script('/admin_assets/plugins/jquery-1.10.2.min.js'); ?>
        <?php echo $this->html->script('/admin_assets/plugins/jquery-migrate-1.2.1.min.js'); ?>
        <?php echo $this->html->script('/admin_assets/plugins/bootstrap/js/bootstrap.min.js'); ?>
        <?php echo $this->html->script('/admin_assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>
        <?php echo $this->html->script('/admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>

        <?php echo $this->html->script('/admin_assets/plugins/jquery.blockui.min.js'); ?>

        <?php echo $this->html->script('/admin_assets/plugins/jquery.cokie.min.js'); ?>

        <?php echo $this->html->script('/admin_assets/plugins/uniform/jquery.uniform.min.js'); ?>



        <!-- END CORE PLUGINS -->
        <?php  echo $this->html->script('/admin_assets/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>
        <?php echo $this->html->script('/admin_assets/plugins/backstretch/jquery.backstretch.min.js'); ?>
        <?php echo $this->html->script('/admin_assets/plugins/select2/select2.min.js'); ?>


        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         <?php echo $this->html->script('/admin_assets/scripts/core/app.js'); ?>
        <?php echo $this->html->script('/admin_assets/scripts/custom/login-soft.js'); ?>
       
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {
                App.init();
                Login.init();
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>