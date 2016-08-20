<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->html->css('bootstrap.min.css');?>

    <!-- Custom styles for this template -->
    <?php echo $this->html->css('dashboard.css');?>

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GroupFund Inc.</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="<?php echo $this->html->url('investor')?>">Profile</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dashboard.html">Overview <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="change-password.html">Change Password</a></li>
           <!-- <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>-->
          </ul>
        <!--  <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>-->
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            
            <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'change_password','id'=>'changepass'));?>
          	
            
		<h1 class="page-header">Dashboard</h1>  	
                <div style="color:red" > <?php echo $this->Session->flash(); ?></div>        
              <div class="form-group">
                <label for="inputEmail3"  class="col-sm-4 control-label">Old Password</label>
                <div class="col-sm-8">
                    <input type="password" name="data[User][password_old]" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3"  class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" name="data[User][password_new]" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3"  class="col-sm-4 control-label">Re-new Password</label>
                <div class="col-sm-8">
                    <input type="password" name="data[User][password_confirm]" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
                </div>
              </div>
                  <?php echo $this->Form->end();?>
            
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo $this->html->script('jquery.min.js');?>
    <?php echo $this->html->script('bootstrap.min.js');?>
 </body>
</html>
<?php echo $this->html->script('jquery.js');
      echo $this->html->script('jquery.validate.min.js');?>
<script>
$(document).ready(function(){
    $('#changepass').validate({
        rules:{
          "data[User][password_old]":{
              required: true
          }, 
          "data[User][password_new]":{
             required:true,
             minlength: 6
          },
          "data[User][password_confirm]":{
              required: true,
              equalTo:"#inputEmail3"
          }
        },
        messages:{
            "data[User][password_old]":{
              required: "old password should not be blank.<br/>"
          }, 
          "data[User][password_new]":{
             required:"new password should not be blank.<br/>"
            
          },
          "data[User][password_confirm]":{
              required: "confirm password should not be blank.<br/>",
              equalTo: jQuery.format("Both password must match.")
          }
        }
    });
});
</script>
<style>
    .error{
        color:red
    }
</style>