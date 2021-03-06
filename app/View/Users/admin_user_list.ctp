<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Users Listing
                </div>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
                <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align:center" >S.No</th>
                            <th style="text-align:center" >Username</th>
                             <th style="text-align:center">User Type</th>
                            <th style="text-align:center">Country</th>
                            <th style="text-align:center">State</th>
                            <th style="text-align:center">Action</th> 
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = 1;
                        foreach ($userLists as $users) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $users['User']['username']; ?></td>
                                <td><?php echo $users['User']['user_type']; ?></td>
                                <td><?php echo $users['User']['country']; ?></td>
                                <td><?php echo $users['User']['city']; ?></td>
                                <td>
                                    
                                    <?php if ($users['User']['is_deleted'] == 0) { ?>   
                                        <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_inactive_user', $users['User']['id'], $users['User']['is_deleted'])); ?>"><?php echo $this->html->image('active.png', array('title' => 'Active')) ?></a>
                                    <?php } else { ?>  
                                        <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_active_user', $users['User']['id'], $users['User']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Inactive')) ?></a>
                                 <?php } ?>
                                        

                                    <?php echo $this->Html->link($this->Html->image('trash.png', array(
                                                    'alt' => 'Delete')
                                               ), array(
                                                    'controller' => 'users',
                                                    'action' => 'admin_delete_user',
                                                     $users['User']['id']
                                               ), array(
                                                    'escape' => false,
                                                    'confirm' => 'Are you sure you want to delete this user?'
                                               )); ?>                    
                                                    
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