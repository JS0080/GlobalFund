 <!-- page heading -->
             <div class="col-md-12 text-center ">
            	<div class="">
                	<h1>Login</h1>
                    <br/>
                </div>
            </div>    
            <!-- page heading -->   

<!--        <div class="col-md-3">  </div>-->
   
            <div class="col-md-6 col-md-offset-3">
                <div style="color:red"><?php echo $this->Session->flash();?></div>
                <?php echo $this->form->create('User',array('class'=>'form-horizontal well','id'=>'login'));?>
            
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="data[User][username]" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3"  class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="data[User][password]" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a href="<?php  echo $this->html->url(array('controller'=>'users','action'=>'forgot_password'));?>">Forgot Password.</a>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default button_blue">Sign in</button>
                    </div>
                  </div>
              <?php echo $this->form->end();?>
            </div>	
            
            
            <div class="col-md-12">
            <hr class="hr">
            </div>
            
            
             <div class="col-md-3">
                </div>
                
                <div class="col-md-12 text-center ">
            	<div class="">
                	<h1>Registration</h1><br>

                </div>
            </div>
<!--               <div class="col-md-3">
                </div>-->
          
          <div class="col-md-6 well col-md-offset-3" >
            	<div class="row">
                	<div class="col-md-6 text-center ">
                    	<br/>
                        
                    	<h4>Investors: Register</h4>
                        <button type="submit" class="btn btn-primary btn-lg system_button" data-toggle="modal" data-target="#myModal">
                          Register Now! 
                        </button>
                    </div>
                    <div class="col-md-6 text-center">
                    <br/>
                    	<h4>Listing Partner: Apply</h4>
                        <button type="submit" class="btn btn-primary btn-lg system_button" data-toggle="modal" data-target="#myModal2">
                          Apply Now! 
                        </button>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">  </div>
                
            
            
            
<!-- Investors: Register Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
              <h4 class="modal-title" id="myModalLabel"><h3>Investor App.</h3></h4>
          </div>
          <div class="modal-body clearfix">
          <?php echo  $this->Form->create(array('controller' =>'users','action' =>'signups','id' =>'investor1')); ?>
                
            <input type="hidden" name="data[User][user_type]" value="investor">
                 
                 
              <p class="col-md-12"><b>Name *</b></p>	
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id=""  name="data[User][first_name]" placeholder="First Name">
              </div>
              
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" name="data[User][last_name]" placeholder="Last Name">
              </div>
              
            
              
              <p class="col-md-12"><b>Email Address *</b></p>	
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="user_email" name="username" placeholder="Example@gmail.com">
              </div>
              
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Password </b></p>	</div>
                <input type="password" class="form-control" id="password" name="data[User][password]" placeholder="">
              </div>
              
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Confirm Password</b></p>	</div>
                <input type="password" class="form-control" id="" name="data[User][con-password]" placeholder="">
              </div>
              
              <p class="col-md-12"><b>Address *</b></p>	
              <div class="form-group col-md-12">
                <textarea class="form-control" id="" name="data[User][address1]" placeholder="Address 1"></textarea>
              </div>
              
              <div class="form-group col-md-12">
                 <textarea class="form-control" id="" name="data[User][address2]" placeholder="Address 2"></textarea>
              </div>
               
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>City</b></p>	</div>
                <input type="text" class="form-control"  name="data[User][city]" id="" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>State/Province </b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][state]" placeholder="">
              </div>
              
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>Country</b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][country]"  placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>Zip/Postal Code </b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][code]" placeholder="">
              </div>
              
              <div class="col-md-12">
                  <p><b>Finances *</b></p>
                  <p>Please check the box(es) that most accurately reflect your financial situation.</p>
                     <div class="checkbox">
                        <label>
                          <input type="checkbox" name="data[User][finance1]" value="1"> I have a net worth of one million dollars (exclusive of home).
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="data[User][finance2]" value="2"> I made two hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
                        </label>
                      </div>
                  
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="data[User][finance3]" value="3"> My spouse and I made three hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
                        </label>
                      </div>
                  
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="data[User][finance4]" value="4">None of the above apply to me.
                        </label>
                      </div>
                  
                      <p><b>Investing Experience *</b></p>
                      <p>On a scale from 0-10, how much investment experience do you have? 0 being none, and 10 being 10+ years.</p>
                      <div class="form-group col-md-6">
                        <select class=" input-sm" name="data[User][experience]">
                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                   </div>
               </div>               
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
         <?php echo $this->Form->end(); ?>           
        </div>
      </div>
    </div>   
<!-- END Investor Partner: Register Modal -->


 <!-- Listing Partner: Register Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <?php echo  $this->Form->create(array('controller' =>'users','action' =>'signups','id'=>'Listing')); ?>
          <div class="modal-header">
              <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><h3>Listing Partner App.</h3></h4>
          </div>
          
            <div class="modal-body clearfix">
             
                <input type="hidden" name="data[User][user_type]" value="listing">
                
                
              <p class="col-md-12"><b>Name *</b></p>	
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" name="data[User][first_name]" placeholder="First Name">
              </div>
              
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" name="data[User][last_name]" placeholder="Last Name">
              </div>
              
              <p class="col-md-12"><b>Email Address *</b></p>	
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="user_name" name="useremail" placeholder="Example@gmail.com">
              </div>
              
              
               <p class="col-md-12"><b>Company Name *</b></p>	
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="" name="data[User][company_name]" placeholder="">
                </div>
              
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Password </b></p>	</div>
                <input type="password" class="form-control" id="password1" name="data[User][password]" placeholder="">
              </div>
              
              
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Confirm Password</b></p>	</div>
                <input type="password" class="form-control" id="" name="data[User][con_password]" placeholder="">
              </div>
              
              
              <p class="col-md-12"><b>Address *</b></p>	
              <div class="form-group col-md-12">
                <textarea class="form-control" id="" name="data[User][address1]" placeholder="Address 1"></textarea>
              </div>
              
              
              <div class="form-group col-md-12">
                 <textarea class="form-control" id="" name="data[User][address2]" placeholder="Address 2"></textarea>
              </div>
               
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>City</b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][city]" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>State/Province </b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][state]" placeholder="">
              </div>
              
              
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>Country</b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][country]" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>Phone </b></p>	</div>
                <input type="text" class="form-control" id="" name="data[User][phone]" placeholder="">
              </div>
              
              
              <div class="col-md-12">
                  <p><b>States of Business *</b></p>
                  <p>List the states in which you conduct business.</p>
                  <div class="form-group">
                   <textarea class="form-control" id="" placeholder="" name="data[User][states]"></textarea>
                  </div>                      
               </div>
              
              
               <div class="col-md-12">
                  <p><b>Dollars Transacted *</b></p>
                  <p>(Estimated value, e.g., 1 million, 5 million, 10 million, 100 million, etc.)</p>
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder="" name="data[User][dollars_transacted]"></textarea>
                    </div>                     
               </div> 
              
               <div class="col-md-12">
                  <p><b>Company Description *</b></p>
                  <p>Brief bio/description of your company: (e.g., Small developer focusing on fix-and-flips in the tri-state; Large development company with 30 years of experience in infrastructure and ground up construction)</p>
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder="" name="data[User][company_description]"></textarea>
                    </div>                   
               </div> 
              
               <div class="col-md-12">
                  <p><b>Describe your company's "typical" real estate project. *</b></p>
                  
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder="" name="data[User][company_real_estate_description]"></textarea>
                    </div>                     
               </div>  
              
               <div class="col-md-12">
                  <p><b>Website</b></p>
                  
                  <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="http/:" name="data[User][website]">
                    </div>                     
               </div> 
              
               <div class="col-md-12">
                  <p><b>Do you have a specific project you are looking to raise capital for?</b></p>
                  
                  <div class="form-group">
                        <select class=" input-sm" name="data[User][specific_project]">
                           <option value="yes">Yes</option>
                            <option value="no">No</option>
                           
                        </select>
                    </div>                     
               </div>    
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
            <?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>  
 
 <!-- END Listing Partner: Register Modal -->
<?php echo $this->html->script('jquery.js');
   echo $this->html->script('jquery.validate.min.js'); ?>
 
 
 <script type="text/javascript">
 $(document).ready(function() {
       $("#investor1").validate({
            
            rules: {
                "data[User][first_name]": {
                    required: true
                },
                
                "data[User][last_name]": {
                    required: true
                },
                
                "username": {
                    required: true,
                    email: true,
                    remote: {
                      url: '<?php echo SITEPATH; ?>'+"users/checkEmail",
                      type: "post",
                        data: {
                          username: function() {
                            return $("#user_email").val();
                          }
                        }
                    }
                },

                
                "data[User][password]": {
                    required: true,
                    minlength: 6
                },
                
                "data[User][con-password]": {
                    required: true,
                    equalTo: "#password"
                },
                
                "data[User][address1]": {
                    required: true
                },
                
                "data[User][address2]": {
                    required: true
                },
                
                "data[User][city]": {
                    required: true
                },
                
                  "data[User][state]": {
                    required: true
                },
                
                "data[User][country]": {
                    required: true                    
                },
                
                "data[User][code]": {
                    required: true                   
                }

            },
            messages: {
            
                "data[User][first_name]": {
                    required: "First name should not be blank.<br/>"
                },
                
                "data[User][last_name]": {
                    required: "Last name should not be blank.<br/>"
                },
                
                "username": {
                    required: "Email should not be blank.<br/>",
                    remote: "Please Use Another"
                },

               
                "data[User][password]": {
                    required: "Password should not be blank.<br/>"
                                                                    
                },
                               
                "data[User][con-password]": {
                    required: "Confirm password should not be blank.</br>",
                    equalTo: jQuery.format("Both password must match.")
                },
                
                "data[User][address1]": {
                    required: "Address 1 should not be blank.<br/>"

                },
                
                "data[User][address2]": {
                    required: "Address 2 should not be blank.<br/>"

                },
                
                "data[User][city]": {
                    required: "City should not be blank.<br/>"

                },
                
                "data[User][state]": {
                    required: "State should not be blank.<br/>"

                },
                
                "data[User][country]": {
                    required: "Country should not be blank.<br/>"

                },
                
                "data[User][code]": {
                    required: "Zip/Postal code should not be blank.<br/>"
                }               
            }
        });
        
        
        
        
        $("#Listing").validate({
            
            rules: {
                "data[User][first_name]": {
                    required: true
                },
                
                "data[User][last_name]": {
                    required: true
                },
                
                "useremail": {
                    required: true,
                    email: true,
                    remote: {
                    url: '<?php echo SITEPATH; ?>'+"users/checkEmail",
                    type: "post",
                      data: {
                        username: function() {
                          return $("#user_name").val();
                        }
                      }
                  }                
                },
                
                "data[User][password]": {
                    required: true,
                    minlength: 6
                },
                
                  "data[User][company_name]": {
                    required: true
                },
                
                "data[User][con_password]": {
                    required: true,
                    equalTo: "#password1"
                },
                
                  "data[User][address1]": {
                    required: true
                },
                
               "data[User][address2]": {
                    required: true
                },
                
                "data[User][city]": {
                    required: true
                },
                
                  "data[User][state]": {
                    required: true
                },
                
                  "data[User][country]": {
                    required: true
                    
                },
                
                "data[User][phone]": {
                    required: true,
                    maxlength : 12
                    
                },
                "data[User][states]": {
                    required: true

                },
                        
                "data[User][dollars_transacted]": {
                    required: true

                },
                
                "data[User][company_description]": {
                    required: true

                },
                
                "data[User][company_real_estate_description]": {
                    required: true

                },
                
                "data[User][website]": {
                    required: true

                }
           
            },
            messages: {
            
                "data[User][first_name]": {
                    required: "First name should not be blank.<br/>"

                },
                
                "data[User][last_name]": {
                    required: "Last name should not be blank.<br/>"

                },
                
                "useremail": {
                    required: "Email should not be blank.<br/>",
                    remote: "Please Use Another"

                },

                "data[User][password]": {
                    required: "Password should not be blank.<br/>"
                    
                },
                
                     
                 "data[User][company_name]": {
                    required: "Company name should not be blank.<br/>"
                },
                
                
                "data[User][con_password]": {
                    required: "Confirm password should not be blank.</br>",
                    equalTo: jQuery.format("Both password must match.")
                },
                
                "data[User][address1]": {
                    required: "Address 1 should not be blank.<br/>"

                },
                
                "data[User][address2]": {
                    required: "Address 2 should not be blank.<br/>"

                },
                
                "data[User][city]": {
                    required: "City should not be blank.<br/>"
                },
                
                "data[User][state]": {
                    required: "State should not be blank.<br/>"
                },
                
                "data[User][country]": {
                    required: "Country should not be blank.<br/>"
                },
                
                "data[User][phone]": {
                    required: "Phone number should not be blank.<br/>",
                    maxlength : "Phone number should be 12 digit only.<br/>"
                },
                
                "data[User][states]": {
                    required: "State Bussiness should not be blank.<br/>"
                },
                
                "data[User][dollars_transacted]": {
                    required: "Dollar transaction should not be blank.<br/>"
                },
                
                "data[User][company_description]": {
                    required: "Company description should not be blank.<br/>"
                },
                
                 "data[User][company_real_estate_description]": {
                    required: "Company Real State should not be blank.<br/>"
                },
                
                "data[User][website]": {
                    required: "Website should not be blank.<br/>"
                }                
            }
        });
        
        
        
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
    
   