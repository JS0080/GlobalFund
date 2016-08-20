<?php foreach($contents as $partner){ ?>
            
<!--             <div class="form-group col-sm-6 col-md-6">
                <div class="edit_im1">
                    <label class="pull-left" for="exampleInputFile"><?php echo $partner['ListingPartnerContent']['contents']; ?></label>
                   
                    <div id='upload_<?php echo $partner['ListingPartnerContent']['id']; ?>' style='display:none;margin-left: 20px;'>
                        <img src="../img/active.png" width="18" alt="">
                    </div>
                    
                    <div class="clearfix"></div>
                    <input type="button" id="exampleInputFile" onclick="openPopUp('<?php  echo $partner['ListingPartnerContent']['id']; ?>');" value="upload">  
                    <p class="help-block">Upload .docx or .pdf files.</p>

                </div>
                
            </div>-->

            <div class="form-group col-sm-6 col-md-6">
                <div class="edit_im1">
                    <label class="pull-left" for="exampleInputFile"><?php echo $partner['ListingPartnerContent']['contents']; ?></label>

                    <div id='upload_<?php echo $partner['ListingPartnerContent']['id']; ?>' style='display:block;margin-left: 20px;'>
                        <img src="../img/active.png" width="18" alt="">
                    </div>

                    <div class="clearfix"></div>
                    <input type="button" id="exampleInputFile" onclick="openPopUp('<?php echo $partner['ListingPartnerContent']['id']; ?>');" value="upload">  
                    <p class="help-block">Upload .docx or .pdf files.</p>

                </div>
            </div>

        <?php } ?>