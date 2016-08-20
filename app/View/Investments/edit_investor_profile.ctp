<script>
    function checkPassword() {
        var pass = $('#oldPassword').val();
        var param = 'oldPassword=' + pass;
        if (pass != '') {
            $.ajax({
                url: "<?php echo SITEPATH . "users/checkOldPassword" ?>",
                method: "POST",
                data: param,
                success: function(data)
                {
                    //    alert(data);   return false;
                    if (data == 0) {

                    } else {
                        $(":submit").attr("disabled", true);
                        $('#old_pass_msg').html(data);
                    }
                }
            });
        }
    }

    function checkPass()
    {
        var pass1 = document.getElementById('new_pass').value;
        var pass2 = document.getElementById('conPassword').value;

        if (pass1 == '') {
            
            var data = "Please enter password.";
            $('#pass').html(data);
            $(":submit").attr("disabled", true);
            return false;
            
        } else if(pass1 == pass2) { 
            
             $( "#conf_msg" ).empty();
             $( "#old_pass_msg" ).empty();
             $( "#pass" ).empty();
             $(":submit").removeAttr("disabled");
             
        } else if(pass1 != pass2) {
            
         //   alert(pass1+"=="+pass2);
            var data = "Confirm password and password should be same";
            $('#conf_msg').html(data);
            $(":submit").attr("disabled", true);
            return false;           
        }
    }


</script>


<div class="col-md-10">

    <div style="color:red"><?php echo $this->Session->flash(); ?></div>

    <?php echo $this->Form->create('Investment', array('controller' => 'investments', 'action' => 'edit_investor_profile', 'class' => 'well clearfix', 'type' => 'file')) ?>        	

    <h4>Edit my Profile</h4>
    <hr/>

    <div class="style1">
        <a href="https://www.dwolla.com/" target="_blank"> <img src="<?php echo IMGPATH."dwolla.jpg" ?>" alt=""/></a>
        <a href="https://accredify.com/" target="_blank"><img src="<?php echo IMGPATH."connect.png" ?>" alt=""/></a>
    </div>


    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][first_name]" value="<?php echo $users['User']['first_name'] ?>">
    </div>

    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][last_name]" value="<?php echo $users['User']['last_name'] ?>" >
    </div>

    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Email Address *</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][username]" value="<?php echo $users['User']['username'] ?>">
    </div>
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">City</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][city]" value="<?php echo $users['User']['city'] ?>" >
    </div>
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Address 1</label>
        <textarea class="form-control"  placeholder="" name="data[User][address1]" ><?php echo $users['User']['address1'] ?></textarea>
    </div>
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Address 2</label>
        <textarea class="form-control"  placeholder="" name="data[User][address2]" ><?php echo $users['User']['address2'] ?></textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">State/Province</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][state]" value="<?php echo $users['User']['state'] ?>" >
    </div>
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Zip/Postal Code</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][code]" value="<?php echo $users['User']['code'] ?>" >
    </div>
    
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Country</label>
        <input type="text" class="form-control"  placeholder="" name="data[User][country]" value="<?php echo $users['User']['country'] ?>" >
    </div>
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Occupation</label>
        <input type="text" class="form-control"  placeholder="" name="data[InvestorDetail][occupation]" value="<?php echo $users['InvestorDetail']['occupation'] ?>" >
    </div>
    
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Bio/About</label>
        <textarea cols="" class="form-control" rows="" name="data[InvestorDetail][bio_about]" ><?php echo $users['InvestorDetail']['bio_about'] ?></textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Estimated Net Worth</label>
        <input type="text" class="form-control"  placeholder="" name="data[InvestorDetail][estimated_net_worth]" value="<?php echo $users['InvestorDetail']['estimated_net_worth'] ?>" >
    </div>

    <div class="clearfix"></div>
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Profile Image</label>
        <input type="file" class=""  placeholder="" name="data[profile_image]">
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <p><b>Finances *</b></p>
        <p>Please check the box(es) that most accurately reflect your financial situation.</p>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[User][finance1]" <?php echo ($users['User']['finance1'] == 'on' ? 'checked' : ''); ?>> I have a net worth of one million dollars (exclusive of home).
            </label>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[User][finance2]" <?php echo ($users['User']['finance2'] == 'on' ? 'checked' : ''); ?> > I made two hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
            </label>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[User][finance3]" <?php echo ($users['User']['finance3'] == 'on' ? 'checked' : ''); ?> > My spouse and I made three hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
            </label>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[User][finance4]" <?php echo ($users['User']['finance4'] == 'on' ? 'checked' : ''); ?> >None of the above apply to me.
            </label>
        </div>
        <p><b>Investing Experience *</b></p>
        <p>On a scale from 0-10, how much investment experience do you have? 0 being none, and 10 being 10+ years.</p>
        <div class="form-group col-md-6">



            <select name="data[User][experience]" value="<?php echo $users['User']['experience'] ?>" >

                <?php
                for ($i = 0; $i <= 10; $i++) {
                    $selected = '';
                    if ($users['User']['experience'] == $i)
                        $selected = ' selected="selected"';
                    echo '<option value="' . $i . '"' . $selected . '>' . $i . '</option>' . "\n";
                }
                ?>

            </select>
        </div>  

        <div class="clearfix"></div>
        <p><b>What other types of investments have you made?</b></p>
<?php $otherInvestment = $users['InvestorDetail']['other_investments']; ?>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="Home Ownership"  <?php if (preg_match("/Home Ownership/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Home Ownership
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="Stocks & Mutual Funds" <?php if (preg_match("/Stocks & Mutual Funds/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Stocks & Mutual Funds
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="Bonds & Fixed Income" <?php if (preg_match("/REITs/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Bonds & Fixed Income
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="REITs" <?php if (preg_match("/Stocks & Mutual Funds/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >REITs
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="Private Equity" <?php if (preg_match("/Private Equity/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Private Equity
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="Venture Capital" <?php if (preg_match("/Venture Capital/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Venture Capital
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][other_investments][]" value="Restaurant / Small Business" <?php if (preg_match("/Restaurant  Small Business/", "$otherInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Restaurant / Small Business
            </label>
        </div>
        <p><b>Which types of properties interest you?</b></p>

<?php $propertyInvestment = $users['InvestorDetail']['property_interest']; ?>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Affordable Housing" <?php if (preg_match("/Affordable Housing/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Affordable Housing
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Condo"  <?php if (preg_match("/Condo/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Condo
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Hotel" <?php if (preg_match("/Hotel/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Hotel
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Industrial" <?php if (preg_match("/Industrial/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Industrial
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Mixed Use"  <?php if (preg_match("/Mixed Use/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Mixed Use
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Multi-Family" <?php if (preg_match("/Multi-Family/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Multi-Family
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Office" <?php if (preg_match("/Office/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Office
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]"  value="Residential" <?php if (preg_match("/Residential/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Residential
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]"  value="Restaurant" <?php if (preg_match("/Restaurant/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Restaurant
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Retail" <?php if (preg_match("/Retail/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Retail
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="data[InvestorDetail][property_interest][]" value="Senior Housing" <?php if (preg_match("/Senior Housing/", "$propertyInvestment")) {
    echo "checked";
} else {
    echo "";
} ?> >Senior Housing
            </label>
        </div>
    </div>
    <div class="clearfix"></div>
    <br/>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:#fff;">
        Change Password
    </a>

    <div class="collapse" id="collapseExample">
        <div class="well">
            <div class="form-group mar_profile">
                <label class="col-sm-4 control-label" for="inputEmail3">Old Password</label>
                <div class="col-sm-8">
                    <input type="password" placeholder="Old Password" id="oldPassword" class="form-control" name="data[User][old_password]" onblur="checkPassword()">

                    <div style='color:red' id='old_pass_msg'></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group mar_profile">
                <label class="col-sm-4 control-label" for="inputEmail3">New Password</label>
                <div class="col-sm-8">
                    <input type="password" placeholder="New Password" id="new_pass" class="form-control" name="data[User][password]">
                    <div style='color:red' id='pass'></div>

                </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-group mar_profile">
                <label class="col-sm-4 control-label" for="inputEmail3"  name="data[User][con-password]">Confirm New Password</label>
                <div class="col-sm-8">
                    <input type="password" placeholder="Confirm New Password" id="conPassword" class="form-control" onkeyup="checkPass();
                        return false;">                    
                    <div style='color:red' id='conf_msg'></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div align="center">
        <button type="submit" class="btn btn-default btn-primary invest">Save</button>
    </div>

<?php echo $this->Form->end(); ?>
</div>