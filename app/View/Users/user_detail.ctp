<div class="modal-body clearfix">

    <p class="col-md-12"><b>Name *</b></p>	
    <div class="form-group col-md-6">
      <input type="text" class="form-control" name="data[User][first_name]" placeholder="First Name" value="<?php echo $userDetail['User']['first_name'] ?>">
    </div>
    
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="" name="data[User][last_name]" placeholder="Last Name" value="<?php echo $userDetail['User']['last_name'] ?>">
    </div>
    
    <p class="col-md-12"><b>Email Address *</b></p>	
    <div class="form-group col-md-12">
      <input type="text" class="form-control" id="user_email" name="data[User][username]" placeholder="example@.com" value="<?php echo $userDetail['User']['username'] ?>">
    </div>

    <p class="col-md-12"><b>Address *</b></p>	
    <div class="form-group col-md-12">
      <textarea class="form-control" id="" name="data[User][address1]" placeholder="Address 1"><?php echo $userDetail['User']['address1'] ?></textarea>
    </div>
    
    <div class="form-group col-md-12">
       <textarea class="form-control" id="" name="data[User][address2]" placeholder="Address 2"><?php echo $userDetail['User']['address2'] ?></textarea>
    </div>

    <div class="form-group col-md-8">
      <div class="row"><p class="col-md-12"><b>City</b></p>	</div>
      <input type="text" class="form-control"  name="data[User][city]" id="" placeholder="" value="<?php echo $userDetail['User']['city'] ?>">
    </div>

    <div class="form-group col-md-8">
    <div class="row"><p class="col-md-12"><b>State/Province </b></p>	</div>
      <input type="text" class="form-control" id="" name="data[User][state]" placeholder="" value="<?php echo $userDetail['User']['state'] ?>">
    </div>
    
    
    <div class="form-group col-md-8">
      <div class="row"><p class="col-md-12"><b>Country</b></p>	</div>
      <input type="text" class="form-control" id="" name="data[User][country]"  placeholder="" value="<?php echo $userDetail['User']['country'] ?>">
    </div>

    <div class="form-group col-md-8">
    <div class="row"><p class="col-md-12"><b>Zip/Postal Code </b></p>	</div>
      <input type="text" class="form-control" id="" name="data[User][code]" placeholder="" value="<?php echo $userDetail['User']['code'] ?>">
    </div>

    <div class="col-md-12">
        <p><b>Finances *</b></p>
        <p>Please check the box(es) that most accurately reflect your financial situation.</p>
           <div class="checkbox">
              <label>
                <input type="checkbox" name="data[User][finance1]" value="1" <?php echo ($userDetail['User']['finance1'] == 'on' ? 'checked' : '');?>> I have a net worth of one million dollars (exclusive of home).
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[User][finance2]" value="2" <?php echo ($userDetail['User']['finance2'] == 'on' ? 'checked' : '');?>> I made two hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[User][finance3]" value="3" <?php echo ($userDetail['User']['finance3'] == 'on' ? 'checked' : '');?>> My spouse and I made three hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
              </label>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[User][finance4]" value="4" <?php echo ($userDetail['User']['finance4'] == 'on' ? 'checked' : '');?>>None of the above apply to me.
              </label>
            </div>

            <p><b>Investing Experience *</b></p>
            <p>On a scale from 0-10, how much investment experience do you have? 0 being none, and 10 being 10+ years.</p>
            <div class="form-group col-md-6">
                <?php echo $userDetail['User']['experience']; ?>
            </div>
     </div>              
</div>


