<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Project Listing
                </div>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
                <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align:center" >S.No</th>
                            <th style="text-align:center" >Company Name</th>
                            <th style="text-align:center">Project Name</th>
                            <th style="text-align:center">Offering Amount</th>
                            <th style="text-align:center">Action</th> 
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = 1;
                        foreach ($userProjectDetails as $project) { //pr($project); die; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <?php   $toUser = $this->requestAction(array('controller'=>'users', 'action'=>'getListingDetail', 'to_id' => $project['BasicsDetail']['user_id']));  ?>
  
                                <td><?php echo $toUser['ListingDetail']['company_name']; ?></td>
                                <td><a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_project_investors', $project['BasicsDetail']['id'])); ?>"><?php echo $project['BasicsDetail']['project_name']; ?></a></td>
                                <td><?php echo $project['BasicsDetail']['offering_amount']; ?></td>
                                <td>
                                    <a href="<?php echo $this->html->url(array('controller' => 'users', 
                                               'action' => 'admin_project_view', $project['BasicsDetail']['id'])); ?>"><?php echo $this->html->image('edit-24.png', array('title' => 'Edit')) ?></a>    
                                  
                                    <?php if ($project['BasicsDetail']['is_deleted'] == 0) { ?>   
                                        <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_active_project', $project['BasicsDetail']['id'], $project['BasicsDetail']['is_deleted'])); ?>"><?php echo $this->html->image('active.png', array('title' => 'Active')) ?></a>
                                    <?php } else { ?>  
                                        <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_active_project', $project['BasicsDetail']['id'], $project['BasicsDetail']['is_deleted'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Inactive')) ?></a>
                                 <?php } ?>
            
                                        
                                           <?php echo $this->Html->link($this->Html->image('trash.png', array(
                                                    'alt' => 'Delete')
                                               ), array(
                                                    'controller' => 'users',
                                                    'action' => 'admin_delete_project',
                                                     $project['BasicsDetail']['id']
                                               ), array(
                                                    'title' => 'delete',
                                                    'escape' => false,
                                                    'confirm' => 'Are you sure you want to delete this project?'
                                               )); ?>          
                                        
<!--                                   <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_delete_project', $project['BasicsDetail']['id'])); ?>"><?php echo $this->html->image('trash.png', array('title' => 'Delete')) ?></a>          -->
                                        
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

<!--ALTER TABLE `sds_gfund_basics_details` ADD `is_deleted` TINYINT( 2 ) NOT NULL DEFAULT '0' AFTER `capital_structure` -->