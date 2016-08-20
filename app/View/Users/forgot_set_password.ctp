 <!-- page heading -->
             <div class="col-md-12 text-center ">
            	<div class="">
                	<h1>Forgot Set Password</h1>
                    <br/>
                </div>
            </div>    
            <!-- page heading -->   

<div class="col-md-3">

                </div>
            
            <div class="col-md-6">
                <div style="color:red"><?php echo $this->Session->flash();?></div>
                <?php echo $this->form->create('User',array('class'=>'form-horizontal well','id'=>'forgot_set_password',$this->params['pass'][0]));?>
            
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="data[User][password]" placeholder="Password">
                    </div>
                  </div>
                
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Confirm-Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="" name="data[User][con_password]" placeholder="Confirm Password">
                    </div>
                  </div>
        
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default button_blue">Submit</button>
                    </div>
                  </div>
              <?php echo $this->form->end();?>
            </div>	
            
            
            <div class="col-md-12">
            <hr class="hr">
            </div>


<?php echo $this->html->script('jquery.js');
   echo $this->html->script('jquery.validate.min.js'); ?>
 
 
 <script type="text/javascript">
 $(document).ready(function() {
          
    $('#forgot_set_password').validate({
        rules:{
            "data[User][password]":{
                required:true,

            },

            "data[User][con_password]":{
               required:true  ,
               equalTo: "#password"
            }
        },

        messages:{
            "data[User][password]":{
             required:"Password should not be blank"
            },

            "data[User][con_password]":{
              required:"Confirm Password should not be blank"  ,
               equalTo: "Password should be same"
            }
        }
    });
 });
    </script>
    
 <style>
     .error{
         color:red
     }
  </style>    
    
   