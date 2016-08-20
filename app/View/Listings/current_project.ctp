<div class="col-md-10">
    
    <?php foreach($projects as $project) { ?>
    
    <div class="col-md-6 text-center mar">
        <div class="row">
            <div class="col-md-12 ">
                <div class="clearfix grey_bg">
                    <a class="project_img" href="<?php echo $this->Html->url(array('controller' =>'listings','action' =>'current_project_detail',$project['BasicsDetail']['project_id'])); ?>"><img src="<?php echo IMGPATH."BasicDetail/".$project['BasicsDetail']['image'] ?>" alt="" /></a>
                    <h4 class="border_bottom"><?php echo $project['BasicsDetail']['project_name']; ?><br/><small><?php echo $project['BasicsDetail']['address']; ?></small></h4>
                    <h4>Fundraising Progress:</h4>
                    <div style="margin: auto; text-align: center; width: 70%;" title="48%"><div style="text-align: left; margin: 2px auto; font-size: 0px; line-height: 0px; border: solid 1px #AAAAAA; background: #DDDDDD; overflow: hidden; border-radius: 10px;  ">
                        <div style="font-size: 0px; line-height: 0px; height: 15px; min-width: 0%; max-width: <?php echo $project['BasicsDetail']['percentage_completed']; ?>%; width: 48%; background: none repeat scroll 0px 0px rgb(29, 61, 141);"><!----></div></div>
                        <div style="font-size: 8pt; font-family: sans-serif; "><?php echo $project['BasicsDetail']['percentage_completed']; ?>%</div></div>
                    <h5><p class="col-md-6 text-left"><b>Projected Returns*:</b></p><p class="col-md-6 text-right"> <?php echo $project['BasicsDetail']['projected_return']; ?>% Annualized</p> </h5>
                    <h5><p class="col-md-6 text-left"><b>Total Offering:</b></p><p class="col-md-6 text-right">$<?php echo $project['BasicsDetail']['offering_size']; ?> </p></h5>
                    <h5><p class="col-md-6 text-left"><b>Per Share: </b></p><p class="col-md-6 text-right">$<?php echo $project['BasicsDetail']['price_per_share']; ?> </p></h5>
                    <h5><p class="col-md-6 text-left"><b>Term: </b></p><p class="col-md-6 text-right"><?php echo $project['BasicsDetail']['holding_term']; ?> </p></h5>
                    <h5><p class="col-md-6 text-left"><b>Offering Type: </b></p><p class="col-md-6 text-right"><?php echo $project['BasicsDetail']['offering_type']; ?></b></h5>
                </div>


            </div>    
        </div>
    </div>
    <?php } ?>  

</div> 