    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
            <!-- BEGIN SIDEBAR MENU -->

            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler hidden-phone">
                    </div>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                </li>
                <li class="sidebar-search-wrapper"> </li>

                <?php
                  if($this->params['action'] == 'admin_dashboard' ){
                      $class= "open active";
                  }else{
                   $class= "";   
                  }

                  if($this->params['action'] == 'admin_project_list' || $this->params['action'] == 'admin_project_investors'){
                      $class1 = "open active";
                  }else{
                     $class1 = "";   
                  }


                 if($this->params['action'] == 'admin_home' || $this->params['action'] == 'admin_home_edit' || $this->params['action'] == 'admin_home_view' || $this->params['action'] == 'admin_about'
                    || $this->params['action'] == 'admin_about_edit' || $this->params['action'] == 'admin_about_view'){
                     
                     $class2 = "open active";

                  } else {

                   $class2 = "";   

                  }
                  
                  
                 if($this->params['action'] == 'admin_user_list' || $this->params['action'] == 'admin_user_edit'){                           
                     $class3 = "open active";

                  } else {

                   $class3 = "";   

                  }
                  
                  
                  if($this->params['action'] == 'admin_compose' || $this->params['action'] == 'admin_inbox' || 
                           $this->params['action'] == 'admin_sent_message' || $this->params['action'] == 'admin_view_message' || $this->params['action'] == 'admin_sent_view_message'){                           
                     $class4 = "open active";

                  } else {

                   $class4 = "";   

                  }
 


                ?>

                <li class="<?php echo $class; ?>" id="dashboard">
                    <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                        <i class="fa fa-home"></i>
                        <span class="title">
                            Dashboard
                        </span>
                        <span class="selected">
                        </span>
                    </a>
                </li>


                <li id="dashboard" class="<?php echo $class1; ?>">
                    <a href="javascript:;" >
                        <i class="fa fa-building-o"></i>
                        <span class="title">
                            Project management
                        </span>
                        <span class="arrow ">
                        </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'admin_project_list')); ?>"><i class="fa fa-list"></i>Project list</a></li>
                         </ul>
                </li>


                
                <li id="dashboard" class="<?php echo $class3; ?>">
                    <a href="javascript:;" >
                        <i class="fa fa-building-o"></i>
                        <span class="title">
                            User management
                        </span>
                        <span class="arrow ">  </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'admin_investor_list')); ?>">
                                <i class="fa fa-list"> 
                                </i>Investor list</a>
                        </li>
                        
                          <li>
                            <a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'admin_listing_list')); ?>">
                                <i class="fa fa-list"> 
                                </i>Listing Partner list</a>
                        </li>
                    </ul>
                 </li>
                
                
               <li id="dashboard" class="<?php echo $class4; ?>">
                    <a href="javascript:;" >
                        <i class="fa fa-building-o"></i>
                        <span class="title">
                            Message
                        </span>
                        <span class="arrow ">  </span>
                    </a>
                   
                    <ul class="sub-menu">
                       <li>
                            <a href="<?php echo $this->html->url(array('controller'=>'messages','action'=>'admin_compose')); ?>">
                                <i class="fa fa-list"></i>Compose</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo $this->html->url(array('controller'=>'messages','action'=>'admin_inbox')); ?>">
                                <i class="fa fa-list"></i>Inbox</a>
                        </li>
                        
                         <li>
                            <a href="<?php echo $this->html->url(array('controller'=>'messages','action'=>'admin_sent_message')); ?>">
                                <i class="fa fa-list"></i>Sent Mail</a>
                        </li>                       
                    </ul>
                </li>  
               
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
 <!-- END SIDEBAR -->