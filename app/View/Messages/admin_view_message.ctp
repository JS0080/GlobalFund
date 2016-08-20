

    <div class="col-md-12">
      <div class="portlet box green">
        <div class="portlet-title" style="border-bottom:none;">
            <div class="caption">
                <i class="fa fa-reorder"></i>Inbox
            </div>
        </div>
       </div>   
        
        
            <ul class="list-unstyled list-inline">

                <li><a href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'admin_inbox')); ?>"><button type="button" class="btn btn-primary">Inbox</button></a></li>
                <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal11">
                      Reply
                    </button></li>
            </ul>
          
        <div class="table-scrollable" style="margin-top:30px; background-color: white;">
        <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
                
                            <div class="col-md-11 col-md-offset-1">
                                <h3> <?php echo $messageDetail['Message']['subject']; ?></h3></div>
                            <div class="col-md-1" style="padding:0px;">

                            </div>
                            <div class="col-md-8">
                                <span><strong><?php echo $messageDetail['User']['first_name'] . " " . $messageDetail['User']['last_name']; ?></strong> &nbsp; &nbsp;< <?php echo $messageDetail['User']['username']; ?> ></span><br/>
                                <span><strong>Date:</strong> <?php echo date('M j Y g:i A', strtotime($messageDetail['Message']['created'])); ?></span><br/>
                                <span><strong>From:</strong> <?php echo $messageDetail['Receiver']['username']; ?></span><br/><br/>

                                <p><?php echo $messageDetail['Message']['message']; ?></p><br>

                                <p>Regards,</p>
                                <p><?php echo $messageDetail['Receiver']['first_name'] ." ".$messageDetail['Receiver']['last_name']; ?></p>
                            </div>
            </div>                    
        </div>



<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<!--                <h4 class="modal-title" id="myModalLabel"><h3>New Message</h3></h4>-->
            </div>
            
            <div class="modal-body clearfix">

                <?php echo $this->Form->create('Message', array('controller' => 'messages', 'action' => 'admin_send_message', 'class' => 'form-horizontal')); ?>

                    <div class="form-group">               
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="username" name="data[Message][username]" placeholder="To" value="<?php echo $messageDetail['Receiver']['username']; ?>">
                        </div>
                        <div class="tagsearch" id="tag_list_id" style="display:none;max-height:250px;"></div>                   
                    </div>

                    <div class="form-group">               
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="inputEmail3" name="data[Message][subject]" placeholder="Subject" value="<?php echo $messageDetail['Message']['subject']; ?>">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control"  name="data[Message][message]" rows="10">
                              
                            </textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    
                    <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
    
