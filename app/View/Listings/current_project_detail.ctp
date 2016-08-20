<?php echo $this->Html->script('readmore.js'); ?>

<style>
.morecontent span {
    display: none;
}
.morelink {
    display: block;
}    
</style> 

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

<!--form-->
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Project Details</div>
        <div class="panel-body"> 
            <p class="clearfix"><b class="col-lg-3">Project Name</b><span class="col-lg-9"><?php echo $projectDetail['BasicsDetail']['project_name']; ?></span></p>
<!--            <p class="clearfix"><b class="col-lg-3">Target</b><span class="col-lg-9"><?php //echo $projectDetail['BasicsDetail']['target_returns']; ?></span></p>-->
            <p class="clearfix"><b class="col-lg-3">Image</b><span class="col-lg-9">
              <?php if($projectDetail['BasicsDetail']['image']) {?>       
               <img src="<?php echo IMGPATH."BasicDetail/".$projectDetail['BasicsDetail']['image'] ?>" class="img-rounded img-responsive pull-left ml" title="profile image" style="width:140px;">
              <?php } ?>
<!--                    <img src="http://www.rlsandbox.com/img/profile.jpg" class="img-rounded img-responsive pull-left ml" title="profile image">
                    <img src="http://www.rlsandbox.com/img/profile.jpg" class="img-rounded img-responsive pull-left ml" title="profile image">
                    <img src="http://www.rlsandbox.com/img/profile.jpg" class="img-rounded img-responsive pull-left ml" title="profile image">-->

                </span></p>
            <p class="clearfix"><b class="col-lg-3">Address</b><span class="col-lg-9"><?php echo $projectDetail['BasicsDetail']['address']; ?></span></p>
            <p class="clearfix"><b class="col-lg-3">Project Return</b><span class="col-lg-9"><?php echo $projectDetail['BasicsDetail']['projected_return']; ?></span></p>
            <p class="clearfix"><b class="col-lg-3">Price Per Share</b><span class="col-lg-9"><?php echo $projectDetail['BasicsDetail']['price_per_share']; ?></span></p>  
            <p class="clearfix"><b class="col-lg-3">Description</b><span class="more"><?php echo $projectDetail['BasicsDetail']['description']; ?> <br/></span></p>  
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Project Summary</div>
        <div class="panel-body"> 
            <p class="clearfix col-md-6"><b class="col-lg-6">Acquisition Price</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['acquistion_price']; ?> </span></p>
            <p class="clearfix col-md-6"><b class="col-lg-6">Offering Size</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['offering_size']; ?></span></p>
            <p class="clearfix col-md-6"><b class="col-lg-6">Number of Shares</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['no_of_shares']; ?></span></p>
       
            <p class="clearfix col-md-6"><b class="col-lg-6">Offering Type</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['offering_type']; ?></span></p>
            <p class="clearfix col-md-6"><b class="col-lg-6">Holding Term</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['holding_term']; ?></span></p>
<!--            <p class="clearfix col-md-6"><b class="col-lg-6">Project Returns</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['project_returns']; ?></span></p>  
            <p class="clearfix col-md-6"><b class="col-lg-6">Capital Structure</b><span class="col-lg-6"><?php echo $projectDetail['BasicsDetail']['capital_structure']; ?></span></p>  -->
<!--            <p class="clearfix col-md-6"><b class="col-lg-6">Equity</b><span class="col-lg-6"><?php //echo $projectDetail['BasicsDetail']['capital_structure']; ?></span></p>  -->
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Listing Partner</div>
        <div class="panel-body">  
            <?php foreach($ListingPartners as $partner){ ?>
            <p class="clearfix col-md-6"><b class="col-lg-9"><?php echo $partner['ListingPartnerContent']['contents']; ?></b>
                <span class="col-lg-3"><?php
                
                if($partner['ListingPartnerContent']['contents'] == "Company Bio"){
//                     echo $this->html->link('PDF', '/listings/download/'.$listingDetail['ListingDetail']['upload_bio']."/ListingPartnerPortfolio", array('escape'=>false, 
//                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;')); 
                      echo $this->html->link('PDF', '/listings/download/'.$listingDetail['ListingDetail']['upload_bio']."/ListingPartnerPortfolio", array('escape'=>false, 
                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                }else if($partner['ListingPartnerContent']['contents'] == "Portfolio"){
                     echo $this->html->link('PDF', '/listings/download/'.$listingDetail['ListingDetail']['portfolio']."/ListingPartnerPortfolio", array('escape'=>false, 
                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;')); 
                     
                }else if($partner['ListingPartnerContent']['contents'] == "Executive Bio's"){
                   echo $this->html->link('PDF', '/listings/download/'.$listingDetail['ListingDetail']['executive_summary']."/ListingPartnerPortfolio", array('escape'=>false, 
                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));  
                   
                }else if($partner['ListingPartnerContent']['contents'] == "Due Diligence Summary"){
                     echo $this->html->link('PDF', '/listings/download/'.$listingDetail['ListingDetail']['team_leadership']."/ListingPartnerPortfolio", array('escape'=>false, 
                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));  
                     
                }else {
                
                    if(!empty($partner['ListingPartner']['content_value'])){ 
                       echo $this->html->link('PDF', '/listings/download/'.$partner['ListingPartner']['content_value']."/ListingPartner", array('escape'=>false, 
                         'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                    }
                
                }
                ?> </span></p>
            <?php } ?>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Documents</div>
        <div class="panel-body"> 
          <?php foreach($Documents as $doc){ ?> 
            <p class="clearfix col-md-6"><b class="col-lg-9"><?php echo $doc['DocumentContent']['contents'] ?></b>
                <span class="col-lg-3"> <?php
                if(!empty($doc['Document']['content_value'])){
                   echo $this->html->link('PDF', '/listings/download/'.$doc['Document']['content_value']."/Document", array('escape'=>false, 
                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                }
                ?> </span>
            </p>
            <?php } ?>
        </div>
    </div>
    <div align="center">
        <a class="add_another btn btn-primary pull-center" href="<?php echo $this->Html->url(array('controller' =>'listings','action' =>'listing_invest_detail',$projectDetail['BasicsDetail']['project_id'])); ?>">See Full Listing</a>
    </div>
</div>
<!--form-->