

<div class="col-md-10">
    <?php foreach($listings as $listing) { ?>
    <div class="col-md-6 text-center mar">
        <div class="row">
            <div class="col-md-12 ">
                <div class="clearfix grey_bg">
                   <?php if(!empty($listing['ListingDetail']['id'])) {?>
                    
                      <a class="project_img" href="<?php echo $this->Html->url(array('controller' =>'investments' ,'action' =>'listing_partner_detail',$listing['User']['id'])); ?>">
                        <img src="<?php echo IMGPATH."ListingPartnerProfile/".$listing['User']['profile_image']; ?>" class="img-rounded  " title="profile image" style='width:420px; height:314px;'>
                    </a>

                    <?php }else{ ?>
                      <img src="http://www.rlsandbox.com/img/profile.jpg" class="img-rounded  " title="profile image">
                    <?php } ?>

                    <h4 class="border_bottom"><?php echo $listing['ListingDetail']['company_name'] ?><br/><small><?php echo $listing['User']['city'] ?> ,<?php echo $listing['User']['state'] ?></small></h4>
                    <h4>Bio/About</h4>
                    <p style="padding:10px; text-align:justify;"> <?php echo $listing['ListingDetail']['about_bio'] ?></p>	

                </div>
            </div>    
        </div>
    </div>
    <?php } ?>


    <div class="col-md-12"><hr class="hr"/></div>
</div>