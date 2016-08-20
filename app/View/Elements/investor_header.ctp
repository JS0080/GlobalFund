<div class="col-md-12">
    <p class="text-center padding_bottom border_bottom margin_botttom">Don't just sit in the corner office, own the building.</p>
</div>
<div class="col-md-4">
    <?php echo $this->html->image('logo.png') ?>
</div>
<div class="col-md-8">
    <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="http://globalgroupfund.com/">Home</a></li>
                <li><a href="http://globalgroupfund.com/new-page/">About</a></li>
                <li><a href="http://globalgroupfund.com/111/">How it Works</a></li>
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Invest &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="http://groupfund.sdssoftltd.co.uk/">Investments</a></li>
                        <li><a href="http://globalgroupfund.com/investor-education/">Investor Education</a></li>
                    </ul>
                </li>

                <?php if ($this->Session->read('Auth.User.username') == '') { ?>
                    <li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login/Register</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Logout</a></li>
                <?php } ?>
            </ul>
        </div><!--/.nav-collapse -->

    </nav>
</div>
<div class="col-md-12"><hr class="hr"/></div>

<!--form-->

<div class="col-md-12">
    <div class="page-header">
        <h1>Investors</h1>
    </div>  
    <div class="row">
        <div class="col-md-2">
            <?php if ($this->params['action'] == 'investor') {
                
            } else { ?>
                  
               <img src="<?php echo IMGPATH."InvestorProfile/".$this->Session->read('Auth.User.profile_image'); ?>">
              
                <div class="clearfix"></div>
                <br/>
                <?php } ?> 
            <div class="list-group list">

                <?php
                if ($this->params['action'] == 'investor') {
                    $class1 = 'list-group-item active';
                } else {
                    $class1 = 'list-group-item';
                }

                if ($this->params['action'] == 'edit_investor_profile') {
                    $class2 = 'list-group-item active';
                } else {
                    $class2 = 'list-group-item';
                }

                if ($this->params['action'] == 'investment' || $this->params['action'] == 'invest_detail' || $this->params['action'] == 'investor_invest_detail') {
                    $class3 = 'list-group-item active';
                } else {
                    $class3 = 'list-group-item';
                }
                
                
                
                if ($this->params['action'] == 'listing_partner' || $this->params['action'] == 'listing_partner_detail') {
                    $class4 = 'list-group-item active';
                } else {
                    $class4 = 'list-group-item';
                }
                
                
                if ($this->params['action'] == 'invest_message_list') {
                    $class5 = 'list-group-item active';
                } else {
                    $class5 = 'list-group-item';
                }

                ?>       


                <a href="<?php echo $this->html->url(array('controller' => 'investments', 'action' => 'investor')); ?>" class="<?php echo $class1; ?>">
                    My Profile
                </a>

                <a href="<?php echo $this->html->url(array('controller' => 'investments', 'action' => 'investment')); ?>" class="<?php echo $class3; ?>">Investments</a>

                <a href="<?php echo $this->html->url(array('controller' => 'investments', 'action' => 'listing_partner')); ?>" class="<?php echo $class4; ?>">Listing Partners</a>

<!--                <a href="<?php  // echo $this->html->url(array('controller' => 'messages', 'action' => 'invest_message_list')) ?>" class="<?php echo $class5; ?>">Message</a>-->
                
                <a href="<?php echo $this->html->url(array('controller' => 'investments', 'action' => 'edit_investor_profile')) ?>" class="<?php echo $class2; ?>">Edit My Profile</a>

            </div>



        </div>

