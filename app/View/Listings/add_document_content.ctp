  <?php foreach($documents as $document) { ?>
    <div class="form-group col-sm-6 col-md-6">
        <div class="edit_im1">
            <label class="pull-left" for="exampleInputFile"><?php echo $document['DocumentContent']['contents']; ?></label>

            <div class="edit_im" style='display:block;margin-left: 20px;'>
            <a href="#"><img src="../img/active.png" width="18" alt=""></a>
            </div>

            <div class="clearfix"></div>
            <input type="button" id="exampleInputFile" onclick="openDocModal('<?php echo $document['DocumentContent']['id']; ?>');" value="upload">  
            <p class="help-block">Upload .docx or .pdf files.</p>
        </div>
    </div>
 <?php } ?>