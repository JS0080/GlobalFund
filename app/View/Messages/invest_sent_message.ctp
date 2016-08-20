
<div id="viewDetail"> 

    <ul class="list-unstyled list-inline">      
        <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal11">
                Compose
            </button></li>

        <li><a onclick="investViewInbox();" href="javascript:void(0)"><button type="button" class="btn btn-primary">Inbox</button></a></li>
        <li><a onclick="investSentMessage();" href="javascript:void(0)">
                <button type="button" class="btn btn-primary">Sent Mail</button></a></li>    
    
    </ul>


    <table class="table" style="margin-top:20px;">
        <thead>
            <tr style="font-size:20px; width:100%;">
                <th style="width:30%;">To</th>
                <th style="width:55%;">Subject</th>
                <th style="width:15%;">Date</th>
                <th style="width:15%;">Action</th>
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
                        <a onclick="invest_sent_view_message(<?php echo $message['Message']['id']; ?>);" href="javascript:void(0)">
                        <?php echo $message['Receiver']['first_name'] . " " . $message['Receiver']['last_name'] ?> 
                        </a> 
                    </td>
                    
                    
                    <td class="<?php echo $class; ?>">
                        <a  onclick="invest_sent_view_message(<?php echo $message['Message']['id']; ?>);" href="javascript:void(0)">
                         <?php echo $message['Message']['subject'] ?> </a>
                    </td>

                    <td class="<?php echo $class; ?>">
                        <a  onclick="invest_sent_view_message(<?php echo $message['Message']['id']; ?>);" href="javascript:void(0)">
                          <?php echo date('M j Y', strtotime($message['Message']['created'])); ?></a>
                    </td> 

                    <td class="<?php echo $class; ?>">   
                        <?php
                        echo $this->Html->link($this->Html->image('trash.png', array(
                                    'alt' => 'Delete list', 'class' => 'delete_btn')
                                ), array(
                            'controller' => 'messages',
                            'action' => 'invest_message_delete',
                            $message['MessageUser']['id']
                                ), array(
                            'title' => 'delete',
                            'escape' => false,
                            'confirm' => 'Are you sure you want to delete message?'
                        ));
                        ?> </td>  
                </tr>
<?php } ?>                   
        </tbody>
    </table>
</div>


<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><h3>New Message</h3></h4>
            </div>
            <div class="modal-body clearfix">

                <?php echo $this->Form->create('Message', array('controller' => 'messages', 'action' => 'invest_send_message', 'class' => 'form-horizontal','id' =>'invest_compose')); ?>

                <form class="form-horizontal ">

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
     $('#invest_compose').validate({
        rules:{
            "data[Message][username]":{
                required:true,
             //   number:true
            },

            "data[Message][subject]":{
               required:true  
            }
        },

        messages:{
            "data[Message][username]":{
             required:"Please enter username."
            },

            "data[Message][subject]":{
              required:"Please enter subject"  
            }
        }
    });   
});    
    
    
</script>    
  