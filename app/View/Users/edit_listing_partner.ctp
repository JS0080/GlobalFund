
            
            <!--form-->
<!--            <div class="col-md-2">
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
                          <a href="edit-listing-partner.html" class="list-group-item active">Edit Profile</a>
                          <a href="edit-property-profile.html" class="list-group-item">Submit Offering</a>
                          <a href="investments-listing.html" class="list-group-item">Offering</a>
                        <a href="#" class="list-group-item">Message</a>
                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal">Change Password</a>
                        </div>
                    </div>-->
            <div class="col-md-10">
            	
            	<?php echo $this->Form->create('User') ?>
                		<h4>Listing Partner App.</h4>
                        <hr/>
                	
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text"  name="data[User][first_name]" value="<?php echo $users['User']['first_name']?>" class="form-control"  placeholder="">
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="data[User][last_name]" value="<?php echo $users['User']['last_name']?>" class="form-control"  placeholder="">
                      </div>
                      
                    
                      
                     
                   
                
                	
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email Address *</label>
                        <input type="text" name="data[User][username]" value="<?php echo $users['User']['username']?>" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Company Name</label>
                       <input type="text" class="form-control"  placeholder="">
                      </div>
                         <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Business Address 1</label>
                        <textarea class="form-control" name="data[User][address1]" placeholder=""><?php echo $users['User']['address1']?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Business Address 2</label>
                        <textarea class="form-control" name="data[User][address2]" placeholder=""><?php echo $users['User']['address2']?></textarea>
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">City</label>
                        <textarea class="form-control" name="data[User][city]" placeholder=""><?php echo $users['User']['city']?></textarea>
                      </div>
                      
                     
                	
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">State/Province</label>
                        <input type="text" class="form-control" name="data[User][state]" value="<?php echo $users['User']['state']?>" placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Zip/Postal Code</label>
                        <input type="text" class="form-control" name="data[User][code]" value="<?php echo $users['User']['code']?>"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Country</label>
                        <input type="text" class="form-control" name="data[User][country]" value="<?php echo $users['User']['country']?>"  placeholder="">
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="data[User][phone]" value="<?php echo $users['User']['phone']?>" class="form-control"  placeholder="">
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">States of Business </label>
                        <p>List the states in which you conduct business.</p>
                        <textarea class="form-control" name="data[User][states]"><?php echo $users['User']['states']?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Dollars Transacted </label>
                        <p>(Estimated value, e.g., 1 million, 5 million, 10 million, 100 million, etc.)
</p>
<textarea class="form-control" name="data[User][dollars_transacted]"><?php echo $users['User']['dollars_transacted']?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Company Description </label>
                        <p>(Brief bio/description of your company: (e.g., Small developer focusing on fix-and-flips in the tri-state; Large development company with 30 years of experience in infrastructure and ground up construction)
</p>
<textarea class="form-control" name="data[User][company_description]"><?php echo $users['User']['company_description']?></textarea>
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Describe your company's "typical" real estate project. </label>
                        <p>(Brief bio/description of your company: (e.g., Small developer focusing on fix-and-flips in the tri-state; Large development company with 30 years of experience in infrastructure and ground up construction)
</p>
<textarea class="form-control" name="data[User][company_real_estate_description]"><?php echo $users['User']['company_real_estate_description']?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Website </label>
                        <p>(Brief bio/description of your company: (e.g., Small developer focusing on fix-and-flips in the tri-state; Large development company with 30 years of experience in infrastructure and ground up construction)
</p>
<textarea class="form-control" name="data[User][website]"><?php echo $users['User']['website']?></textarea>
                      </div>
                     
                       <div class="form-group col-md-6">
                        <p>On a scale from 0-10, how much investment experience do you have? 0 being none, and 10 being 10+ years.</p>
                        <select class="form-control" name="data[User][specific_project]">
                        	<option>Yes</option>
                            <option>No</option>
                        </select>
                      </div>
                      
                
                <div align="center">
                	 <button type="submit" class="btn btn-default btn-primary invest">Apply</button>
                </div>
                        <?php echo $this->Form->end()?>
            </div>
            <!--form-->
            
            

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo $this->html->script('jquery.min.js')?>
    <?php echo $this->html->script('bootstrap.min.js')?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo $this->html->script('ie10-viewport-bug-workaround.js')?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><h3>Change password</h3></h4>
          </div>
          <div class="modal-body clearfix">
            <form class="form-horizontal ">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Old Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Re-new Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


