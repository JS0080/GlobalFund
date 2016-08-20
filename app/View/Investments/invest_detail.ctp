<?php echo $this->Html->script('readmore.js'); ?>


<!-- Add jQuery library -->
<?php echo $this->Html->script('jquery-1.10.1.min.js'); ?>

<?php echo $this->Html->script('jquery.mousewheel-3.0.6.pack.js'); ?>

<?php echo $this->Html->script('jquery.fancybox.js'); ?>

<?php echo $this->Html->css('jquery.fancybox.css'); ?>

<?php echo $this->Html->script('highcharts.js'); ?>
<?php echo $this->Html->script('exporting.js'); ?>



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
    <div class="col-md-12 text-center ">
      
        <img src="<?php  echo IMGPATH."BasicDetail/".$projects['BasicsDetail']['image']; ?>" alt="" style="width:750px; height:560px;"/>
                
        <h3><?php echo $projects['BasicsDetail']['project_name']; ?></h3>
        
        <h4><?php echo $projects['BasicsDetail']['address']; ?></h4>

        <p>  Offering Size: $<?php echo $projects['BasicsDetail']['offering_amount']; ?></p>

        <p> Projected Returns :<?php echo $projects['BasicsDetail']['projected_return']; ?>%</p>
        
        <p> Price Per Share:      $<?php echo $projects['BasicsDetail']['price_per_share']; ?></p>

        <p> Term:   <?php echo $projects['BasicsDetail']['holding_term']; ?></p>

        <p> Offering Type:  <?php echo $projects['BasicsDetail']['offering_type']; ?></p>


        <!-- <h3>SAMPLE: The SQUARE</h3>
         <h4>11 John Street, Brooklyn, New York</h4>
         <h4>Target: 6 Million | Proj. Return: 28.40%</h4>
         <h4>Y Corp. | $6,000 per/share</h4>-->
        
            <div class="col-md-12 text-center padding_top">
                 <span class="more">
                     <?php echo $projects['BasicsDetail']['description']; ?>
                 </span>
             </div>
    </div>
    
    <div class="col-md-12"><hr class="hr"/></div>
    
    <div class="col-md-12 text-center">
        <h4>Fundraising Progress:</h4>
        <div title="48%" style="margin: auto; text-align: center; width: 40%;">
            <div style="text-align: left; margin: 2px auto; font-size: 0px; line-height: 0px; border: solid 1px #AAAAAA; background: #DDDDDD; overflow: hidden; ">
                <div style="font-size: 0px; line-height: 0px; height: 15px; min-width: <?php echo $projects['BasicsDetail']['percentage_completed']; ?>%; max-width: <?php echo $projects['BasicsDetail']['percentage_completed']; ?>%; width: 48%; background: none repeat scroll 0px 0px rgb(29, 61, 141);"><!----></div></div><div style="font-size: 8pt; font-family: sans-serif; "><?php echo $projects['BasicsDetail']['percentage_completed']; ?>%</div></div>
    </div>
    
    <div class="col-md-12"><hr class="hr"/></div>
    
    <div class="col-md-6">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            + PROJECT SUMMARY:
                        </a>
                    </h4>
                </div>
                
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p> Acquisition Price: $<?php echo $projects['BasicsDetail']['acquistion_price']; ?></p>

                        <p> Offering Size: $<?php echo $projects['BasicsDetail']['offering_size']; ?> | Number of Shares: <?php echo $projects['BasicsDetail']['no_of_shares']; ?></p>

                        <p> Price Per Share: $<?php echo $projects['BasicsDetail']['price_per_share']; ?> | Projected Returns : <?php echo $projects['BasicsDetail']['projected_return']; ?> %</p>

                        <p> Offering Type: <?php echo $projects['BasicsDetail']['offering_type']; ?></p>

                        <p> Holding Term: <?php echo $projects['BasicsDetail']['holding_term']; ?></p>

<!--                        <p>Capital Structure: Debt <?php //echo $capitalStructures['CapitalStructure']['content_value']; ?>% Equity 43%</p>-->
                    </div>
                </div>
            </div>
            
            
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            + LISTING PARTNER:
                        </a>
                        <a class=" btn btn-default invest  pull-right  " href="<?php echo $this->Html->url(array('controller' =>'investments','action' =>'listing_partner_detail',$projects['BasicsDetail']['user_id'])); ?>" style="padding:2px 8px; background-color:#FFFFFF; border:#245d8f solid 1px; text-transform: capitalize; color:#677bb1; font-size:12px; ">View Profile</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul>
                            <?php 
                            if(!empty($projects['ListingDetail'])){ ?>
                           
                           <?php
                              if(!empty($projects['ListingDetail']['upload_bio'])){  ?>
                                 <li> <?php echo $this->html->link($projects['ListingDetail']['upload_bio'], '/investments/download/'.$projects['ListingDetail']['upload_bio']."/ListingPartnerPortfolio", array('escape'=>false, 
                                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;')); ?>  </li>
                              
                                  <?php }  ?>
                                
                              <?php if(!empty($projects['ListingDetail']['portfolio'])){  ?>
                                 <li> <?php echo $this->html->link($projects['ListingDetail']['portfolio'], '/investments/download/'.$projects['ListingDetail']['portfolio']."/ListingPartnerPortfolio", array('escape'=>false, 
                                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;')); ?>  </li>
                              
                                  <?php }  ?>
                                 
                                  <?php if(!empty($projects['ListingDetail']['executive_summary'])){  ?>
                                     <li> <?php  echo $this->html->link($projects['ListingDetail']['executive_summary'], '/investments/download/'.$projects['ListingDetail']['executive_summary']."/ListingPartnerPortfolio", array('escape'=>false, 
                                          'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;')); ?>  </li>
                              
                                  <?php }  ?>
                                 
                                  <?php if(!empty($projects['ListingDetail']['team_leadership'])){  ?>
                                 <li> <?php echo $this->html->link($projects['ListingDetail']['team_leadership'], '/investments/download/'.$projects['ListingDetail']['team_leadership']."/ListingPartnerPortfolio", array('escape'=>false, 
                                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));?>  </li>
                              
                                  <?php }  ?>
                           
                            <?php } ?>
                            
                            <?php foreach($listingPartners as $partners){ ?>
                            
                            
                            <li><?php
                                if(!empty($partners['ListingPartner']['content_value'])){
                                   echo $this->html->link($partners['ListingPartner']['content_value'], '/investments/download/'.$partners['ListingPartner']['content_value']."/ListingPartner", array('escape'=>false, 
                                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                                }
                                ?></li>

                            <?php } ?>
                        </ul>   
                    </div>
                </div>
            </div>
            
            
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            + DOCUMENTS:
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <ul>
                           <?php foreach($documents as $document){ ?>
                            
                            <li><?php
                                if(!empty($document['Document']['content_value'])){
                                   echo $this->html->link($document['Document']['content_value'], '/investments/download/'.$document['Document']['content_value']."/Document", array('escape'=>false, 
                                     'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;'));
                                }
                                ?></li>
                            
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="<?php echo $this->Html->url(array('controller' =>'investments' ,'action' =>'investor_invest_detail',$projects['BasicsDetail']['id'])); ?>" class="btn btn-default btn-primary invest">Invest</a>

        </div>
        
    </div>
    
    
    <div class="col-md-6 text-center">
        <div id="container" style="min-width: 310px; height: 300px; max-width: 200px; margin: 0 auto"></div>
<!--       <img src="<?php echo IMGPATH."cs.png"; ?>" alt="" />-->
        <br/><br/>
        <p>Please, feel free to reach out with any <a href="#">questions!</a></p>
    </div>
    <div class="col-md-12"><hr class="hr"/></div>
</div>


<script>
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: '',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
        
                center: ['50%', '50%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Capiatl Structure',
            innerSize: '50%',
            data: [   <?php echo $capital; ?> 
                   {
                        name: 'Others',
                        y: 0.0,
                        dataLabels: {
                            enabled: false
                        }
                    }
            ]
        }]
    });
});
</script>