<script>
function uploadPortfolio(){
   $('#myModal_upload_portfolio').modal('show');
}


$(document).ready(function (e) {
// FUNCTION TO UPLOAD LISTING FILE 
   $("#addPortfolio").on('submit',(function(e) {
       var imageName = $("input[id=portfolio]").val();  
      // alert(imageName); return false;
       if(imageName !=''){
           
          var fileExt = '.' + imageName.split('.').pop();
     
          if(fileExt =='.png' || fileExt=='.jpg' || fileExt=='.gif' )  { 
          
             e.preventDefault();
             
                    $.ajax({
                    url: "<?php echo SITEPATH."listings/upload_portfolio" ?>",
                            type: "POST",
                            data:  new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data)
                            { 
                                //alert(data);
                              if(data =='done')  {
                                  $('#myModal_upload_portfolio').modal('hide');  
                              }

                            },

                            error: function(){

                             } 	        
                    });
            
            }else{
                 alert('Please select only .png or .jpg or .gif image');
              return false;
            }
        }else{
         alert('Please upload the Portfolio images.');
         return false;
        }
    }));
    // END FUNCTION TO UPLOAD LISTING FILE   
});


function checkPassword(){
  var pass = $('#oldPassword').val();
  var param = 'oldPassword=' + pass;
 if(pass !=''){
    $.ajax({
        url: "<?php echo SITEPATH."users/checkOldPassword" ?>",
        method: "POST",
        data: param,
      success: function(data)
      { 
      // alert(data);   return false;
       if(data ==0){
           
       } else{  
         $(":submit").attr("disabled", true);
         $('#old_pass_msg').html(data);
       }
      }
    });
  }
}



function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('new_pass');
    var pass2 = document.getElementById('conPassword');
    
    //Compare the values in the password field 
    //and the confirmation field
    
    if(pass1.value =='') {            
        var data = "Please enter password.";
        $('#pass').html(data);
        $(":submit").attr("disabled", true);
        return false;

    } else if(pass1.value == pass2.value) {

        $( "#conf_msg" ).empty();
        $( "#old_pass_msg" ).empty();
        $( "#pass" ).empty();
        $(":submit").removeAttr("disabled");
    } else {            
        var data = "Confirm password and password should be same";
        $('#conf_msg').html(data);
        $(":submit").attr("disabled", true);
        return false;     
    }
} 
    
</script>


<div class="col-md-10">
   <?php echo $this->Form->create('Listing',array('controller' =>'listings' ,'action' =>'edit_listing_partner','type' =>'file','class' =>'well clearfix')); ?>
   
        <h4>Edit My Profile</h4>
        <hr/>

        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Upload For Bio</label>
            <input type="file" class=""  placeholder="" name='data[ListingDetail][bio_data]' value="<?php echo $userProfileDetail['ListingDetail']['upload_bio'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Portfolio</label>
            <input type="file" class=""  placeholder=""  name='data[ListingDetail][portfolio]' value="<?php echo $userProfileDetail['ListingDetail']['portfolio'] ?>" >
        </div>

        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Executive Summary</label>
            <input type="file" class=""  placeholder="" name='data[ListingDetail][executive]' value="<?php echo $userProfileDetail['ListingDetail']['executive_summary'] ?>" >
        </div>
        
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Team / Leadership Bio</label>
            <input type="file" class=""  placeholder="" name='data[ListingDetail][leadership]' value="<?php echo $userProfileDetail['ListingDetail']['team_leadership'] ?>" >
        </div>
        
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Company Name </label>
            <input type="text" class="form-control"  placeholder="" name='data[ListingDetail][company_name]' value='<?php echo @$userProfileDetail['ListingDetail']['company_name'] ?>' >
        </div>
        
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">City</label>
            <input type="text" class="form-control"  placeholder="" name='data[User][city]' value='<?php echo $userDetail['User']['city'] ?>'>
        </div>
        
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Upload Profile Image</label>
            <input type="file" class=""  placeholder="" name='data[User][profile_image]'  value='<?php echo $userDetail['User']['profile_image'] ?>'>
        </div>
        

        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">State</label>
            <input type="text" class="form-control"  placeholder="" name='data[User][state]' value='<?php echo $userDetail['User']['state'] ?>'>
        </div>
        
       
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Upload Portfolio Photos</label>
              <input type="button" id="exampleInputFile" onclick="uploadPortfolio();" value="Browse"> 
              <p>Press CTRL to select multiple images. </p>
      
         </div> 
        
        
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">About</label>
            <textarea class="form-control" name='data[ListingDetail][about_bio]'> <?php echo @$userProfileDetail['ListingDetail']['about_bio'] ?> </textarea>
        </div>

        <div class="clearfix"></div>
        <br/>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:#fff;">
            Change Password
        </a>

        <div class="collapse" id="collapseExample">
            <div class="well">

                <div class="form-group mar_profile">
                    <label class="col-sm-4 control-label" for="inputEmail3">Old Password</label>
                    <div class="col-sm-8">
                        <input type="password" placeholder="Old Password" id="oldPassword" class="form-control" name='data[User][old_password]' onblur="checkPassword()">
                    </div>
                    
                    <div id="old_pass_msg" style="margin-left:300px; color:red;">  </div>
                    
                    <div class="clearfix"></div>
                </div>
                
                <div class="form-group mar_profile">
                    <label class="col-sm-4 control-label" for="inputEmail3">New Password</label>
                    <div class="col-sm-8">
                        <input type="password" placeholder="New Password" id="new_pass" class="form-control" name='data[User][password]' >
                    
                              <div style='color:red' id='pass'></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group mar_profile">
                    <label class="col-sm-4 control-label" for="inputEmail3">Confirm New Password</label>
                    <div class="col-sm-8">
                        <input type="password" placeholder="Confirm New Password" id="conPassword" class="form-control" name='data[User][conf_password]' onkeyup="checkPass(); return false;">
                              <div style='color:red' id='conf_msg'></div>
                    
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div> 
        
    <div align="center">
        <button type="submit" class="btn btn-default btn-primary invest">Save Changes</button>
    </div>
      <?php echo $this->Form->end(); ?>
</div>


<?php // echo $this->html->script('jquery.js');
      echo $this->html->script('jquery.validate.min.js');?>


<script type="text/javascript">
 $(document).ready(function() {
       $("#ListingEditListingPartnerForm").validate({
            
            rules: {
//                "data[ListingDetail][bio_data]": {
//                    required: true
//                },
//                "data[ListingDetail][portfolio]": {
//                    required: true
//                },
//             
//                "data[ListingDetail][executive]": {
//                    required: true
//                },
//                
//                "data[ListingDetail][leadership]": {
//                    required: true
//                },
                
               "data[ListingDetail][company_name]": {
                    required: true
                },
                
                "data[ListingDetail][city]": {
                    required: true
                },
                
                "data[ListingDetail][country]": {
                    required: true
                },
                
                "data[ListingDetail][about_bio]": {
                    required: true
                }
           
            },
            messages: {
             
                "data[ListingDetail][company_name]": {
                    required: "Company name should not be blank.</br>"
                },
                
                "data[User][city]": {
                    required: "City should not be blank.<br/>"

                },
              
                "data[User][country]": {
                    required: "Country should not be blank.<br/>"

                },
                
                "data[User][about_bio]": {
                    required: "About Bio should not be blank.<br/>"

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
  
  
  
  <!--Modal For Portfolio Image Upload -->

<div class="modal fade" id="myModal_upload_portfolio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'upload_portfolio','enctype' => 'multipart/form-data','id' =>'addPortfolio')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>Upload Portfolio Photos</h3></h4>
        </div>

          <div class="well">
              <div class="form-group mar_profile">
                  <label class="col-sm-4 control-label" for="inputEmail3">Upload File</label>
                  <div class="col-sm-8">
                      <input multiple="true" type="file" id="portfolio" name="portfolio_image[]" class='photoimg'>
                  </div>
                  <div class="clearfix"></div>
              </div>   

              <input type="submit" class="btn btn-primary" value="ADD" style='margin-left: 240px;'>
          </div>
                
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END -Modal For Portfolio Image Upload -->