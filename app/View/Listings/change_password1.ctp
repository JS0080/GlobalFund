
         <div class="col-md-10">
            
            <?php echo $this->Form->create('User',array('controller'=>'listings','id'=>'changepass'));?>
          	
            
		<h1 class="page-header">Change Password</h1>  	
                <div style="color:red" > <?php echo $this->Session->flash(); ?></div>        
              <div class="form-group">
                <label for="inputEmail3"  class="col-sm-4 control-label">Old Password</label>
                <div class="col-sm-8">
                    <input type="password" name="data[User][password_old]" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
                
              <div class="form-group">
                <label for="inputEmail3"  class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" name="data[User][password_new]" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
                
              <div class="form-group">
                <label for="inputEmail3"  class="col-sm-4 control-label">Re-new Password</label>
                <div class="col-sm-8">
                    <input type="password" name="data[User][password_confirm]" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
                
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
                </div>
              </div>
                  <?php echo $this->Form->end();?>
            
        </div>

