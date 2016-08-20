<div class="row">
    <div class="col-md-12">
        
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green ">
            
            <div class="portlet-title">
                <div class="caption">Edit About </div>
            </div>
            
            <div class="portlet-body form">
                
                <div style="color:red;text-align:center;margin-left: -392px;"> <?php echo $this->Session->flash(); ?></div>
                
                    <?php echo $this->Form->create("Content", array("id" => "add_home", 'class' => 'form-horizontal')); ?>
                
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Page Title</label>
                            <div class="col-md-6">
                                <input type="text"  class="form-control" name="data[Content][content_name]" value="<?php echo  $contentDetail['Content']['content_name']; ?>"> 
                            </div>
                        </div>    


                        <div class="form-group">
                            <label class="col-md-3 control-label">Short Description</label>
                            <div class="col-md-6">
                                <textarea rows="3" class="form-control" name="data[Content][content]"> <?php echo  $contentDetail['Content']['content']; ?> </textarea>
                            </div>
                        </div>
                        
                        
                        
                          <div class="form-group">
                            <label class="col-md-3 control-label">Long Description</label>
                            <div class="col-md-6">
                                <textarea rows="5" class="form-control" name="data[Content][long_desc]"> <?php echo  $contentDetail['Content']['long_desc']; ?> </textarea>
                            </div>
                        </div>

                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-6">
                                <button class="btn green" type="submit"> 
                                    submit</button>
                            </div>
                        </div>
                        
                  </div>
                
                <?php echo $this->form->end(); ?>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div> 
