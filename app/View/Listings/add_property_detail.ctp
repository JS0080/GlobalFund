 <?php 
  //   echo $this->html->script('jquery.js');
     echo $this->html->script('jquery.validate.min.js');
  ?>



<script>
function openPopUp(id){
   // alert(id);
    $('#content_id').val(id); 
    $('#myModal_popup').modal('show');
}

function addListingContent(){
     $('#myModal_add_listing_content').modal('show');
}


function openDocModal(id){
   $('#document_id').val(id); 
   $('#myModal_document').modal('show');
}


function addDocumentContent(){
    $('#myModal_add_document').modal('show'); 
}


function addCapitalContent(){
  $('#myModal_add_capital').modal('show');   
}

$(document).ready(function (e) {
// FUNCTION TO UPLOAD LISTING FILE 
   $("#uploadListForm").on('submit',(function(e) {     
     var contentId = $('#content_id').val();
    var imageName = $("input[name=image]").val();

   if(imageName !=''){
      var fileExt = '.' + imageName.split('.').pop();
     
        if(fileExt =='.pdf' || fileExt=='.docx' )  { 
            e.preventDefault();
            $.ajax({
            url: "<?php echo SITEPATH."listings/add_listing_partner" ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {  
                        $('#content_id').val('');
                        $('.photoimg').val('');

                        $('#myModal_popup').modal('hide');
                        $('#upload_'+contentId).css('display','block');
                    },

                    error: function(){

                     } 	        
            });
          }else{
            alert('Please select only .pdf or .doc file');
              return false;
         }
      }else{
       alert('Please select document');
       return false;
      }
    }));
    // END FUNCTION TO UPLOAD LISTING FILE     
        
        
   // FUNCTION TO UPLOAD LISTING CONTENT        
   $("#addListContent").on('submit',(function(e) {     
     var contentId = $('#content_id').val();
     
      var contentName =$("#listContentName").val();
    
      var imageName = $("input[name=listing_image]").val();

      if(contentName ==''){
           alert('Please enter content name');
            return false;
      }else if(imageName !=''){
        var fileExt = '.' + imageName.split('.').pop();
     
        if(fileExt =='.pdf' || fileExt == '.docx') {

                e.preventDefault();
                $.ajax({
                    url: "<?php echo SITEPATH . "listings/add_listing_partner_content" ?>",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        //alert(data); return false;
                        $('#inputEmail3').val('');
                        $('.photoimg').val('');
                      //  $('#list').html(data);
                        $('#list').append(data);
                        $('#myModal_add_listing_content').modal('hide');                       
                    },
                    error: function() {

                    }
                });
            } else {
                alert('Please select only .pdf or .doc file');
                return false;
            }
        } else {
            alert('Please select document');
            return false;
        }   
    }));
     // END FUNCTION TO UPLOAD LISTING CONTENT      
     
     
  // FUNCTION TO UPLOAD LISTING CONTENT        
   $("#uploadDocument").on('submit',(function(e) {     
     var docId = $('#document_id').val();
 
      var imageName = $("input[name=doc_image]").val();
 
     if(imageName !=''){
        var fileExt = '.' + imageName.split('.').pop();
     
          if(fileExt =='.pdf' || fileExt == '.docx') {
            e.preventDefault();
            $.ajax({
            url: "<?php echo SITEPATH."listings/upload_document_property" ?>",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    { 
                        $('#document_'+docId).css('display','block');
                        $('#content_id').val('');
                        $('.photoimg').val('');
                        $('#myModal_document').modal('hide');

                    },
                    error: function(){

                     } 	        
            });
          } else {
                alert('Please select only .pdf or .doc file');
                return false;
            }
       } else {
            alert('Please select document');
            return false;
        } 
    }));
     // END FUNCTION TO UPLOAD LISTING CONTENT   
     
   
  // FUNCTION TO ADD DOCUMENT CONTENT        
   $("#addDocContent").on('submit',(function(e) {     
     var contentId = $('#content_id').val();
     
      var contentName =$("#docContent").val();
    
      var imageName = $("input[name=document_image]").val();

      if(contentName ==''){
           alert('Please enter content name');
            return false;
      }else if(imageName !=''){
        var fileExt = '.' + imageName.split('.').pop();
     
        if(fileExt =='.pdf' || fileExt == '.docx') {
              e.preventDefault();
                $.ajax({
                url: "<?php echo SITEPATH."listings/add_document_content" ?>",
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data)
                        { 
                            $('#inputEmail3').val('');
                            $('.photoimg').val('');
                            $('#doc').append(data);
                            $('#myModal_add_document').modal('hide');
                        },

                        error: function(){

                       } 	        
                });
        
         } else {
                alert('Please select only .pdf or .doc file');
                return false;
            }
       } else {
            alert('Please select document');
            return false;
        } 
    }));
     // END FUNCTION TO ADD DOCUMENT CONTENT    
     
     $("#no_of_share").keyup(function() {
        var offerAmount = $('#offerAmount').val();
       
        var no_of_share = $('#no_of_share').val();
       
       var noOfShare = offerAmount / no_of_share;
        
       $('#priceShare').val(noOfShare); 
       
       $('#priceShare').attr('readonly', true);
        
      });
   
});




</script>    


<div class="col-md-10">

    <?php echo $this->Form->create('Listing',array('controller' =>'listings','action'=>'add_basic_detail','id'=>'detail','type' =>'file','class' =>'well clearfix')); ?>
            <h4>Basic Details</h4>
            <hr/>
            
        <!--  BASIC DETAIL  -->
        
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Project Name</label>
                <input type="text" class="form-control"  placeholder="" name="data[BasicsDetail][project_name]">
            </div>
        
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Offering Amount</label>
                <input type="text" class="form-control" id="offerAmount" placeholder="$" name="data[BasicsDetail][offering_amount]">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputFile">Image upload</label>
                <input type="file" id="exampleInputFile" name="data[BasicsDetail][image]">
<!--                <p class="help-block">Press CTRL to select multiple images</p>-->
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Address</label>
                <textarea class="form-control" placeholder="" name="data[BasicsDetail][address]"></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Projected Return</label>
                <input type="text" class="form-control"  placeholder="%" name="data[BasicsDetail][projected_return]">
            </div>

           <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Number of Shares</label>
                <input type="text" class="form-control" id="no_of_share" placeholder="" name="data[BasicsDetail][no_of_shares]">
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" placeholder="" name="data[BasicsDetail][description]"></textarea>
            </div>
            <h4>PROJECT SUMMARY</h4>
            <hr/>

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Acquisition Price</label>
                <input type="text" class="form-control"  placeholder="$" name="data[BasicsDetail][acquistion_price]">
            </div>
            
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Total Offering</label>
                <input type="text" class="form-control"  placeholder="$" name="data[BasicsDetail][offering_size]">
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Price Per Share</label>
                <input type="text" class="form-control" id="priceShare" placeholder="$" name="data[BasicsDetail][price_per_share]">
            </div>
         

<!--            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Target Return</label>
                <input type="text" class="form-control"  placeholder="%" name="data[BasicsDetail][target_returns]">
            </div>
            -->
            
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Offering Type</label>

                <select class="form-control" name="data[BasicsDetail][offering_type]">
                    <option value="Preferred Equity">Preferred Equity</option>
                    <option value="Equity"> Equity</option>
                    <option value="Senior Debt">Senior Debt</option>
                    <option value="Junior Debt"> Junior Debt</option>
                </select>
            </div>
            
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Holding Term</label>
                <input type="text" class="form-control"  placeholder="Month" name="data[BasicsDetail][holding_term]">
            </div>
            
<!--            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Projected Return</label>
                <input type="text" class="form-control"  placeholder="%" name="data[BasicsDetail][project_returns]">
            </div>-->
<!--            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Capital Structure</label>
                <input type="file"   placeholder="" name="data[BasicsDetail][capital_structure]">
            </div>-->

           <!--  END OF BASIC DETAIL-->

           
           
           <!-- LISTING PARTNER  -->
            <div class="clearfix"></div>
            <h4>LISTING PARTNER</h4>
            <hr/>
            
            <div id='list'>
            <?php foreach($ListingPartners as $partner){  ?>
            
             <div class="form-group col-sm-6 col-md-6">
                <div class="edit_im1">
                    <label class="pull-left" for="exampleInputFile"><?php echo $partner['ListingPartnerContent']['contents']; ?></label>
                   
                    <div id='upload_<?php echo $partner['ListingPartnerContent']['id']; ?>' style='display:none;margin-left: 20px;'>
                        <img src="../img/active.png" width="18" alt="">
                    </div>
                    
                    <div class="clearfix"></div>
                    <?php 
                       if($partner['ListingPartnerContent']['contents'] == 'Company Bio'){
                       echo   $listingdocumnt = $linstingDetail['ListingDetail']['upload_bio'];
                         
                      }else if($partner['ListingPartnerContent']['contents'] == 'Portfolio'){
                       echo  $listingdocumnt = $linstingDetail['ListingDetail']['portfolio'];
                         
                      }else if ($partner['ListingPartnerContent']['contents'] == "Executive Bio's"){
                      echo   $listingdocumnt = $linstingDetail['ListingDetail']['executive_summary'];  
                        
                      }else if($partner['ListingPartnerContent']['contents'] == 'Due Diligence Summary'){
                        echo $listingdocumnt = $linstingDetail['ListingDetail']['team_leadership'];
                         
                      }else {  ?>
                    
                        <input type="button" id="exampleInputFile" onclick="openPopUp('<?php  echo $partner['ListingPartnerContent']['id']; ?>');" value="upload">  
                            <p class="help-block">Upload .docx or .pdf files.</p>
                            
                    <?php  }  ?>
                    
                  

                </div>                
            </div>
                
            <?php } ?>
                
           </div>
            
            <div class="form-group col-sm-12 ">
                <a class="btn btn-primary"  href="javascript:void(0)"  style="color:#fff;" onclick="addListingContent();">+ Add Another</a>     
            </div>

            <div class="clearfix"></div>
            <h4>DOCUMENTS</h4>
            <hr/>
            
            <div id='doc'>
            <?php foreach($Documents as $document) { ?>
            <div class="form-group col-sm-6 col-md-6">
                <div class="edit_im1">
                    <label class="pull-left" for="exampleInputFile"><?php echo $document['DocumentContent']['contents']; ?></label>
                   
                      <div id='document_<?php echo $document['DocumentContent']['id']; ?>' style='display:none;margin-left: 20px;'>
                        <img src="../img/active.png" width="18" alt="">
                    </div>
                    
                    <div class="clearfix"></div>
                    <input type="button" id="exampleInputFile" onclick="openDocModal('<?php echo $document['DocumentContent']['id']; ?>');" value="upload">  
                    <p class="help-block">Upload .docx or .pdf files.</p>

                </div>
                
            </div>
            <?php } ?>
                
            </div>    
                
             <div class="form-group col-sm-12 ">
                <a class="btn btn-primary"  href="javascript:void(0)"  style="color:#fff;" onclick="addDocumentContent();">+ Add Another</a>
     
            </div>

            <div class="clearfix"></div>
            <h4>Capital Structure</h4>
            <hr/>
            <?php foreach($Capitals as $capital){  ?>
            
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo $capital['CapitalStructureContent']['contents'] ?> </label>
                <input type="text" class="form-control" id="<?php echo $capital['CapitalStructureContent']['id'] ?>"  
                placeholder="" name="data[CapitalStructureContent][<?php echo $capital['CapitalStructureContent']['id'] ?>]">
            </div>
            <?php } ?> 
            
     <div align="center">
        <button type="submit" class="btn btn-default btn-primary invest">Submit</button>
    </div>
     <?php echo $this->Form->end();?>        
  </div>


<script>
$(document).ready(function() {

    $("#detail").validate({
        
        rules:{
          "data[BasicsDetail][project_name]":{
              required:true
          }, 
         "data[BasicsDetail][offering_amount]":{
              required:true
          }, 
          
           "data[BasicsDetail][image]":{
              required:true
          },
          
          
          "data[BasicsDetail][address]":{
              required:true
          },
          
          "data[BasicsDetail][projected_return]":{
              required:true
          }, 
         
          "data[BasicsDetail][price_per_share]":{
              required:true
          },
          
          "data[BasicsDetail][description]":{
              required:true
          },

           "data[CapitalStructureContent][1]":{
              required:true,
              number: true
          },
          
           "data[CapitalStructureContent][2]":{
              required:true,
              number: true
          },
          
           "data[CapitalStructureContent][3]":{
              required:true,
              number: true
          },
          
           "data[CapitalStructureContent][4]":{
              required:true,
              number: true
          }
          
        },
        messages:{
            "data[BasicsDetail][project_name]":{
              required:"Project name should not be blank"
          },
          "data[BasicsDetail][offering_amount]":{
              required:"Offering amount should not be blank"
          },
          
          "data[BasicsDetail][image]":{
             required:"Project Image should not be blank"
          },
          
          "data[BasicsDetail][address]":{
              required:"Address should not be blank"
          },
              
          "data[BasicsDetail][projected_return]":{
              required:"Project return should not be blank"
          }, 
        
          "data[BasicsDetail][price_per_share]":{
              required:"Price per share should not be blank"
          },
              
          "data[BasicsDetail][description]":{
              required:"Description should not be blank"
          },

          "data[CapitalStructureContent][1]":{ 
              required:"Equity should not be blank",
              number: "Please enetr only number"
          },
          
           "data[CapitalStructureContent][2]":{
              required:"Issuer Equity should not be blank",
               number: "Please enetr only number"
          },
          
           "data[CapitalStructureContent][3]":{
              required:"Senior Debt should not be blank",
               number: "Please enetr only number"
          },
          
          "data[CapitalStructureContent][4]":{
              required:"Junior Debt should not be blank",
              number: "Please enetr only number",            
          }
  
        },
        
        errorContainer: "#messageBox1, #messageBox2",
        errorLabelContainer: "#messageBox1 ul",
        wrapper: "li",
        submitHandler: function (form) {
          //form.submit();
            var equity = $('input#1').val();
            var issuer_equtiy = $('input#2').val(); 
            var senior_debt = $('input#3').val();  
            var junior_debt = $('input#4').val();

            // Create variables that will be sent in a URL string to mail.php
            var dataString = 'equity=' + equity + '&issuer_equtiy='+ issuer_equtiy + '&senior_debt=' + senior_debt + '&junior_debt=' + junior_debt;
  
            $.ajax({
                type: 'POST',
                url: '<?php echo SITEPATH; ?>'+"listings/countCapital",
                data: dataString,
           })
           
            .done(function (response) {
            //   alert(response);
                if (response == 'success') {               
                   form.submit();                
                } else {
                    alert('The sum of capital structure should be 100');
                    return false;
                }
            });
            //return false; // required to block normal submit since you used ajax
   
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
          <?php echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'add_listing_partner','enctype' => 'multipart/form-data','id' =>'uploadListForm')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>Listing Partner.</h3></h4>
        </div>

          <input type="hidden" name="data[Listing][content_id]" id="content_id">


          <div class="modal-body clearfix">
            <p class="col-md-12"><b>Upload File *</b></p>	
            <div class="form-group col-md-6">
             <input type="file" id="exampleInputFile" name="image" class="photoimg">
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END Modal For Listing Listing Add Property-->

<!--Modal For Listing Listing ADD Content -->

<div class="modal fade" id="myModal_add_listing_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'add_listing_partner_content','enctype' => 'multipart/form-data','id' =>'addListContent')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>Add Listing Partner.</h3></h4>
        </div>

                    <div class="well">
                      
                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Label</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" name="data[ListingContent][content_name]" id="listContentName" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Upload File</label>
                            <div class="col-sm-8">
                                <input type="file" id="exampleInputFile" name="listing_image" class='photoimg'>
                            </div>
                            <div class="clearfix"></div>
                        </div>   
                        
                         <input type="submit" class="btn btn-primary" value="ADD" style='margin-left: 240px;'>
                            
                    </div>
                
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END Modal For Listing Listing ADD Content -->




<!--Modal For DOCUMENT Add Property-->
<div class="modal fade" id="myModal_document" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'upload_document_property','enctype' => 'multipart/form-data','id' =>'uploadDocument')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>Document.</h3></h4>
        </div>

          <input type="hidden" name="data[Document][content_id]" id="document_id">

          <div class="modal-body clearfix">
            <p class="col-md-12"><b>Upload File *</b></p>	
            <div class="form-group col-md-6">
             <input type="file" id="exampleInputFile" name="doc_image" class='photoimg'>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END Modal For DOCUMENT Add Property-->


<!--Modal For Document ADD Content -->

<div class="modal fade" id="myModal_add_document" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'add_document_content','enctype' => 'multipart/form-data','id' =>'addDocContent')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>Add Document.</h3></h4>
        </div>

                    <div class="well">
                      
                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Label</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" name="data[DocumentContent][content_name]" id="docContent" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Upload File</label>
                            <div class="col-sm-8">
                                <input type="file" id="exampleInputFile" name="document_image" class='photoimg'>
                            </div>
                            <div class="clearfix"></div>
                        </div>   
                        
                         <input type="submit" class="btn btn-primary" value="ADD" style='margin-left: 240px;'>
                            
                    </div>
                
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END Modal For Document ADD Content -->


<!--Modal For Capital Structure ADD Content -->

<div class="modal fade" id="myModal_add_capital" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <?php echo $this->Form->create('Listing',array('controller' =>'listings','action' =>'add_capital_content','enctype' => 'multipart/form-data')); ?>
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><h3>Add Capital Structure.</h3></h4>
        </div>
            <div class="well">

                  <div class="form-group mar_profile">
                      <label class="col-sm-4 control-label" for="inputEmail3">Label</label>
                      <div class="col-sm-8">
                          <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[CapitalStructureContent][content_name]">
                      </div>
                      <div class="clearfix"></div>
                  </div>


                  <div class="form-group mar_profile">
                      <label class="col-sm-4 control-label" for="inputEmail3">Description</label>
                      <div class="col-sm-8">
                          <input type="text" placeholder="Description" id="inputEmail3" class="form-control" name="data[CapitalStructureContent][content_value]">
                      </div>
                      <div class="clearfix"></div>
                  </div>                      
                   <input type="submit" class="btn btn-primary" value="ADD" style='margin-left: 240px;'>
              </div>
                
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
 </div>  
<!-- END Modal For Capital Structure ADD Content -->