<?php echo $this->Html->script('readmore.js'); ?>

<!-- Add jQuery library -->
<?php echo $this->Html->script('jquery-1.10.1.min.js'); ?>

<?php echo $this->Html->script('jquery.mousewheel-3.0.6.pack.js'); ?>

<?php echo $this->Html->script('jquery.fancybox.js'); ?>

<?php echo $this->Html->css('jquery.fancybox.css'); ?>




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



<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
                                    thumbs : {
                                            width  : 50,
                                            height : 50
                                    }
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-body"> 
            <div class="col-md-12">
                <div id='flash' style="color:red"><?php echo $this->Session->flash();?></div>
                <div class="col-md-12 text-center padding_top">
                    <?php if(!empty($users['User']['profile_image'])) { ?>
                    <img src="<?php echo IMGPATH."ListingPartnerProfile/".$users['User']['profile_image']; ?>" class="img-rounded  " title="profile image" style='width:140px;'></div>
                    <?php }else{ ?>
                      <img src="http://www.rlsandbox.com/img/profile.jpg" class="img-rounded  " title="profile image">
                    <?php } ?>
                <div class="col-md-12 text-center padding_top"> <?php echo $users['User']['first_name']." ".$users['User']['last_name']; ?></div>
                <div class="col-md-12 text-center padding_top"> <?php echo $users['User']['city']." , ".$users['User']['state']; ?></div> 
                
                <div class="col-md-12 text-center padding_top">
                        <span class="more">
                          <?php echo $users['ListingDetail']['about_bio']; ?>
                        </span>

                     </div>



                <div class="col-md-12">  
                    <ul class="nav nav-tabs back-gg" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Document</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Portfolio Gallery</a></li>
                        <li role="presentation"><a href="#projects" aria-controls="messages" role="tab" data-toggle="tab">Current Projects</a></li>
                        
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">Company Name </b><span class="col-lg-8"><?php echo $users['ListingDetail']['company_name']?>.</span></p>
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">State</b><span class="col-lg-8"><?php echo $users['User']['state']?></span></p>
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">City</b><span class="col-lg-8"><a href="#" target="_blank"><?php echo $users['User']['city']?></a></span></p> 		
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">About</b><span class="col-lg-8">&nbsp; <?php echo substr($users['ListingDetail']['about_bio'],0,50); ?>.</span></p>
                        </div>
                        
                        
                        <div role="tabpanel" class="tab-pane" id="profile">    
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">Company Bio </b><span class="col-lg-8">
                              <?php   echo $this->html->link($users['ListingDetail']['upload_bio'], '/listings/download/'.$users['ListingDetail']['upload_bio']."/ListingPartnerPortfolio", array('escape'=>false, 
                                                'target'=>'_blank', 'style'=>'text-decoration:none; color:#ffa985;')); ?>
                                </span></p>  
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">Portfolio </b><span class="col-lg-8"><a href="<?php echo SITEPATH."listings/download/".$users['ListingDetail']['portfolio']."/ListingPartnerPortfolio" ?>" target="_blank"><?php echo $users['ListingDetail']['portfolio']?></a></span></p>  
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">Executive Summary</b><span class="col-lg-8"><a href="<?php echo SITEPATH."listings/download/".$users['ListingDetail']['executive_summary']."/ListingPartnerPortfolio" ?>" target="_blank"><?php echo $users['ListingDetail']['executive_summary']?></a></span></p>
                            <p class="clearfix"><b class="col-xs-offset-1 col-lg-3">Team / Leaders Bio</b><span class="col-lg-8"><a href="<?php echo SITEPATH."listings/download/".$users['ListingDetail']['team_leadership']."/ListingPartnerPortfolio" ?>" target="_blank"><?php echo $users['ListingDetail']['team_leadership']?></a></span></p> 
                        </div>

                        <div role="tabpanel" class="tab-pane" id="messages"> 
                            <p>  <strong>Portfolio Gallery</strong></p>
                            <p>
                                <?php 
                                   $imagesPath = array("jpg","jpeg","gif","png");
                                   foreach($portfolios as $portfolio){ 
                                      $ext = pathinfo($portfolio['ListingPortfolio']['portfolio_image'], PATHINFO_EXTENSION);
                                      if(in_array($ext, $imagesPath)){
                                    ?>
                                     <a class="fancybox" href="<?php echo IMGPATH."ListingPartnerPortfolio/".$portfolio['ListingPortfolio']['portfolio_image']; ?>" data-fancybox-group="gallery" title=""><img src="<?php echo IMGPATH."ListingPartnerPortfolio/".$portfolio['ListingPortfolio']['portfolio_image']; ?>" alt="" style="width:140px;" /></a>        
                                <?php }else{ }
                                    } ?>   
                            </p>
                        </div>
                        
                        
                           <div role="tabpanel" class="tab-pane clearfix" id="projects">                            
                              <?php foreach($projects as $investment) { // pr($project);?>
                               
                               <div class="col-md-6 text-center mar">
                                       <div class="row">
                                           <div class="col-md-12 ">
                                               <div class="clearfix grey_bg">
                                                   <a class="project_img" href="<?php echo $this->Html->url(array('controller' =>'listings','action' =>'current_project_detail',$investment['BasicsDetail']['project_id'])); ?>">
                                                       <img src="<?php echo IMGPATH . "BasicDetail/" . $investment['BasicsDetail']['image']; ?>" alt="" />
                                                   </a>


                                                   <h4 class="border_bottom"><?php echo $investment['BasicsDetail']['project_name']; ?> <br/><small><?php echo $investment['BasicsDetail']['address']; ?></small></h4>

                                                   <h4>Fundraising Progress:</h4>
                                                   <div style="margin: auto; text-align: center; width: 70%;" title="">
                                                       <div style="text-align: left; margin: 2px auto; font-size: 0px; line-height: 0px; border: solid 1px #AAAAAA; background: #DDDDDD; overflow: hidden; border-radius: 10px;  ">                           
                                                           <div style="font-size: 0px; line-height: 0px; height: 15px; min-width: 0%; max-width: <?php echo $investment['BasicsDetail']['percentage_completed']; ?>%; width: 48%; background: none repeat scroll 0px 0px rgb(29, 61, 141);"><!----></div>                            
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
                               
                               
                               
<!--                                <div class="col-md-4 text-center mar">
                                   <div class="row">
                                       <div class="col-md-12 ">
                                           <div class="clearfix grey_bg">
                                               <a class="project_img project2" href="<?php echo $this->Html->url(array('controller' =>'listings','action' =>'current_project_detail',$project['BasicsDetail']['project_id'])); ?>"><img src="<?php echo IMGPATH . "BasicDetail/".$project['BasicsDetail']['image']; ?>" alt="" /></a>
                                               <h4 class="border_bottom border-none"><?php echo $project['BasicsDetail']['project_name'] ?> <br/><small><?php echo $project['BasicsDetail']['address'] ?> </small></h4>
                                           </div>
                       
                                       </div>    
                                   </div>
                               </div>-->
                            <?php } ?>
                        </div>
                    </div>
                </div>  
            </div>                           
        </div>
        <div class="clearfix"></div>
    </div>
</div>