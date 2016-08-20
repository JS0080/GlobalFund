<div id="viewDetail">
<ul class="list-unstyled list-inline">       
    <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal11">
            Compose
        </button></li>

    <li><a onclick="investViewInbox();" href="javascript:void(0)"><button type="button" class="btn btn-primary">Inbox</button></a></li>
    <li><a onclick="investSentMessage();" href="javascript:void(0)">
            <button type="button" class="btn btn-primary">Sent Mail</button></a></li>    

<!--    <li><a href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'invest_trash_list')); ?>">
            <button type="button" class="btn btn-primary">Trash</button></a></li>      -->
</ul>

<table class="table table-bordered" style="margin-top:20px;">
    <thead>
        <tr style="font-size:20px; width:100%;">
            <th style="width:30%;">From</th>
            <th style="width:55%;">Subject</th>
            <th style="width:15%;">Date</th>
            <th style="width:5%;">Action</th>
        </tr>
    </thead>
    
    
    <tbody>
        <?php
        foreach ($messages as $message) {
            if ($message['MessageUser']['is_read'] == 1) {
                $class = "read";
            } else {
                $class = "unread";
            }
            ?>

        <tr>
                <td class="<?php echo $class; ?>" scope="row">

                    <?php $toUser = $this->requestAction(array('controller' => 'messages', 'action' => 'getToUser', 'to_id' => $message['Message']['sender_id'])); ?>

                    <a onclick="investViewMessage(<?php echo $message['MessageUser']['id']; ?>);" href="javascript:void(0)">
                        <?php echo $toUser['User']['first_name'] . " " . $toUser['User']['last_name'] ?>
                    </a>
                </td>


                <td class="<?php echo $class; ?>">
                    <a  onclick="investViewMessage(<?php echo $message['MessageUser']['id']; ?>);" href="javascript:void(0)">
                        <?php echo $message['Message']['subject'] ?>
                    </a>
                </td>

                <td class="<?php echo $class; ?>">
                    <a  onclick="investViewMessage(<?php echo $message['MessageUser']['id']; ?>);" href="javascript:void(0)">
                        <?php echo date('M j Y', strtotime($message['Message']['created'])); ?>
                    </a> 
                </td> 

                
               <td class="<?php echo $class; ?>">
                   
                       <?php  if(!empty($message['Message']['type'])) {  ?>  
                                                        <?php
                                                            echo $this->Html->link(
                                                                    $this->Html->image('attach.jpg'), array(
                                                                    'controller' => 'messages', 'action' => 'download',
                                                                    $message['Message']['type']
                                                                    ), array('escape' => false)
                                                                 );
                                                        ?>  
                                                     <?php } ?>
                   
                    <a  onclick="investDeleteMessage(<?php echo  $message['MessageUser']['id']; ?>);" href="javascript:void(0)">
                        <img src="<?php echo IMGPATH."trash.png" ?>">
                    </a> 
                </td> 
       
         </tr>
     <?php } ?>
    </tbody>
</table>
    
</div>    