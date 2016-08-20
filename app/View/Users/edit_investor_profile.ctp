
            
            <!--form-->
            <div class="col-md-2">
                    	<?php echo $this->html->image('profile.jpg')?>
                        <div class="clearfix"></div>
                        <br/>
                         <div class="list-group list">
                          <a href="edit-investor-profile.html" class="list-group-item active">
                           Edit Profile
                          </a>
                          <a href="investments.html" class="list-group-item">Investments</a>
                          <a href="#" class="list-group-item">Message</a>
                          <a href="#" class="list-group-item">Overview</a>
                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal">Change Password</a>
                        </div>
                    </div>
            <div class="col-md-10">
            	<?php echo $this->Form->create('User')?>
            
                		<h4>Investor App</h4>
                        <hr/>
                	
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="data[User][first_name]" value="<?php echo $users['User']['first_name']?>" placeholder="">
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleInputEmail1" >Last Name</label>
                        <input type="text" name="data[User][last_name]" value="<?php echo $users['User']['last_name']?>" class="form-control"  placeholder="">
                      </div>
                      
                	
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email Address *</label>
                        <input type="text" value="<?php echo $users['User']['username']?>" name="data[User][username]" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1" >City</label>
                        <input type="text" name="data[User][city]" value="<?php echo $users['User']['city']?>" class="form-control"  placeholder="">
                      </div>
                         <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Address 1</label>
                        <textarea class="form-control" name="data[User][address1]" placeholder=""><?php echo $users['User']['address1']?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Address 2</label>
                        <textarea class="form-control" name="data[User][address2]" placeholder=""><?php echo $users['User']['address2']?></textarea>
                      </div>
                      
                      
                     
                	
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">State/Province</label>
                        <input type="text" name="data[User][state]" value="<?php echo $users['User']['state']?>" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Zip/Postal Code</label>
                        <input type="text" name="data[User][code]" value="<?php echo $users['User']['code']?>" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Country</label>
                        <input type="text" name="[User][country]" value="<?php echo $users['User']['country']?>" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Occupation</label>
                        <input type="text" value="" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Bio/About</label>
                        <input type="text" value="" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Estimated Net Worth</label>
                        <input type="text"  class="form-control"  placeholder="">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Profile Image</label>
                        <input type="file" class=""  placeholder="">
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-12">
                          <p><b>Finances *</b></p>
                          <p>Please check the box(es) that most accurately reflect your financial situation.</p>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I have a net worth of one million dollars (exclusive of home).
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I made two hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> My spouse and I made three hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">None of the above apply to me.
                            </label>
                          </div>
                          <p><b>Investing Experience *</b></p>
                          <p>On a scale from 0-10, how much investment experience do you have? 0 being none, and 10 being 10+ years.</p>
                           <div class="form-group col-md-6">
                               <select name="data[User][experience]" value="<?php echo $users['User']['experience']?>">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                          </div>  
                      </div>
                
                <div align="center">
                	 <button type="submit" class="btn btn-default btn-primary invest">Save</button>
                </div>
                <?php echo $this->Form->end()?>
            </div>
            <!--form-->
            
            
	  	
      

    <!-- /.container -->


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


