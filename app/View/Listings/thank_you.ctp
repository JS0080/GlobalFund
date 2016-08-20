
               <div id='flash' style="color:red"><?php echo $this->Session->flash();?></div>
            <!--form-->
<!--          <div class="col-md-12">-->
            	<div class="page-header">
                	<h1>Listing Partner</h1>
                </div>
            	<div class="alert alert-success col-md-" role="alert" style="margin-left: 16%;">
                	<p>Thank you for submitting your project!</p>
                	<p>Our underwriting and compliance team will begin reviewing the project ASAP. If we have
                            any questions, we will reach out accordingly. Expect to receive an update from us within
                            48 hours. We hope to have your offering live in no time!</p>
		       <p>If you have any questions, do not hesitate to reach out and let us know <a href="#">xyz@example.com</a></p>
                </div>
<!--            </div>-->
            <!--form-->
            
            
	  	
      

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo $this->html->script('jquery.min.js')?>
    <?php echo $this->html->script('bootstrap.min.js')?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo $this->html->script('ie10-viewport-bug-workaround.js')?>
     <!-- Investors: Register Modal -->
    
    
    <!-- Investors: Register Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><h3>Documents</h3></h4>
          </div>
          <div class="modal-body clearfix">
            <form>
            	 
               <div class="form-group col-md-6">
              	<div class="row"><p class="col-md-12"><b>Company Bio</b></p>	</div>
                <input type="file" class="" id="" placeholder="">
              </div>
              <div class="form-group col-md-6">
              	<div class="row"><p class="col-md-12"><b>Executive Summary</b></p>	</div>
                <input type="file" class="" id="" placeholder="">
              </div>
              <div class="form-group col-md-6">
              	<div class="row"><p class="col-md-12"><b>Portfolio</b></p>	</div>
                <input type="file" class="" id="" placeholder="">
              </div>
              
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Team/Leader Bios </b></p>	</div>
                <input type="file" class="" id="" placeholder="">
              </div>
             
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>    
  </body>
</html>
