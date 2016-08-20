
            
            <!--form-->
            <div class="col-md-12">
            	<div class="page-header">
                	<h1>Listing Partner</h1>
                </div>
            	<div class="row">
                    <?php echo $this->Form->create('User');?>
                	<div class="col-md-2">
                    	<?php echo $this->html->image('profile.jpg');?>
                        
                        <div class="clearfix"></div>
                        <br/>
                        <div class="list-group list">
                          <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal">
                           Add Details
                          </a>
                          <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal2">
                          	Documents
                          </a>
                          <a href="<?php echo $this->html->url(array('controller'=>'users','action'=>'edit_listing_partner',$users['User']['id']))?>" class="list-group-item">Edit Profile</a>
                          <a href="edit-property-profile.html" class="list-group-item">Submit Offering</a>
                          <a href="investments-listing.html" class="list-group-item">Offering</a>
                        <a href="#" class="list-group-item">Message</a>
                         <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal3">Change Password</a>
                        </div>
                    </div>
                    <div class="col-md-10">
                    	<div class="panel panel-default">
                        	
                            <div class="panel-body"> 
                            	<p class="clearfix"><b class="col-lg-3">Name</b><span class="col-lg-9"><?php echo $users['User']['first_name']." ".$users['User']['last_name'];?></span></p>
                                <p class="clearfix"><b class="col-lg-3">Email Address *</b><span class="col-lg-9"><?php echo $users['User']['username'];?></span></p>
                                <p class="clearfix"><b class="col-lg-3">Company Name </b><span class="col-lg-9">Abc Solution Ptd Ltd.</span></p>
                                <p class="clearfix"><b class="col-lg-3">Business Address 1</b><span class="col-lg-9"><?php echo $users['User']['address1']?><br/>
<br/>
</span></p>
								<p class="clearfix"><b class="col-lg-3">Business Address 2	</b><span class="col-lg-9"><?php echo $users['User']['address2']?><br/>
<br/>
</span></p>
                                <p class="clearfix"><b class="col-lg-3">City</b><span class="col-lg-9"><?php echo $users['User']['city']?></span></p>
                                <p class="clearfix"><b class="col-lg-3">State/Province</b><span class="col-lg-9"><?php echo $users['User']['state']?></span></p>
                                <p class="clearfix"><b class="col-lg-3">Zip/Postal Code</b><span class="col-lg-9"><?php echo $users['User']['code']?></span></p>
                                <p class="clearfix"><b class="col-lg-3">Country</b><span class="col-lg-9"><?php echo $users['User']['country']?></span></p>  
                                <p class="clearfix"><b class="col-lg-3">Phone *</b><span class="col-lg-9">
                                	 <span><?php echo $users['User']['phone']?></span></p>  
                                 <p class="clearfix"><b class="col-lg-3">States of Business </b><span class="col-lg-9"><?php echo $users['User']['states']?></span></p>  
                                 <p class="clearfix"><b class="col-lg-3">Dollars Transacted </b><span class="col-lg-9"><?php echo $users['User']['dollars_transacted']?></span></p> 
                                 <p class="clearfix"><b class="col-lg-3">Company Description </b><span class="col-lg-9"><?php echo $users['User']['company_description']?></span></p>
                                 <p class="clearfix"><b class="col-lg-3">Describe your company's "typical" real estate project. * </b><span class="col-lg-9"><?php echo $users['User']['company_real_estate_description']?></span></p>
                                 <p class="clearfix"><b class="col-lg-3">Website</b><span class="col-lg-9"><?php echo $users['User']['website']?></span></p>
                                 <p class="clearfix"><b class="col-lg-9">Do you have a specific project you are looking to raise capital for? </b><span class="col-lg-3"><?php echo $users['User']['specific_project']?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
            <!--form-->
          