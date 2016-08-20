<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-body"> 

            <div class="col-md-12">

                <div class="col-md-12 text-center padding_top"> 
                    <?php if (!empty($users['User']['profile_image'])) { ?>

                        <img src="<?php echo IMGPATH . "InvestorProfile/" . $users['User']['profile_image']; ?>" class="img-rounded  " title="profile image" style='width:140px;'>

                    <?php } else { ?>

                        <img src="<?php echo IMGPATH."unknown.jpg"; ?>" class="img-rounded  " title="profile image">

                    <?php } ?>
                </div>

                <div class="col-md-12 text-center padding_top">  <?php echo $users['User']['first_name']." ".$users['User']['last_name']; ?> </div>
                <div class="col-md-12 text-center padding_top"> <?php echo $users['User']['city'] ." , ".$users['User']['state'] ?> </div> 
                <div class="col-md-12 text-center padding_top"> 
                    <span class="more">
                        <?php echo $users['InvestorDetail']['bio_about']; ?>
                    </span> 
                </div> 
<!--                <div class="col-md-12 text-center padding_top"><a href="#"><strong>Read More</strong></a></div>-->
            </div>

            <div class="col-md-12"><hr class="hr hr2"/></div>

            <div class="col-md-12">
                <div class="col-md-6 ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b>Bio/About</b><br/><span>There should also be a tab integrated with email for communication.There should also be a tab integrated with email for communication.</span></p>  
                    </div>
                </div>


                <div class="col-md-6 ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b> Other investments: </b><br/>
                        <ul class="">
                            <li>Home Ownership </li>
                            <li>Bonds & Fixed Income</li>
                            <li>Private Equity </li>
                        </ul>
                        </p>

                    </div>
                </div>
            </div>


            <div class="clearfix"></div><br>


            <div class="col-md-12 padding_top">

                <div class="col-md-6 p ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b>  Property types of interest:</b><br/>
                        <ul class="">
                            <li>Affordable Housing</li>
                            <li>Multi-Family </li>
                            <li>Residential</li>
                        </ul>
                        </p>

                    </div>

                </div>

                <div class="col-md-6 padding_top  ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b>  Investing Experience: 2 </b><br/>

                        </p>

                    </div>
                </div>
                <br>
                <br>

                <div class="col-md-6  ">
                    <div class="bor_der">
                        <p class="clearfix text-left"><b> Occupation:   Investments </b><br/>

                        </p>

                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>   