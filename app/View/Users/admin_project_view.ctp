<script>
$(document).ready(function(){
   $(".listing").click(function(){ // Click to only happen on announce links
     $("#listingId").val($(this).data('id'));
     $('#myModal2').modal('show');
   });
   
   
  $(".document").click(function(){ // Click to only happen on announce links
     $("#documentId").val($(this).data('id'));
     $('#myModal3').modal('show');
   }); 
   
   
}); 
</script>    

<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">Project View
                </div>
            </div>
            <div class="portlet-body form">
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                <h1 style="padding-left:10px; padding-top:10px;">Basic Details

                    <a data-toggle="modal" href="#myModal" ><span class="glyphicon glyphicon-edit" style="margin-left:40px; font-size:20px;"></span></a>
<!--                    
                    <a href="#" data-dismiss="modal" data-target="#sdsad"> <span class="glyphicon glyphicon-folder-open" style="margin-left:40px; font-size:20px;"></span></a>-->

                </h1>
                
               <div id="basic_detail" style="background: #cccccc;margin-left:10px; margin-right:50px; "> 
                <div class="form-body">
                   <div class="form-group">
                        <label class="col-md-3 control-label"> Project Name :</label>
                        <div class="col-md-6">
                          <?php echo $projects['BasicsDetail']['project_name'];  ?>
                        </div>
                    </div>
                </div>
                
                
                 <div class="form-body">
                   <div class="form-group">
                        <label class="col-md-3 control-label"> Offering Amount :</label>
                        <div class="col-md-6">
                             <?php echo $projects['BasicsDetail']['offering_amount'];  ?>
                        </div>
                    </div>
                </div>
                
                
                 <div class="form-body">
                   <div class="form-group">
                        <label class="col-md-3 control-label"> Address :</label>
                        <div class="col-md-6">
                           <?php echo $projects['BasicsDetail']['address'];  ?>
                        </div>
                    </div>              
                </div>
                
                
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Projected Return :</label>
                        <div class="col-md-6">
                            <?php echo $projects['BasicsDetail']['projected_return'];  ?>
                       
                        </div>
                        
                    </div>              
                </div>


                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Price Per Share :</label>
                        <div class="col-md-6">
                            <?php echo $projects['BasicsDetail']['price_per_share'];  ?>
                        </div>
                    </div>              
                </div>


                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Description :</label>
                        <div class="col-md-6">

                            <?php echo substr($projects['BasicsDetail']['description'],0,150);  ?>
                        </div>
                    </div>              
                </div>

            </div>    
                
             <h1 style="padding-left:10px;">PROJECT SUMMARY
                 
                  <a data-toggle="modal" href="#myModal1" ><span class="glyphicon glyphicon-edit" style="margin-left:40px; font-size:20px;"></span></a>
             </h1>
             
             <div id="project summary" style="background: #cccccc;margin-left:10px; margin-right:50px; ">
                 
                 
                 
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Acquisition Price :</label>
                        <div class="col-md-6">

                           <?php echo $projects['BasicsDetail']['acquistion_price'];  ?>
                        </div>
                    </div>              
                </div>


                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Total Offering :</label>
                        <div class="col-md-6">

                            <?php echo $projects['BasicsDetail']['offering_size'];  ?>
                        </div>
                    </div>              
                </div>

             
               <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Number of Shares :</label>
                        <div class="col-md-6">

                            <?php echo $projects['BasicsDetail']['no_of_shares'];  ?>
                        </div>
                    </div>              
                </div>
             
               <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Offering Type :</label>
                        <div class="col-md-6">

                           <?php echo $projects['BasicsDetail']['offering_type'];  ?>
                        </div>
                    </div>              
                </div>
             
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Holding Term :</label>
                        <div class="col-md-6">

                           <?php echo $projects['BasicsDetail']['holding_term'];  ?>
                        </div>
                    </div>              
                </div>
                 
            </div>
             
             
             
              <h1 style="padding-left:10px;">LISTING PARTNER</h1>
               <div id="listing" style="background: #cccccc;margin-left:10px; margin-right:50px; ">
                 <?php foreach($listingPartners as $partner){ ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> <?php echo $partner['ListingPartnerContent']['contents']; ?> :</label>
                            <div class="col-md-6">
                             <?php   
                                if(!empty($partner['ListingPartner']['content_value'])){
                                    echo $this->html->link($partner['ListingPartner']['content_value'], '/listings/download/'.$partner['ListingPartner']['content_value']."/ListingPartner", array('escape'=>false, 
                                      'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                                 }  ?>                              
                            </div>
                              <a data-toggle="modal" href="#myModal2" data-id="<?php echo $partner['ListingPartner']['id'] ?>" class="listing"><span class="glyphicon glyphicon-edit"></span></a>
                        </div>              
                    </div>
               <?php } ?>
              </div>
              
              
               <h1 style="padding-left:10px;">Documents</h1>
                <div id="document" style="background: #cccccc;margin-left:10px; margin-right:50px; ">
                 <?php foreach($Documents as $document){ ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> <?php echo $document['DocumentContent']['contents']; ?> :</label>
                            <div class="col-md-6">
                                 <?php   
                                if(!empty($document['Document']['content_value'])){
                                    echo $this->html->link($document['Document']['content_value'], '/listings/download/'.$document['Document']['content_value']."/Document", array('escape'=>false, 
                                      'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                                 }  ?>
                                
                            </div>
                              <a data-toggle="modal" href="#myModal3" data-id="<?php echo $document['Document']['id'] ?>" class="document"><span class="glyphicon glyphicon-edit"></span></a>
                        </div>              
                    </div>
               <?php } ?>
              </div>      
            </div>
        </div>


        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Edit Basic Detail</h4>
            </div>
            
                    <?php echo $this->Form->create('Listing',array('controller' => 'listings', 'action' => 'admin_edit_basic') ); ?>
                 
                    <div class="well">

                        <input type="hidden" id="projectId" name="data[BasicsDetail][project_id]" value="<?php echo $projects['BasicsDetail']['id'];  ?>">
                        
                        <input type="hidden" id="userId" name="data[BasicsDetail][user_id]" value="<?php echo $projects['BasicsDetail']['user_id'];  ?>">
                        
                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Project Name :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][project_name]" value="<?php echo $projects['BasicsDetail']['project_name'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>


                       <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Offering Amount :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][offering_amount]" value="<?php echo $projects['BasicsDetail']['offering_amount'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                          <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Address :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][address]" value="<?php echo $projects['BasicsDetail']['address'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                          <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Projected Return :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][projected_return]" value="<?php echo $projects['BasicsDetail']['projected_return'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                          <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Price Per Share :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][price_per_share]" value="<?php echo $projects['BasicsDetail']['price_per_share'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                          <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Description :</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="data[BasicsDetail][description]"><?php echo $projects['BasicsDetail']['description'];  ?> </textarea>
                                
<!--                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicDetail][project_name]" value="<?php echo $projects['BasicsDetail']['project_name'];  ?>">
                                -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo $this->Form->end(); ?>     
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->







<!-- Modal 1 FOR PROJECT SUMMARY -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Edit Project Summary </h4>
            </div>
            
                    <?php echo $this->Form->create('Listing',array('controller' => 'listings', 'action' => 'admin_edit_project_summary') ); ?>
                 
                    <div class="well">

                        <input type="hidden" id="projectId" name="data[BasicsDetail][project_id]" value="<?php echo $projects['BasicsDetail']['id'];  ?>">
                        
                        <input type="hidden" id="userId" name="data[BasicsDetail][user_id]" value="<?php echo $projects['BasicsDetail']['user_id'];  ?>">
                        
                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Acquisition Price:</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][acquistion_price]" value="<?php echo $projects['BasicsDetail']['acquistion_price'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>


                       <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Total Offering :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][offering_size]" value="<?php echo $projects['BasicsDetail']['offering_size'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Number of Shares :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][no_of_shares]" value="<?php echo $projects['BasicsDetail']['no_of_shares'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                       <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Offering Type :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][offering_type]" value="<?php echo $projects['BasicsDetail']['offering_type'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                          <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Holding Term :</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Label" id="inputEmail3" class="form-control" name="data[BasicsDetail][holding_term]" value="<?php echo $projects['BasicsDetail']['holding_term'];  ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo $this->Form->end(); ?>     
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.END Modal 1 FOR PROJECT SUMMARY -->




<!-- Modal 2 FOR LISTING PARTNER -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Edit Listing Document</h4>
            </div>
            
                    <?php echo $this->Form->create('Listing',array('controller' => 'listings', 'action' => 'admin_edit_listing','enctype' => 'multipart/form-data') ); ?>
                 
                    <div class="well">

                        <input type="hidden" id="projectId" name="data[ListingPartner][project_id]" value="<?php echo $projects['BasicsDetail']['id'];  ?>">
                        
                        <input type="hidden" id="userId" name="data[ListingPartner][user_id]" value="<?php echo $projects['BasicsDetail']['user_id'];  ?>">
                        
                        <input type="hidden" id="listingId" name="data[ListingPartner][listing_id]">
                        
                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Listing Partner Document:</label>
                            <div class="col-sm-8">
                                <input type="file"  id="inputEmail3"  name="data[ListingPartner][content]" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo $this->Form->end(); ?>     
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.END Modal 2 FOR LISTING PARTNER -->



<!-- Modal 3 FOR Document -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Edit Document</h4>
            </div>
            
                <?php echo $this->Form->create('Listing',array('controller' => 'listings', 'action' => 'admin_edit_document','enctype' => 'multipart/form-data') ); ?>
                 
                    <div class="well">
                        <input type="hidden" id="projectId" name="data[Document][project_id]" value="<?php echo $projects['BasicsDetail']['id'];  ?>">
                       
                        <input type="hidden" id="documentId" name="data[Document][document_id]">
                        
                        <div class="form-group mar_profile">
                            <label class="col-sm-4 control-label" for="inputEmail3">Document:</label>
                            <div class="col-sm-8">
                                <input type="file"  id="inputEmail3"  name="data[Document][content]" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo $this->Form->end(); ?>     
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.END Modal 3 FOR Document -->