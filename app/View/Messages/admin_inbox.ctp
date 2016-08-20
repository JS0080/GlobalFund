<div class="row">
    <div class="col-md-12">
      <div class="portlet box green">
        <div class="portlet-title" style="border-bottom:none;">
            <div class="caption">
                <i class="fa fa-reorder"></i>Inbox
            </div>
        </div>
        <div class="table-scrollable" style="margin-top:30px;">
        <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
             <table class="table table-striped table-bordered table-hover" style="text-align:center;">

                  <thead>
                      <tr>
                          <th style="text-align:center" >From</th>

                          <th style="text-align:center" >Subject</th>

                          <th style="text-align:center">Date</th>

<!--                          <th style="text-align:center">Reply</th> -->
                          
                          <th style="text-align:center">Action</th> 
                      </tr>
                  </thead>

                      <tbody>
                           <?php foreach($messages as $message){   // pr($message);

                               if($message['MessageUser']['is_read'] ==1){
                                   $class = "read";
                                  // $newclass="unread";
                               }else{
                                 $class = "unread";  
                               }
                               
                              ?>
                              <tr>
                                  <td>
                                      <a href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'admin_view_message',$message['MessageUser']['id'])); ?>">
                                         <?php echo $message['Sender']['first_name']." ".$message['Sender']['last_name'] ?> </a>
                                  </td>


                                  <td>
                                       <a href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'admin_view_message',$message['MessageUser']['id'])); ?>">
                                            <?php echo $message['Message']['subject'] ?> </a>
                                  </td>

                                  <td class="<?php echo $class; ?>"> <?php  echo date('M j Y ', strtotime($message['Message']['created'])); ?> </td>

                                  <td>
                                      <?php  echo $this->Html->link($this->Html->image('trash.png', array(
                                                   'alt' => 'Delete list','class'=>'delete_btn')
                                                   ), array(
                                                   'controller' => 'messages',
                                                   'action' => 'invest_message_delete',
                                                   $message['MessageUser']['id']
                                                   ), array(
                                                   'title' =>'delete', 
                                                   'escape' => false,
                                                   'confirm' => 'Are you sure you want to delete message?'
                                                   )
                                              );
                                      ?>                    

                                  </td> 
                              </tr>
                           <?php 
                          } ?>

                      </tbody>
                  </table>
                    <div class="pagination" style="float:right; margin-right:10px;">
                          <?php echo $this->element('paging_links');?>
                    </div>
            </div>                    
        </div>
    </div>
</div>
