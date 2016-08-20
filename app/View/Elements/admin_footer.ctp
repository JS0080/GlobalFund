            <!-- BEGIN PAGE LEVEL SCRIPTS -->

            <?php echo $this->html->script('/admin_assets/scripts/core/app.js'); ?>

            <?php echo $this->html->script('/admin_assets/scripts/custom/index.js'); ?>

            <?php echo $this->html->script('/admin_assets/scripts/custom/tasks.js'); ?>

    <div class="footer">
            <div class="footer-inner">
                <a href="http://www.sdssoftwares.co.uk/" target="blank" style="margin-left: 200px;"> Webdesign & development by sdssoftwares.co.uk</a>
            </div>
            <div class="footer-tools">
                    <span class="go-top">
                            <i class="fa fa-angle-up"></i>
                    </span>
            </div>
    </div>

    <script>
        $(document).ready(function() {
            App.init(); // initlayout and core plugins
            Index.init();

            Index.initCalendar(); // init index page's custom scripts

            Index.initDashboardDaterange();

            Tasks.initDashboardWidget();
        });
    </script>