 <!-- page heading -->
             <div class="col-md-12 text-center ">
            	<div class="">
                	<h1>Forgot Password</h1>
                    <br/>
                </div>
            </div>    
            <!-- page heading -->   

<div class="col-md-3">

                </div>
            
            <div class="col-md-6">
                <div style="color:red"><?php echo $this->Session->flash();?></div>
                <?php echo $this->form->create('User',array('class'=>'form-horizontal well','id'=>'login'));?>
            
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="data[User][username]" placeholder="Email">
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
          
        $('#login').validate({
            rules:{
                "data[User][username]":{
                    required:true,
                    email:true
                },
                        
                "data[User][password]":{
                   required:true  
                }
            },
            
            messages:{
                "data[User][username]":{
                 required:"Email should not be blank"
                },
                        
                "data[User][password]":{
                  required:"Password should not be blank"  
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
    
   