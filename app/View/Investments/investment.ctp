<div class="col-md-10">
    
  <?php foreach($investments as $investment){ //pr($investment); ?>  
    <div class="col-md-6 text-center mar">
        <div class="row">
            <div class="col-md-12 ">
                <div class="clearfix grey_bg">
                    <a class="project_img" href="<?php echo $this->html->url(array('controller' => 'investments', 'action' => 'invest_detail',$investment['BasicsDetail']['id'])) ?>">
                        <img src="<?php  echo IMGPATH."BasicDetail/".$investment['BasicsDetail']['image']; ?>" alt="" />
                    </a>

                    <h4 class="border_bottom"><?php echo $investment['BasicsDetail']['project_name']; ?> <br/><small><?php echo $investment['BasicsDetail']['address']; ?></small></h4>
                   
                    <h4>Fundraising Progress:</h4>
                    <div style="margin: auto; text-align: center; width: 70%;" title="">
                        <div style="text-align: left; margin: 2px auto; font-size: 0px; line-height: 0px; border: solid 1px #AAAAAA; background: #DDDDDD; overflow: hidden; border-radius: 10px;  ">                           
                            <div style="font-size: 0px; line-height: 0px; height: 15px; min-width: <?php echo $investment['BasicsDetail']['percentage_completed']; ?>%; max-width: <?php echo $investment['BasicsDetail']['percentage_completed']; ?>%; width: 48%; background: none repeat scroll 0px 0px rgb(29, 61, 141);"><!----></div>                            
                        </div>
                        <div style="font-size: 8pt; font-family: sans-serif; "><?php echo $investment['BasicsDetail']['percentage_completed']; ?>%</div>                           
                    </div>

                    <h5><p class="col-md-6 text-left"><b>Offering Size:</b></p> <p class="col-md-6 text-right">$<?php echo $investment['BasicsDetail']['offering_amount']; ?></p> </h5>
                    <h5><p class="col-md-6 text-left"><b>Projected Returns :</b></p> <p class="col-md-6 text-right"><?php echo $investment['BasicsDetail']['projected_return']; ?>%</p> </h5>
                    <h5><p class="col-md-6 text-left"><b>Price Per Share: </b></p> <p class="col-md-6 text-right">$<?php echo $investment['BasicsDetail']['price_per_share']; ?></p> </h5>

                    <h5><p class="col-md-6 text-left"><b>Term:</b></p> <p class="col-md-6 text-right"> <?php echo $investment['BasicsDetail']['holding_term']; ?></p> </h5>
                    <h5><p class="col-md-6 text-left"><b>Offering Type:</b></p> <p class="col-md-6 text-right"> <?php echo $investment['BasicsDetail']['offering_type']; ?></p> </h5>

                </div>
            </div>    
        </div>
    </div>
    
  <?php } ?>

    <div class="col-md-12"><hr class="hr"/></div>   
</div>
 <div class="pagination">
       <?php echo $this->element('paging_links');?>
   </div>

