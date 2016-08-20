<div class="modal-body clearfix">

    <p class="col-md-12"><b>Name *</b></p>	
    <div class="form-group col-md-6">
        <input type="text" class="form-control"  name="data[User][first_name]" value="<?php echo $userDetail['User']['first_name']; ?>">
    </div>

    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="data[User][last_name]" value="<?php echo $userDetail['User']['last_name']; ?>">
    </div>

    <p class="col-md-12"><b>Email Address *</b></p>	
    <div class="form-group col-md-12">
        <input type="text" class="form-control" name="useremail" value="<?php echo $userDetail['User']['username']; ?>">
    </div>


    <p class="col-md-12"><b>Company Name *</b></p>	
    <div class="form-group col-md-12">
        <input type="text" class="form-control" name="data[User][company_name]" placeholder="" value="<?php echo $listingDetail['ListingDetail']['company_name']; ?>">
    </div>

    <p class="col-md-12"><b>Address *</b></p>	
    <div class="form-group col-md-12">
        <textarea class="form-control" name="data[User][address1]" placeholder="Address 1" value="<?php echo $userDetail['User']['address1']; ?>"></textarea>
    </div>


    <div class="form-group col-md-12">
        <textarea class="form-control" name="data[User][address2]" placeholder="Address 2" value="<?php echo $userDetail['User']['address2']; ?>"></textarea>
    </div>

    <div class="form-group col-md-8">
        <div class="row"><p class="col-md-12"><b>City</b></p>	</div>
        <input type="text" class="form-control" name="data[User][city]" placeholder="" value="<?php echo $userDetail['User']['city']; ?>">
    </div>

    <div class="form-group col-md-8">
        <div class="row"><p class="col-md-12"><b>State/Province </b></p>	</div>
        <input type="text" class="form-control" name="data[User][state]" placeholder="" value="<?php echo $userDetail['User']['state']; ?>">
    </div>
    

    <div class="form-group col-md-8">
        <div class="row"><p class="col-md-12"><b>Country</b></p>	</div>
        <input type="text" class="form-control" name="data[User][country]" placeholder="" value="<?php echo $userDetail['User']['country']; ?>">
    </div>
    

    <div class="form-group col-md-8">
        <div class="row"><p class="col-md-12"><b>Phone </b></p>	</div>
        <input type="text" class="form-control" name="data[User][phone]" placeholder="" value="<?php echo $userDetail['User']['phone']; ?>">
    </div>


    <div class="col-md-12">
        <p><b>States of Business *</b></p>
        <p>List the states in which you conduct business.</p>
        <div class="form-group">
            <textarea class="form-control" placeholder="" name="data[User][states]"><?php echo $userDetail['User']['states']; ?></textarea>
        </div>                      
    </div>


    <div class="col-md-12">
        <p><b>Dollars Transacted *</b></p>
        <p>(Estimated value, e.g., 1 million, 5 million, 10 million, 100 million, etc.)</p>
        <div class="form-group">
            <textarea class="form-control" placeholder="" name="data[User][dollars_transacted]"><?php echo $userDetail['User']['dollars_transacted']; ?></textarea>
        </div>                     
    </div> 

    <div class="col-md-12">
        <p><b>Company Description *</b></p>
        <p>Brief bio/description of your company: (e.g., Small developer focusing on fix-and-flips in the tri-state; Large development company with 30 years of experience in infrastructure and ground up construction)</p>
        <div class="form-group">
            <textarea class="form-control" placeholder="" name="data[User][company_description]"><?php echo $userDetail['User']['company_description']; ?></textarea>
        </div>                   
    </div> 

    <div class="col-md-12">
        <p><b>Describe your company's "typical" real estate project. *</b></p>
        <div class="form-group">
            <textarea class="form-control" placeholder="" name="data[User][company_real_estate_description]"><?php echo $userDetail['User']['company_real_estate_description']; ?></textarea>
        </div>                     
    </div>  

    <div class="col-md-12">
        <p><b>Website</b></p>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="http/:" name="data[User][website]" value="<?php echo $userDetail['User']['website']; ?>">
        </div>                     
    </div> 

    <div class="col-md-12">
        <p><b>Do you have a specific project you are looking to raise capital for?</b></p>

        <div class="form-group">
            <select class=" input-sm" name="data[User][specific_project]">
                <option <?php if ($userDetail['User']['specific_project'] == 'Yes' ) echo 'selected' ; ?>>Yes</option>
                <option <?php if ($userDetail['User']['specific_project'] == 'no' ) echo 'selected' ; ?>>No</option>
            </select>
        </div>                     
    </div> 
    
</div>