<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title" style="border-bottom:none;">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Content Listing
                </div>
            </div>
            <div class="table-scrollable" style="margin-top:30px;">
                <div style="background-color: white;">   <?php echo $this->Session->flash(); ?> </div> <br>
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <th style="text-align:center" >S.No</th>
                            <th style="text-align:center" >Page Name</th>
                            <th style="text-align:center">Content</th>
                           
                            <th style="text-align:center">Action</th> 
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $i = 1;
                        foreach ($contents as $content) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $content['Content']['content_name']; ?></td>
                                <td><?php echo substr($content['Content']['content'],0,50); ?></td>
                             
                                <td>
                                    <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_content_edit', $content['Content']['id'])); ?>"><?php echo $this->html->image('edit-24.png', array('title' => 'View')) ?></a>    
                             
                                   <a href="<?php echo $this->html->url(array('controller' => 'contents', 'action' => 'admin_delete_project', $content['Content']['id'])); ?>"><?php echo $this->html->image('trash.png', array('title' => 'Delete')) ?></a>          
                                        
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