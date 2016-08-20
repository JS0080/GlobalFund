<div class="row">
    <div class="col-md-12">
      <div class="portlet box green">
        <div class="portlet-title" style="border-bottom:none;">
            <div class="caption">
                <i class="fa fa-reorder"></i>Sent Message
            </div>
        </div>
        <div class="table-scrollable" style="margin-top:30px;">
        <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
             <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                <thead>
                    <tr style="font-size:20px; width:100%;">
                
                          <th style="text-align:center" >To</th>

                          <th style="text-align:center" >Subject</th>

                          <th style="text-align:center">Date</th>

                          <th style="text-align:center">Action</th> 
                    </tr>
                </thead>
                
                <tbody>
                    
                    <?php foreach($messages as $message){
                        
                         if($message['MessageUser']['is_read'] ==1){
                             $class = "read";
                         }else{
                           $class = "unread";  
                         }
                      ?>
                      
                    <tr>
                        <td class="<?php echo $class; ?>" scope="row">
                            
                         <?php   $toUser = $this->requestAction(array('controller'=>'messages', 'action'=>'getToUser', 'to_id' => $message['Message']['receiver_id']));  ?>  
                             
                         <a  href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'admin_sent_view_message',$message['MessageUser']['id'])); ?>">
                            <?php echo $toUser['User']['first_name']." ".$toUser['User']['last_name'] ?> </a> 
                        </td>
                        
                        
                        <td class="<?php echo $class; ?>">
                            <a  href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'admin_sent_view_message',$message['MessageUser']['id'])); ?>">
                            <?php echo $message['Message']['subject'] ?> </a>
                        </td>
                        
                        <td class="<?php echo $class; ?>">
                         <a  href="<?php echo $this->html->url(array('controller' => 'messages', 'action' => 'admin_sent_view_message',$message['MessageUser']['id'])); ?>">
                           <?php  echo date('M j Y', strtotime($message['Message']['created'])); ?></a> 
                        </td> 
                        
                         <td class="<?php echo $class; ?>">   
                            <?php  echo $this->Html->link($this->Html->image('trash.png', array(
                                          'alt' => 'Delete list','class'=>'delete_btn')
                                          ), array(
                                          'controller' => 'messages',
                                          'action' => 'listing_message_delete',
                                          $message['MessageUser']['id']
                                          ), array(
                                          'title' =>'delete',
                                          'escape' => false,
                                          'confirm' => 'Are you sure you want to delete message?'
                                          ));
                            ?> 
                         </td>  
                    </tr>
                    <?php } ?>                   
                </tbody>
            </table>
                <div class="pagination" style="float:right; margin-right:10px;">
                      <?php echo $this->element('paging_links');?>
                </div>
            </div>                    
        </div>
    </div>
</div>


<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><h3>New Message</h3></h4>
            </div>
            <div class="modal-body clearfix">

                <?php echo $this->Form->create('Message', array('controller' => 'messages', 'action' => 'invest_send_message', 'class' => 'form-horizontal','id' =>'compose')); ?>

                    <div class="form-group">               
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="username" name="data[Message][username]" placeholder="To"  onkeyup="autocomplet(this.value)">
                        </div>
                        <div class="tagsearch" id="tag_list_id" style="display:none;max-height:250px;"></div>                   
                    </div>

                    <div class="form-group">               
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="inputEmail3" name="data[Message][subject]" placeholder="Subject">
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


<?php echo $this->html->script('jquery.js');
      echo $this->html->script('jquery.validate.min.js'); 
 ?>


<script>
 // autocomplet : this function will be executed every time we change the text
    function autocomplet(name) {
        var min_length = 1; // min caracters to display the autocomplete
        var keyword = name;
        if (keyword.length >= min_length) {
         
            var string = keyword.split(/[\s;]+/);
             
            var keyword = string[string.length-1]; 
             
            $.ajax({
                url: "<?php echo SITEPATH ?>messages/search_name/",
                type: 'POST',
                data: {keyword: keyword},
                success: function(data) {
                   
                    $('#tag_list_id').show();
                    $('#tag_list_id').html(data);
                }
            });
        } else {
            $('#tag_list_id').hide();
        }
    }



    // set_item : this function will be executed when we select an item
    function set_item(item) {
        // change input value
        if (item != 0) {
            if (item != '') {
                var value = item+";";
               
                   $('#username').val(value); 
                    $('#tag_list_id').hide();
          
            }
        } else {
            $('#tag_list_id').hide();
        }
    }
    
function removeValue(list, value) {
  return list.replace(new RegExp(",?" + value + ",?"), function(match) {
      var first_comma = match.charAt(0) === ',',
          second_comma;

      if (first_comma &&
          (second_comma = match.charAt(match.length - 1) === ',')) {
        return ',';
      }
      return '';
    });
};



$(document).ready(function() {
     $('#compose').validate({
        rules:{
            "data[Message][username]":{
                required:true,
             
            }

//            "data[Message][subject]":{
//               required:true  
//            }
        },

        messages:{
            "data[Message][username]":{
             required:"Please specify at least one recipient."
            }
//            "data[Message][subject]":{
//              required:"Please enter subject"  
//            }
        }
    });   
});    
 
    
    
</script>    
  

<style>
     .error{
         color:red
     }
</style> 
  