<?php echo $this->Html->script('readmore.js'); ?>

<script src="http://code.highcharts.com/highcharts.js"></script>

<script>
 $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 150; // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>  

<style>
.morecontent span {
    display: none;
}
.morelink {
    display: block;
}    
</style>    

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-body"> 

            <div class="col-md-12">
                <div class="col-md-12 text-center padding_top"> 
                      <?php if(!empty($users['User']['profile_image'])) { ?>
                    
                          <img src="<?php echo IMGPATH."InvestorProfile/".$users['User']['profile_image']; ?>" class="img-rounded  " title="profile image" style='width:140px;'>
                     
                      <?php } else { ?>
                
                          <img src="<?php echo IMGPATH."unknown.jpg"; ?>" class="img-rounded  " title="profile image">
                   
                     <?php } ?>
                
                </div>

                <div class="col-md-12 text-center padding_top">  <?php echo $users['User']['first_name']." ".$users['User']['last_name']; ?></div>
                <div class="col-md-12 text-center padding_top"> <?php echo $users['User']['city'] ." , ".$users['User']['state'] ?> </div> 
                <div class="col-md-12 text-center padding_top">
                    <span class="more">
                        <?php echo $users['InvestorDetail']['bio_about']; ?>
                    </span>
                </div>
            </div>  

            <div class="col-md-12">  
                <ul class="nav nav-tabs back-gg" role="tablist">
                    <li role="presentation" class="active" id="pro"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">PROFILE</a></li>

                    <li role="presentation" id="invest"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">INVESTMENT ACTIVITY</a></li>
                    <li role="presentation" id="msg"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">MESSAGE</a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">     

                    <!--START  Tab For Profile Detail -->   
                    
                    <div role="tabpanel" class="tab-pane active" id="profile"> 
                        <div class="panel-body"> 

                            <div class="col-md-12">
                                <div class="col-md-6 ">
                                    <div class="bor_der bor_der1">
                                        <p class="clearfix text-left"><b> Other investments: </b><br/>
                                        <ul class="">
                                            <?php
                                            if (!empty($users['InvestorDetail']['other_investments'])) {
                                                $otherInvestments = explode(",", $users['InvestorDetail']['other_investments']);
                                                foreach ($otherInvestments as $key => $investments) {
                                                    ?>
                                                    <li><?php echo $investments; ?></li>

                                                <?php }
                                            }
                                            ?>
                                        </ul>
                                        </p> 
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="bor_der bor_der1">
                                        <p class="clearfix text-left"><b>  Property types of interest:</b><br/>
                                        <ul class="">
                                            <?php
                                            if (!empty($users['InvestorDetail']['property_interest'])) {
                                                $propertyInvestments = explode(",", $users['InvestorDetail']['property_interest']);
                                                foreach ($propertyInvestments as $key => $investments) {
                                                    ?>
                                                    <li><?php echo $investments; ?></li>

                                                <?php }
                                            }
                                            ?>
                                        </ul>
                                        </p>
                                    </div>
                                </div>


                                <div class="clearfix"></div><br>


                                <div class="col-md padding_top">

                                    <div class="col-md-6 p ">
                                        <div class="bor_der bor_der1">
                                            <p class="clearfix text-left"><b>  Investing Experience:  <?php echo $users['User']['experience']; ?>  </b><br/>

                                            </p>

                                        </div>
                                        
                                        </b><br/>
                                        <div class="bor_der bor_der1">
                                            <p class="clearfix text-left"><b> Occupation:<?php echo $users['InvestorDetail']['occupation']; ?> </b><br/>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END  Tab For Profile Detail -->  


                    <!--START  Tab For Investment Activity -->  

                    <div role="tabpanel" class="tab-pane " id="home">   
                        <div class="row">
                            <div class="col-md-3" >
                                <div class="bor_der investment-activity clearfix" style="height:130px;">
                                    <p class="clearfix"><strong class="pull-left">Total Invested Projects <br/></strong>  <button type="button" class="btn btn-primary btn-xs btn1 pull-right">Annual</button></p> 
                                    <h3><?php echo $annualTotalNumProject; ?> <div class="pull-right"><strong><small class="blue"></small></strong></span></div></h3>

                                </div>
                            </div>
                                                       
                            <div class="col-md-3">
                                <div class="bor_der investment-activity clearfix">
                                    <p class="clearfix"><strong class="pull-left">Total Funds Invested <br/></strong>  <button type="button" class="btn btn-primary green btn-xs btn1 pull-right">Annual</button></p> 
                                    <h3>$<?php echo number_format($annualTotalFundInvested, 2, '.', ','); ?> <div class="pull-right"><strong><small class="green"></small></strong></span></div></h3>

                                </div>
                            </div>
                            
                            
                            <div class="col-md-3">
                                <div class="bor_der investment-activity clearfix">
                                    <p class="clearfix"><strong class="pull-left">Projected Investment Income<br/></strong>  <button type="button" class="btn btn-primary green_dark btn-xs pull-right">Annual</button></p> 
                                    <h3>$<?php echo number_format($projectReturn, 2, '.', ','); ?> <div class="pull-right"><strong><small class="green_dark"></small></strong></span></div></h3>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="bor_der investment-activity clearfix">
                                    <p class="clearfix"><strong class="pull-left btn2">Average Investment Returns <br/></strong> </p> 
                                    <h3 class="text-center"><?php echo $totalPlatformReturn; ?>%</h3>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <BR>

                            <div class="col-md-12">
                                
                                <div id="container"> </div>

                                
<!--                                <iframe width="100%" height="510px" style="border:1px solid #eee;" src="<?php //echo IMGPATH."grap/grap.htm"; ?>"></iframe>-->
                            </div>

                        </div>

                        <br/>
                    </div>

                    <!--END  Tab For Investment Activity -->    


                    <!--START  Tab For Messages -->       
                    <div role="tabpanel" class="tab-pane" id="messages"> 
                        <div class="panel-body" id="viewDetail"> 
                            
                            <span id="loader_view" class="loader" style="display: none; text-align: center;">
                                <img src="<?php echo IMGPATH . "loader6.gif" ?>" alt="">
                            </span>
                         
                            <ul class="list-unstyled list-inline">
                                <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal11">
                                    Compose
                                  </button></li>  
                                  
                                <li><button type="button" onclick="investViewInbox();"  class="btn btn-primary">Inbox</button></li>
                                <li><button type="button" onclick="investSentMessage();"  class="btn btn-danger" >
                                        Sent Mail
                                    </button></li>
                            </ul>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Action</th>
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
                                            <tr id="msg_<?php echo $message['MessageUser']['id'];  ?>">
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

                                                        <a  onclick="investDeleteMessage(<?php echo $message['MessageUser']['id']; ?>);" href="javascript:void(0)">
                                                            <img src="<?php echo IMGPATH . "trash.png" ?>">
                                                        </a> 
                                                 </td> 
                                            </tr>
                                        <?php } ?>  
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--END Tab For Messages --> 
                </div>
            </div>
        </div>      
      </div>          
    </div>
<!--</div>   -->


<script>  
    
    $( document ).ready(function() {
       $('#container').highcharts({
           chart: {
               type: 'areaspline'
           },
           title: {
               text: 'Annual Project Invested Income'
           },
   //        subtitle: {
   //            text: 'Source: WorldClimate.com'
   //        },
           xAxis: [{
               categories: [<?php echo $project_name; ?>],
               crosshair: true
           }],
           yAxis: [{ // Primary yAxis
               labels: {
                   format: '{value}$',
                   style: {
                       color: Highcharts.getOptions().colors[1]
                   }
               },
               title: {
                   text: 'Projected Return',
                   style: {
                       color: Highcharts.getOptions().colors[1]
                   }
               },
           tooltip: {
               shared: true,
               valueSuffix: ' units'
           },
           plotOptions: {
               areaspline: {
                   fillOpacity: 0.2
               }
             }
           }, { // Secondary yAxis
               title: {
                   text: 'Investment Amount',
                   style: {
                       color: Highcharts.getOptions().colors[0]
                   }
               },
               labels: {
                   format: '{value} $',
                   style: {
                       color: Highcharts.getOptions().colors[0]
                   }
               },
               opposite: true
           }],
           tooltip: {
               shared: true
           },
   //        legend: {
   //            layout: 'vertical',
   //            align: 'left',
   //            x: 120,
   //            verticalAlign: 'top',
   //            y: 100,
   //            floating: true,
   //            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
   //        },
           series: [{
               name: 'Investment Amount',
               type: 'column',
               yAxis: 1,
               data: [<?php echo $project; ?>],
               tooltip: {
                   valueSuffix: ' Dollar'
               }

           }, {
               name: 'Projected Return',
               data:[<?php echo $projectReturnGraph; ?>]
           }]
       });
   });   


  function investSendMessage(){

    var username = $('#username').val();
    
    var subject = $('#subject').val();  
   
    if(username ==''){
        
      $('#username_error').css('display','block');  
      
     } else if(subject ==''){
  
      $('#subject_error').css('display','block'); 
      
    }else{
        
      $('#username_error').css('display','none');
      $('#subject_error').css('display','none'); 
      
      var form_data=$('#invest_compose').serialize();   
      
       $.ajax({
            type: "POST",
            url: '<?php echo SITEPATH ?>'+"messages/invest_send_message",
            data: form_data,
           
            success: function(data){
             
                if(data==1)
                {
                  $('#invest_compose')[0].reset();  
                  $('#myModal11').hide();
                }    
                else
                {
                   $('#loader_view').css('display','none');
                   
                }
            }
        });   
        
    }
 }
 
  
  
  function investViewMessage(MID){
     if(MID)  {
        $.ajax({
            type: "POST",
            url: '<?php echo SITEPATH ?>'+"messages/invest_view_message",
         //   data: form_data,
            data        :{'message_id':MID},
            beforeSend: function(){
                     $('#loader_view').css('display','inline-block');
                  },
            success: function(data){
              
                if(data)
                {
                   $('#loader_view').css('display','none');
                   $('#viewDetail').replaceWith(data); 
                }    
                else
                {
                    $('#loader_view').css('display','none');
                   
                }
            }
        });        
     }   
  }
  
  
  
  // code for reply the message
    function replyInvestMessage(MID){
       var form_data=$('#reply_invest').serialize(); 
        $.ajax({
            type: "POST",
            url: '<?php echo SITEPATH ?>'+"messages/invest_send_message",
            data: form_data,
            //data        :{'patient_id':patientID},
            beforeSend: function(){
                     $('#loader_view').css('display','inline-block');
                  },
            success: function(data){
              
                if(data==1)
                {
                   $('#loader_view').css('display','none');
                   
                }    
                else
                {
                    $('#loader_view').css('display','none');
                   
                }
            }
        });   
  }
  
  // code to redirct  inbox
  
  function investViewInbox(){
    $.ajax({
         type: "POST",
         url: '<?php echo SITEPATH ?>'+"messages/invest_view_inbox",
        // data: form_data,
         //data        :{'patient_id':patientID},
         beforeSend: function(){
                  $('#loader_view').css('display','inline-block');
               },
         success: function(data){         
             if(data)
             {
                $('#loader_view').css('display','none');
                $('#viewDetail').replaceWith(data);
             }    
             else
             {
                $('#loader_view').css('display','none');

             }
         }
     });   
  }
  
  
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
  
  
  // code for view invest sent message
  
   function investSentMessage(){
       $.ajax({
            type: "POST",
            url: '<?php echo SITEPATH ?>'+"messages/invest_sent_message",
           // data: form_data,
            //data        :{'patient_id':patientID},
            beforeSend: function(){
                     $('#loader_view').css('display','inline-block');
                  },
            success: function(data){
              
                if(data)
                {
                   $('#loader_view').css('display','none');
                   $('#viewDetail').replaceWith(data);
                }    
                else
                {
                    $('#loader_view').css('display','none');
                   
                }
            }
        });   
  }
  
  
  
// code for invest set view message

function invest_sent_view_message(MID){
   if(MID){
        $.ajax({
          type: "POST",
          url: '<?php echo SITEPATH ?>'+"messages/invest_sent_view_message",
         // data: form_data,
          data        :{'message_id':MID},
          beforeSend: function(){
                   $('#loader_view').css('display','inline-block');
                },
          success: function(data){

              if(data)
              {
                 $('#loader_view').css('display','none');
                 $('#viewDetail').replaceWith(data);
              }    
              else
              {
                  $('#loader_view').css('display','none');

              }
          }
      });
   }
}


function investDeleteMessage(MID){
  if(MID){
    $.ajax({
        type: "POST",
        url: '<?php echo SITEPATH ?>'+"messages/invest_message_delete",
       // data: form_data,
        data        :{'message_id':MID},
        beforeSend: function(){
                 $('#loader_view').css('display','inline-block');
              },
        success: function(data){
           // alert('#msg_'+MID); return false;
            if(data==1)
            {
               $('#loader_view').css('display','none');
                $('#msg_'+MID).closest( 'tr').remove();
              //  $('#msg_'+MID).remove();
            }    
            else
            {
                $('#loader_view').css('display','none');

            }
        }
    });   
  }
}
  
</script>


<!--START MODAL  FOR SEND MESSAGE-->

<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><h3>New Message</h3></h4>
            </div>
            <div class="modal-body clearfix">
            
                <?php echo $this->Form->create('Message', array('controller' => 'messages', 'action' => 'invest_send_message', 'class' => 'form-horizontal','id' =>'invest_compose')); ?>

                    <div class="form-group">               
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="username" name="data[Message][username]" placeholder="To"  onkeyup="autocomplet(this.value)">
                              <label for="username" id="username_error" style="color:red; display:none;">Please specify at least one recipient.</label>                           
                        </div>                     
                        <div class="tagsearch" id="tag_list_id" style="display:none;max-height:250px;"></div>   
                    </div>
                    

                    <div class="form-group">               
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="subject" name="data[Message][subject]" placeholder="Subject">
                            <label for="subject" id="subject_error" style="color:red; display:none;">Please enter subject.</label>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control"  name="data[Message][message]" rows="10" id="messages"> </textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="investSendMessage();">Send</button>
                    </div>                 
            </div>
        </div>
    </div>
</div>

<!-- END  MODAL  FOR SEND MESSAGE -->

