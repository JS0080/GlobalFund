<?php echo $this->Html->script('highcharts.js'); ?>
<?php echo $this->Html->script('exporting.js'); ?>

<div class="col-md-10">
    <div class="row">
        <div class="col-md-3">
            <div class="bor_der investment-activity clearfix">
                <p class="clearfix"><strong class="pull-left">Total Fund <br/>Invested</strong>  <button type="button" class="btn btn-primary btn-xs pull-right">Monthly</button></p> 
                <h3>$<?php echo $MonthlyTotalFundInvested; ?> <div class="pull-right"><strong>
<!--                            <small class="blue">98%</small>-->
                        </strong></span></div></h3>
            </div>
        </div>
        
        
        <div class="col-md-3">
            <div class="bor_der investment-activity clearfix">
                <p class="clearfix"><strong class="pull-left">Investment <br/>Income</strong>  <button type="button" class="btn btn-primary green btn-xs pull-right">Annual</button></p> 
                <h3><?php echo $annualTotalFundInvested  ?><div class="pull-right"><strong>
<!--                            <small class="green">20%</small>-->
                        </strong></span></div></h3>
            </div>
        </div>
        
        
        <div class="col-md-3">
            <div class="bor_der investment-activity clearfix">
                <p class="clearfix"><strong class="pull-left">Projected Investment <br/>Income</strong>  <button type="button" class="btn btn-primary green_dark btn-xs pull-right">Today</button></p> 
                <h3>$<?php echo $ProjectedReturn; ?> <div class="pull-right"><strong>
<!--                            <small class="green_dark">44%</small>-->
                        </strong></span></div></h3>
            </div>
        </div>
        
        
        <div class="col-md-3">
            <div class="bor_der investment-activity clearfix">
                <p class="clearfix"><strong class="pull-left">Total Platform <br/>Returns</strong> </p> 
                <h3 class="text-center">38%</h3>

            </div>
        </div>

        <div class="clearfix"></div>
        <br/>
        
        <div class="col-md-12">
          
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        
        <div class="clearfix"></div>
        <br/>
        
    </div>
</div>


 <script>
 $(function () {
    $('#container').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Projects Investment'
        },
        xAxis: [{
            categories: [<?php echo $Projects; ?>],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}dollar',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Projects',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
        tooltip: {
            shared: true,
            valueSuffix: ' dollar'
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.2
            }
        }
        }, 
                
        { // Secondary yAxis
            title: {
                text: 'Amount',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} dollar',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Amount',
            type: 'column',
            color: '#A3E1D4',
            yAxis: 1,
            data: [<?php echo $no_of_projects; ?>],
            
            tooltip: {
                valueSuffix: ' dollar'
            }
        },
          {
            color: '#C5C7D2',
            name: 'Investment',
            data: [<?php echo $projected_return; ?>]
        }]
    });
});    

</script>