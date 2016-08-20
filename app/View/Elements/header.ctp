<div class="col-md-12">
            	<p class="text-center padding_bottom border_bottom margin_botttom">Don't just sit in the corner office, own the building.</p>
            </div>
            <div class="col-md-4">
            	<?php echo $this->html->image('logo.png')?>
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
<!--                        <ul class="nav navbar-nav pull-right">
                           <li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'home')); ?>">Home</a></li>
                           <li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'about')); ?>">About</a></li>
                           <li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'how_it_works')); ?>">How it Works</a></li>
                           <li class="dropdown active">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Invest &nbsp;<span class="caret"></span></a>
                             <ul class="dropdown-menu" role="menu">
                               <li><a href="investments.html">Investments</a></li>
                               <li><a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'investment_education')); ?>">Investor Education</a></li>
                             </ul>
                           </li>

                           <?php if($this->Session->read('Auth.User.username') =='') { ?>
                             <li><a href="<?php echo $this->html->url(array('controller'=>'users' ,'action'=> 'login'));?>">Login/Register</a></li>
                           <?php }else{ ?>
                               <li><a href="<?php echo $this->html->url(array('controller'=>'users' ,'action'=> 'logout'));?>">Logout</a></li>
                           <?php } ?>
                         </ul>-->

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
            <!-- page heading -->
             <div class="col-md-12">
<!--            	<div class="page-header">
                	<h1>Login/Registration</h1>
                </div>-->
            </div>    
            
            
            <!-- page heading -->   
       
            