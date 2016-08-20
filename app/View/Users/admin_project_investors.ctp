<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Project Investors Listing
                </div>
            </div>
            
            <div class="table-scrollable" style="margin-top:30px;">
               <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align:center" >S.No</th>
                            <th style="text-align:center" >Investor Name</th>
                            <th style="text-align:center" >Investor Email</th>
                            <th style="text-align:center">No. of Shares</th>
                            <th style="text-align:center">Amount</th>
                            <th style="text-align:center">Date</th> 
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        <?php $i = 1;
                        foreach ($InvestorsList as $users) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $users['User']['first_name']." ".$users['User']['last_name']; ?></td>                            
                                <td><?php echo $users['User']['username']; ?></td>
                                <td><?php echo $users['Investment']['shares']; ?></td>
                                <td><?php echo $users['Investment']['amount']; ?></td>
                                <td>
                                   <?php echo $users['Investment']['date']; ?>                                        
                                </td> 
                            </tr>
                         <?php $i++;
                        } ?>

                    </tbody>
                </table>
                    <div class="pagination" style="float:right; margin-right:10px;">
                          <?php echo $this->element('paging_links');?>
                    </div>
            </div>                    
        </div>
    </div>
</div>