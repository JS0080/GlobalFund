<script>
  function openListing(Id){
    if(Id){
      $.ajax({
            url:'<?php echo SITEPATH ?>'+"users/user_listing_detail/"+Id,
            success:function(data) {
               $('#listing').html(data);
               
               $('#myModal').modal('show');
            }
         });         
    }         
  }
</script>


<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Listing Partner List
                </div>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
                <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align:center" >S.No</th>
                            <th style="text-align:center" >Email-Id</th>                    
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
                                <td><a href="javascript:void(0)" onclick="openListing('<?php echo $users['User']['id']; ?>')"><?php echo $users['User']['username']; ?> </a></td>
                               
                                <td><?php echo $users['User']['country']; ?></td>
                                <td><?php echo $users['User']['city']; ?></td>
                                <td>
                                    
                                    <?php if ($users['User']['is_deleted'] == 0) { ?>   
                                        <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_listing_inactive_user', $users['User']['id'], $users['User']['is_deleted'])); ?>"><?php echo $this->html->image('active.png', array('title' => 'Active')) ?></a>
                                    <?php } else { ?>  
                                        <a href="<?php echo $this->html->url(array('controller' => 'users', 'action' => 'admin_listing_active_user', $users['User']['id'], $users['User']['id'])); ?>"><?php echo $this->html->image('test-fail-icon.png', array('title' => 'Inactive')) ?></a>
                                 <?php } ?>
                                        

                                    <?php echo $this->Html->link($this->Html->image('trash.png', array(
                                                    'alt' => 'Delete')
                                               ), array(
                                                    'controller' => 'users',
                                                    'action' => 'admin_listing_delete_user',
                                                     $users['User']['id']
                                               ), array(
                                                   'title' => 'delete',
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


<!-- Listing Partner: Register Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
              <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><h3>Listing Partner App.</h3></h4>
          </div>
          
            <div id="listing"> </div>
            
        </div>
      </div>
    </div>  
