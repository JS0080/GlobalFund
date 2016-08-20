<script>
    var SITEPATH = '<?php echo SITEPATH; ?>';
</script>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8"/>
        <title>Gfund</title>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

        <?php echo $this->html->css('/admin_assets/plugins/font-awesome/css/font-awesome.min.css'); ?>

        <?php echo $this->html->css('/admin_assets/plugins/bootstrap/css/bootstrap.min.css'); ?>

        <?php echo $this->html->css('/admin_assets/plugins/uniform/css/uniform.default.css'); ?>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->


        <?php echo $this->html->css('/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>

        <?php echo $this->html->css('/admin_assets/plugins/fullcalendar/fullcalendar/fullcalendar.css'); ?>

        <?php echo $this->html->css('/admin_assets/plugins/jqvmap/jqvmap/jqvmap.css'); ?>

        <?php echo $this->html->css('/admin_assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN THEME STYLES -->
        <?php echo $this->html->css('/admin_assets/css/style-metronic.css'); ?>
        <?php echo $this->html->css('/admin_assets/css/style.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/style-responsive.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/plugins.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/pages/tasks.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/themes/default.css', array('id' => 'style_color')); ?>

        <?php echo $this->html->css('/admin_assets/css/print.css', array('media' => 'print')); ?>

        <?php echo $this->html->css('/admin_assets/css/custom.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/portfilio.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/components.css'); ?>
      
        <?php echo $this->html->css('/admin_assets/css/pages/timeline.css'); ?>

        <?php echo $this->html->css('/admin_assets/css/pages/profile.css'); ?>
        
        
<!--       JS CODE-->
            
            <?php echo $this->html->script('/admin_assets/plugins/jquery-1.10.2.min.js'); ?>

            <?php  echo $this->html->script('/admin_assets/plugins/jquery-validation/dist/jquery.validate.min.js'); ?>

            <?php echo $this->html->script('users.js'); ?>

            <?php echo $this->html->script('ckeditor/ckeditor.js'); ?>


            <?php echo $this->html->script('/admin_assets/plugins/jquery-migrate-1.2.1.min.js'); ?>
            <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

            <?php echo $this->html->script('/admin_assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/bootstrap/js/bootstrap.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/jquery.blockui.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/jquery.cokie.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/uniform/jquery.uniform.min.js'); ?>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->

            <?php echo $this->html->script('/admin_assets/plugins/flot/jquery.flot.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/flot/jquery.flot.resize.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/flot/jquery.flot.categories.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/jquery.pulsate.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/bootstrap-daterangepicker/moment.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>
<!--<script src="admin_assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>-->
            <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->

            <?php echo $this->html->script('/admin_assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>

            <?php echo $this->html->script('/admin_assets/plugins/jquery.sparkline.min.js'); ?>
            <!-- END PAGE LEVEL PLUGINS -->
        
      
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <a class="navbar-brand" href="<?php $this->html->url(array('controller'=>'users','action'=>'admin_index')); ?>">
                        <!--<img src="admin_assets/img/logo.png" alt="logo" class="img-responsive"/>-->
                    <?php //echo $this->html->image('logo.png', array('height'=>'50','width'=>'150')); ?>
                </a>
                <!-- END LOGO -->
                
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">



                    <?php echo $this->html->image("/admin_assets/img/menu-toggler.png"); ?>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->

                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->

                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->

                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <?php echo $this->element('admin_header'); ?>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
        <?php echo $this->element('admin_left_panel'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Widget settings form goes here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn blue">Save changes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    
                    <?php echo $content_for_layout; ?>

                    <div class="clearfix">
                    </div>


                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php echo $this->element('admin_footer'); ?>


          
           
    </body>
    <!-- END BODY -->
</html>
