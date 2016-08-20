<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->html->script('jquery.validate.min.js'); ?>
<div class="content">
    <div class="message"><?php echo $this->Session->flash(); ?></div>
    
    <h3 class="form-title">Login to Admin account</h3>
    
    <div style="color:red"><?php echo $this->Session->flash();?></div>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>
            Enter any username and password.
        </span>
    </div>
    <?php echo $this->Form->create("User", array('controller'=>'users','id'=>'adminlogin', 'action'=>'login')); ?>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email Id" name="data[User][username]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="data[User][password]"/>
        </div>
    </div>
    <div class="form-actions">
        <label class="checkbox">

            <button type="submit" class="btn blue pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
    </div>
    <?php echo $this->Form->end(); ?>	


</div>

<script type="text/javascript">
 $(document).ready( function() {
    var validator = $("#adminlogin").validate({
        rules: {
            "data[User][username]": {
                required: true
            },
            "data[User][password]": {
                required: true
            }

        },
        messages: {
            "data[User][username]": {
                required: "Email Id should not be blank."
            },
            "data[User][password]": {
                required: "Password should not be blank."
            }
        }
    });
    });
</script>
<style>
    .error{
        color:red!important;
    }
</style>