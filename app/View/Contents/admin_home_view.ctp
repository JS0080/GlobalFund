<div class="row">
    <div class="col-md-12">
        
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            
            <div class="portlet-title">
                <div class="caption">View Home </div>
            </div>
            
            <div class="portlet-body form">
                
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                
                    <?php echo $this->Form->create("Content", array("id" => "add_home", 'class' => 'form-horizontal')); ?>
                
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Short Description : </label>
                            <div class="col-md-6">
                                
                                <p> <?php echo  $contentDetail['Content']['content']; ?> </p>
                                
<!--                                <textarea rows="3" class="form-control" name="data[Content][content]"> <?php echo  $contentDetail['Content']['content']; ?> </textarea>-->
                            </div>
                        </div>
                        
                        
                        
                          <div class="form-group">
                            <label class="col-md-3 control-label">Long Description : </label>
                            <div class="col-md-6">
                                
                                 <p> <?php echo  $contentDetail['Content']['long_desc']; ?> </p>
                                
<!--                                <textarea rows="5" class="form-control" name="data[Content][long_desc]"> <?php echo  $contentDetail['Content']['long_desc']; ?> </textarea>-->
                            </div>
                        </div>

                  </div>
                
                <?php echo $this->form->end(); ?>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 
