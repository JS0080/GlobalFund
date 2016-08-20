
<style>
.button4 {
    background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #428bca, #428bca) repeat scroll 0 0;
    border: 1px solid #999;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-family: Arial,Helvetica,sans-serif,"Cambria (TT)";
    font-size: 16px;
    font-weight: bold;
    padding: 4px 10px;
    text-decoration: none;
}
</style>

  <div class="col-md-12">
      <div class="portlet box green">
        <div class="portlet-title" style="border-bottom:none;">
            <div class="caption">
                <i class="fa fa-reorder"></i>Inbox
            </div>
        </div>
       </div>   
          
        <div class="table-scrollable" style="margin-top:30px; background-color: white;">
            <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
            <?php echo $this->Form->create('Message', array('controller' => 'messages', 'action' => 'admin_send_message', 'class' => 'form-horizontal', 'type' => 'file')); ?>

            <div class="form-group">               
                <div class="col-md-12">
                    <input type="text" class="form-control" id="username" name="data[Message][username]" placeholder="To" onkeyup="autocomplet(this.value)">
                </div>
                <div class="tagsearch" id="tag_list_id" style="display:none;max-height:250px;"></div>                   
            </div>

            <!--  <div class="form-group">               
                    <div class="col-md-12">
                        <input type="file" class="" id="file_upload" name="data[Message][file]">
                    </div>

                    <div class="upload-wrap">
                       <input id="file_upload" type="file" name="file_upload" />
                    </div>
                 </div>
            -->
            
            <div class="form-group">               
                <div class="col-md-12">
                    <input type="text" class="form-control" id="inputEmail3" name="data[Message][subject]" placeholder="Subject" >
                </div>
            </div>      

            <div class="form-group">
                <div class="col-md-12">
                    <textarea class="form-control"  name="data[Message][message]" rows="10"> </textarea>    
                </div>
            </div>

            <div class="modal-footer">                       
                <!--   <div class="form-group">
                         <div class="col-md-12">-->
                <input id="upfile1" style="margin-top:10px;cursor:pointer;" type="button" name="submit1" value="Attach Document" class="button4" /> 

                <input type="file" id="images"  name="data[Message][file]" style="display:none" />
                
                <script>
                    $("#upfile1").click(function () {
                        $("#images").trigger('click');
                    }); 
                </script> 
                <!--   </div>
                    </div>-->                     
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>

            <?php echo $this->Form->end(); ?>
        </div>                    
  </div>

<?php echo $this->html->script('jquery.js');
   echo $this->html->script('jquery.validate.min.js'); ?>

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
    
