<div class="col-md-12">
    <p class="text-center padding_bottom border_bottom margin_botttom">Don't just sit in the corner office, own the building.</p>
</div>
<div class="col-md-3">
    <?php echo $this->html->image('logo.png') ?>
</div>
<div class="col-md-9">
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
        <h1>Listing Partner</h1>
    </div>  
    
    
  <div class="row">

    <?php if($this->params['action'] == 'listing'){
              $class1 = 'list-group-item active';
          }else {
              $class1 = 'list-group-item';
          }

          if($this->params['action'] == 'add_property_detail'){
             $class2 = 'list-group-item active';
          } else{
            $class2 = 'list-group-item';  
          } 

          if($this->params['action'] == 'edit_listing_partner'){
               $class3 = 'list-group-item active';
          }else{
             $class3 = 'list-group-item';
          }
          
          
         if($this->params['action'] == 'current_project'){
               $class4 = 'list-group-item active';
          }else{
             $class4 = 'list-group-item';
          }
          
          
         if($this->params['action'] == 'listing_message_list'){
               $class5 = 'list-group-item active';
          }else{
             $class5 = 'list-group-item';
          }  
          
    ?>       

        

<div class="col-md-2">
    <?php if ($this->params['action'] == 'listing') {

    } else {
        ?>
       <img src="<?php echo IMGPATH."ListingPartnerProfile/".$this->Session->read('Auth.User.profile_image'); ?>">
        <div class="clearfix"></div>
        <br/>
        <?php } ?> 

    <div class="list-group list">
        <a href="<?php echo $this->Html->url(array('controller' => 'listings', 'action' => 'listing')); ?>" class="<?php echo $class1; ?>">
            My Profile
        </a>

        <a href="<?php echo $this->Html->url(array('controller' => 'listings', 'action' => 'add_property_detail')); ?>" class="<?php echo $class2; ?>">Submit Offering</a>
<!--        <a href="<?php //echo $this->Html->url(array('controller' => 'listings', 'action' => 'current_project')); ?>" class="<?php echo $class4; ?>">Current Projects</a>-->

        <a href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'listing_message_list')); ?>" class="<?php echo $class5; ?>">Message</a>
        <a href="<?php echo $this->Html->url(array('controller' => 'listings', 'action' => 'edit_listing_partner')); ?>" class="<?php echo $class3; ?>">Edit Profile</a>
    </div>
</div>

