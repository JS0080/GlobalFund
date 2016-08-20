<style>
    
.col-md-4 {
    background-color: inherit;
    width: 33.3333%;
}


.grey_bg { background: #FFF;min-height: 240px; border: 1px solid #ccc; margin-bottom: 25px;}


</style>

<div><h3>Welcome To Dashboard</h3>
    
<div class="row">
    <div class="col-md-4">
        <div class="clearfix grey_bg">
            <a class="project_img" href="investments-details.html"></a>
            <h4 class="border_bottom text-center">Total Number Of Investors <br/></h4>
            
             <br/>
             <br/>
             <br/>
             <h4 class="border_bottom text-center"><?php echo $countInvestor; ?><br/></h4>            
        </div>
    </div>   
            
    <div class="col-md-4 ">
        <div class="clearfix grey_bg">
            <a class="project_img" href="investments-details.html"></a>
            <h4 class="border_bottom text-center">Total Number Of Listing Partners <br/></h4>  
            
             <br/>
             <br/>
             <br/>
             <h4 class="border_bottom text-center"><?php echo $countListing; ?><br/></h4>            
        </div>
    </div>   

    <div class="col-md-4 ">
        <div class="clearfix grey_bg">
            <a class="project_img" href="investments-details.html"></a>
            <h4 class="border_bottom text-center">Total Numbers Of Projects <br/></h4>          
             <br/>
             <br/>
             <br/>
             <h4 class="border_bottom text-center"><?php echo $countProject; ?><br/></h4>
        </div>
    </div> 
    
 </div>
    
    
<div class="row">
    <div class="col-md-4">
        <div class="clearfix grey_bg">
            <a class="project_img" href="investments-details.html"></a>
            <h4 class="border_bottom text-center">Total Offering Amount Of Projects <br/></h4>           
             <br/>
             <br/>
             <br/>
             <h4 class="border_bottom text-center">$ <?php echo number_format($totalOfferingAmount[0][0]['total_sum'],2); ?><br/></h4>           
        </div>
    </div>   

    <div class="col-md-4 ">
        <div class="clearfix grey_bg">
            <a class="project_img" href="investments-details.html"></a>
            <h4 class="border_bottom text-center">Average Projected Project Returns <br/></h4>
             
             <br/>
             <br/>
             <br/>
             <h4 class="border_bottom text-center"><?php echo $projectedReturn; ?>%<br/></h4>            
        </div>                                
    </div>   

    <div class="col-md-4 ">
       <div class="clearfix grey_bg">
            <a class="project_img" href="investments-details.html"></a>
             <h4 class="border_bottom text-center">Total Projected Investment Income <br/></h4>            
             <br/>
             <br/>
             <br/>
             <h4 class="border_bottom text-center">$<?php echo $totalInvestmentIncome; ?><br/></h4>             
         </div>                                 
    </div>

 </div>

</div>
