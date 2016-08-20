<div class="col-md-10">
    
    <?php echo $this->Form->create('Investment',array('controller' =>'investments' , 'action' =>'add_investment','class' =>'form-horizontal','id' =>'invest_detail')); ?>
             	
    <div class="form-group">
        <div class="col-md-10">
            <div class="form-group">
                <label class="col-sm-6 col-md-4 control-label">Project </label>
                <div class="col-sm-6 col-md-8">
                    <?php echo $projects['BasicsDetail']['project_name']; ?>
                </div>
            </div>
            
            <input id="projectId" type="hidden" name="data[InvestorInvestment][project_id]" value="<?php echo $projects['BasicsDetail']['id']; ?>">

            <div class="form-group">
                <label class="col-sm-6 col-md-4 control-label">Price Per Share</label>
                <div class="col-sm-6 col-md-8" >
                    $<?php echo $projects['BasicsDetail']['price_per_share']; ?> per/share
                </div>
                <input type="hidden" id="price" name="data[InvestorInvestment][shares]" value="<?php echo $projects['BasicsDetail']['price_per_share']; ?>">
            </div>

            <div class="form-group">
                <label class="col-sm-6 col-md-4 control-label">User Name</label>
                <div class="col-sm-6 col-md-8">
                    <?php echo $userDetail['User']['first_name'] . " " . $userDetail['User']['last_name']; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-6 col-md-4 control-label">Email Address</label>
                <div class="col-sm-6 col-md-8">
                    <?php echo $userDetail['User']['username']; ?>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-6 col-md-4 control-label">Number of Shares</label>
                <div class="col-sm-6 col-md-4">
                    <input type="text" class="form-control" id="shares"  name="data[InvestorInvestment][shares]" placeholder="" onkeyup="totalprice();">
                </div>

                <label  class="col-sm-6 col-md-4">Total Price :$ <span id="total">0 </span></label>
            </div>
            
            <input type="hidden" id="totalPrice" name="data[InvestorInvestment][total_price]">

            <div class="form-group">
                <label class="col-sm-6 col-md-4 control-label">Comments</label>
                <div class="col-sm-6 col-md-8">
                    <textarea class="form-control" name="data[InvestorInvestment][comment]"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-md-8">
                    <div id="checkalert" style="color:red"> </div>
                    
                    <div class="checkbox">
                        <label style="height:80px; overflow-y:scroll;">
                            <input id="checkbox" type="checkbox" name="data[InvestorInvestment][checkbox]"><br> Globalgroupfund.com is a website operated by GlobalGroupFund, Inc. Equity securities offered on our platform may be covered under any applicable securities laws, including Title II, III, and IV of the JOBS Act. GlobalGroupFund operates in New York, and by accessing this site and any pages thereof, you agree to be bound by our Terms of Service and Privacy Policy. GlobalGroupFund.com is currently only accepting accredited investors and persons residing abroad in jurisdictions where securities registration exemptions apply, but unaccredited investors are encoutaged to apply for any applicable regulation A offerings and to be incuded in Title III offerings, law permitting. GlobalGroupFund does not make investment recommendations, and no communication through this website or in any other medium should be construed as such. Investment opportunities posted on this website are “private placements” of securities that are not publicly traded, are subject to holding period requirements, and are intended for investors who do not need a liquid investment. Private placement investments are NOT bank deposits (and thus NOT insured by the FDIC or by any other federal governmental agency), are NOT guaranteed by GlobalGroupFund and MAY lose value. Neither the Securities and Exchange Commission nor any federal or state securities commission or regulatory authority has recommended or approved any investment or the accuracy or completeness of any of the information or materials provided by or through the website. Investors must be able to afford the loss of their entire investment. Any financial projections or returns shown on the website are illustrative examples only, and there can be no assurance that any valuations provided are accurate or in agreement with market or industry valuations. Any investment information contained herein has been secured from sources GroupFund believes are reliable, but we make no representations or warranties as to the accuracy of such information and accept no liability therefor. Offers to sell, or the solicitations of offers to buy, any security can only be made through official offering documents that contain important information about risks, fees and expenses. Investors should conduct their own due diligence, not rely on the financial assumptions or estimates displayed on this website, and are encouraged to consult with a financial advisor, attorney, accountant, and any other professional that can help you to understand and assess the risks associated with any investment opportunity. *Past performance is not indicative of future performance."
                        </label>
                    </div>
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-sm-offset-4 col-md-8">
                    <?php if($userDetail['User']['finance4'] == '') { ?>
                    
                       <button type="button" class="btn btn-default button_blue" onclick="check_invest();">Invest</button>

                    <?php } else { ?>
                    
                       <button type="button" id="send" class="btn btn-default button_blue" onclick="send_payment();">Invest</button>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-2">
            <img src="<?php echo IMGPATH . "BasicDetail/" . $projects['BasicsDetail']['image']; ?>" class="img-rounded img-responsive pull-left ml" title="profile image">
        </div> 
               
    </div>
   <?php echo $this->Form->end(); ?>
             
 </div>


<input type="hidden" id="projectId" value="<?php echo $projects['BasicsDetail']['id']; ?>">

<input type="hidden" id="sessionId" value="<?php echo $_SESSION['Auth']['User']['id']; ?>">


<?php //echo $this->html->script('jquery.js');
   echo $this->html->script('jquery.validate.min.js'); ?>

<script>
    function totalprice(){
       var sessionId = $('#sessionId').val(); 
       
       if(sessionId ==''){
          window.location = '<?php echo SITEPATH."users/logout" ?>';   
       } else {        
        var shares = $('#shares').val();
        var price = $('#price').val();
        
        var originalPrice = price.split(",").join('');
        var total = shares * originalPrice;

         $('#total').html(total);
         $('#totalPrice').val(total);
       }
    }
    
    
    $(document).on('keyup', '#shares', function() {
         var shares  = $('#shares').val();
         
         var projectId = $('#projectId').val();
         
          $.ajax({
            type: "POST",
            url: '<?php echo SITEPATH."investments/share_limit" ?>',
            data: {shares : shares ,project_id: projectId},
            success: function(resp){
             // alert(resp);
               if(resp ==0){
                   alert('Shares Limit exceed');
                   $('#shares').css('border', 'solid 1px red');
                   $( "#send" ).prop( "disabled", true );
                     return false;  
               }else{
                
               }
            }
          }); 
    });
    
    
    
     function send_payment(){
        $('#noInvest').html('');
        var shares = $('#shares').val();
        var price = $('#price').val();
        var price = price.split(",").join('');
        
        var projectId = $('#projectId').val();
        
        var amount = shares * price;
        
        var checked = $('#checkbox').is(':checked');
      
        if(shares==''){
           $('#shares').css('border', 'solid 1px red');
           return false;
        }else if(checked == false) {
           var resp = "Please check checkbox";
           $('#checkalert').html(resp);
           return false;
        }else{
           $('#myModal_invest_popup').modal('show'); 
           
//          $.ajax({
//            type: "POST",
//            url: '<?php echo SITEPATH."investments/projects_investments" ?>',
//            data: {shares : shares , price : price , amount : amount,projectId : projectId},
//            success: function(resp){
//              //alert(resp);
//               if(resp ==0){
//                  $('#myModal_invest_popup').modal('show'); 
//                  
//                 //window.location = '<?php echo SITEPATH."investments/dwolla_payment?amount=" ?>' + amount;    
//               }else{
//                 alert('Something Wrong');
//                 return false;
//               }
//            }
//          }); 
        }
    }
    
     
    function check_invest(){
      
       $('#myModal_popup').modal('show');
    }
    
    
    function invest_continue(){
        
      $( "#continue" ).html( "<b>Please note, your investment is not complete and will require execution of the necessary documents, and funding of the total investment amount within 3 business days. \n\
                      Please confirm your intent to finalize the investment within 3 business days.</b>" );     
   
        $('#cont').css("display","none");
        
        $('#confr').css("display","block");
   
    }
    
    
    
   function invest_confirm(){
       
      $( "#continue" ).replaceWith( "<b>THANK YOU! You will receive a link with details regarding the execution of the investment documents. Please use Dwolla (our online payment gateway) or our wire instructions to fund your investment within 3 business days.</b>" );    
   
       $('#cont').css("display","none");
        
        $('#confr').css("display","none");
        
        $('#c_ok').css("display","block");
    
    }
    
    
    function invest_ok(){
        var shares = $('#shares').val();
        var price = $('#price').val();
        var price = price.split(",").join('');
        
       var projectId = $('#projectId').val();
        
       var amount = shares * price;
        
       if(amount !=='' && projectId !=='')  {
        $.ajax({
            type: "POST",
            url: '<?php echo SITEPATH."investments/projects_investments" ?>',
            data: {shares : shares , price : price , amount : amount,projectId : projectId},
            success: function(resp){
              //alert(resp);
               if(resp ==0){      
                 window.location = '<?php echo SITEPATH."investments/investor" ?>';    
               }else{
                 alert('Something Wrong');
                 return false;
               }
            }
          }); 
       }   
    }
    
    
    
        
  $(document).ready(function() {
      $('#invest_detail').validate({
            rules:{
                "data[InvestorInvestment][shares]":{
                    required:true,
                 //   number:true
                },
                        
                "data[InvestorInvestment][comment]":{
                   required:true  
                },
                
                "data[InvestorInvestment][checkbox]":{
                   required:true  
                }
            },
            
            messages:{
                "data[InvestorInvestment][shares]":{
                 required:"Please enter no of shares."
                },
                        
                "data[InvestorInvestment][comment]":{
                  required:"Please enter comments"  
                },
                
                "data[InvestorInvestment][checkbox]":{
                     required:"Please check  comments"  
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
  
  
<!--Modal For Listing Partner Add Property-->
<div class="modal fade" id="myModal_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php //echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'add_listing_partner','enctype' => 'multipart/form-data','id' =>'uploadListForm')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>You are not accredified</h3></h4>
        </div>
          
         <div class="modal-body clearfix">
            <p class="col-md-12"><b>Sorry! Due to current securities regulations, you cannot invest until your status as an "Accredited Investor" has been verified. Please self-accredit through our third-party vendor Accredify, or execute and submit a 4506-T to accredit@globalgroupfund.com.</b></p>	
           
        </div>

      </div>
    </div>
 </div>  
<!-- END Modal For Listing Listing Add Property-->



<!--Modal For Investment Confirmation -->
<div class="modal fade" id="myModal_invest_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php //echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'add_listing_partner','enctype' => 'multipart/form-data','id' =>'uploadListForm')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>You are accredified</h3></h4>
        </div>
          
         <div class="modal-body clearfix">
            <div class="col-md-12" id="continue"><b>You are about to submit a non-binding indication of interest in this investment opportunity. However, we will set aside the requested shares for you. Would you like to continue?.</b></div>	           
        </div>
 
        <div class="modal-footer">
            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
          <button type="button" class="btn btn-primary pull-right" id="cont" style="display:block;" onclick="invest_continue()">Continue</button>
      
          <button type="button" class="btn btn-primary pull-right" id="confr" style="display:none;" onclick="invest_confirm()">Confirm</button>
          
          <button type="button" class="btn btn-primary pull-right" id="c_ok" style="display:none;" onclick="invest_ok()">OK</button>
          
        </div>
          <?php //echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END Modal For Investment Confirmation -->
  

  
  
  