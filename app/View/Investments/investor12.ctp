<?php echo $this->Html->script('readmore.js'); ?>

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
                     
                      <?php }else{ ?>
                
                          <img src="http://www.rlsandbox.com/img/profile.jpg" class="img-rounded  " title="profile image">
                   
                     <?php } ?>
                
                </div>

                <div class="col-md-12 text-center padding_top">  <?php echo $users['User']['first_name']." ".$users['User']['last_name']; ?></div>
                <div class="col-md-12 text-center padding_top"> <?php echo $users['User']['city'] ." , ".$users['User']['state'] ?> </div> 
                <div class="col-md-12 text-center padding_top">
                    <span class="more">
                        <?php echo $users['InvestorDetail']['bio_about']; ?>
                    </span>
                </div>
<!--                <div class="col-md-12 text-center padding_top"><a href="#"><strong>Read More</strong></a></div>-->
            </div>  

            
            
            
           
                <div class="col-md-12">
                    <ul class="nav nav-pills" >
                        
                        <li role="presentation" class="active"><a href="<?php echo $this->html->url(array('controller' => 'investments', 'action' => 'invest_activity')) ?>" class="active btn btn-default  invest">Investment Activity</a></a></li>
                        
                   <li role="presentation"> <a href="<?php  echo $this->html->url(array('controller' => 'messages', 'action' => 'invest_message_list')) ?>" class="active btn btn-default invest">Message</a></li>
                   
                    </ul>
                </div>
            <div class="col-md-12"><hr class="hr hr2"/></div>

            <div class="col-md-12">
<!--                <div class="col-md-6 ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b>Bio/About</b><br/><span ><?php echo substr($users['InvestorDetail']['bio_about'] ,0,100); ?>.</span></p>  
                    </div>
                </div>-->

                <div class="col-md-6 ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b> Other investments: </b><br/>
                        <ul class="">
                            <?php if(!empty($users['InvestorDetail']['other_investments'])){ 
                                $otherInvestments = explode(",",$users['InvestorDetail']['other_investments']);
                             foreach($otherInvestments as $key =>$investments){ 
                            ?>
                            <li><?php echo $investments; ?></li>
                            
                             <?php }
                            }?>
                        </ul>
                        </p>
                    </div>
                </div>
                
                
                <div class="col-md-6 p ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b>  Property types of interest:</b><br/>
                       
                         <ul class="">
                            <?php if(!empty($users['InvestorDetail']['property_interest'])){ 
                                $propertyInvestments = explode(",",$users['InvestorDetail']['property_interest']);
                             foreach($propertyInvestments as $key =>$investments){ 
                            ?>
                            <li><?php echo $investments; ?></li>
                            
                             <?php }
                            }?>
                        </ul>
                      </p>

                    </div>
                </div>
                
                
            </div>


            <div class="clearfix"></div><br>


            <div class="col-md-12 padding_top">

                
             
                
                <div class="col-md-6 padding_top  ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b>  Investing Experience: <?php echo $users['User']['experience']; ?> </b><br/>

                        </p>
                    </div>
                
                <br>
                <br>

                
                    <div class="bor_der">
                        <p class="clearfix text-left"><b> Occupation:  <?php echo $users['InvestorDetail']['occupation']; ?></b><br/>

                        </p>
                    </div>
                </div>
                
           </div>
        </div>      
      </div>          
    </div>
</div>   