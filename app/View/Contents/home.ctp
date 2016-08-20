 <div class="row">
           <div class="container-image-img img">
           		<img src="../img/container.jpg" />
                
           </div> 
           <div class="container-image">
           <h2>Real Estate Crowdfunding: The Rise Of A Fourth Asset Class</h2>
<!--                <p> Investors have long recognized stocks, bonds, and commodities as the three main vehicles of generating wealth. However, crowdfunding in real estate has produced a fourth asset class that is offering opportunities for diversification to a broader class of investors</p>-->
           
                <p> <?php echo $homeDetail['Content']['content'] ?>  </p>
           
             </div> 
             
             <div class="model-str">
             	<h2>Model Structure</h2>
                 <p> <?php echo $homeDetail['Content']['long_desc'] ?>  </p>
               
<!--                 <p>GlobalGroupFund is a real estate crowdfunding platform with a comprehensive and forward-looking equity based model of crowdfunding, including accredited (and soon unaccredited investors), promoting a grassroots approach to public problem solving, and maximizing access to high value real estate assets.</p>
                
                -->
             </div> 
           
           <div class="">
           </div> 
            <!-- login and register -->

             
              
          
         
<!--            	
                	<div class="col-md-6 text-center register-heading h4">
                    	<br/>
                        
                    	<h4><strong>Investors: Register Here!</strong></h4>
                        <button type="button" class="btn btn-primary btn-lg system_button" data-toggle="modal" data-target="#myModal" id="button12">
                         REGISTER NOW! 
                        </button>
                    </div>
                    <div class="col-md-6 text-center register-heading h4">
                    <br/>
                    	<h4><strong>Listing Partner: Apply Here!</strong></h4>
                        <button type="button" class="btn btn-primary btn-lg system_button" data-toggle="modal" data-target="#myModal2" id="button12">
                        APPLY NOW!
                        </button>
                        <br/>
                        <br/>
                    </div>
                    <div class="col-md-12"><hr class="hr"/></div>-->
               
           <div class="home-imge-up">
           	<div class="box">
            	<a href=""><img src="../img/article (3).png" /></a>
            </div>
            <div class="box">
            	<img src="../img/article (1).gif" />
                <img src="../img/article (4).png" />
            </div>
            <div class="box">
            	<img src="../img/article (6).png" />
            </div>
             <div class="box" id="box-1">
            	<img src="../img/article (2).png" />
                <img src="../img/article (5).jpg" />
            </div>
            
           </div>
      
   
         

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>


    <!-- Investors: Register Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><h3>Investor App.</h3></h4>
          </div>
          <div class="modal-body clearfix">
            <form>
              <p class="col-md-12"><b>Name *</b></p>	
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" placeholder="First Name">
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" placeholder="Last Name">
              </div>
              <p class="col-md-12"><b>Email Address *</b></p>	
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="" placeholder="example@.com">
              </div>
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Password </b></p>	</div>
                <input type="password" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Confirm Password</b></p>	</div>
                <input type="password" class="form-control" id="" placeholder="">
              </div>
              <p class="col-md-12"><b>Address *</b></p>	
              <div class="form-group col-md-12">
                <textarea class="form-control" id="" placeholder="Address 1"></textarea>
              </div>
              <div class="form-group col-md-12">
                 <textarea class="form-control" id="" placeholder="Address 2"></textarea>
              </div>
               
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>City</b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>State/Province </b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>Country</b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>Zip/Postal Code </b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              <div class="col-md-12">
                  <p><b>Finances *</b></p>
                  <p>Please check the box(es) that most accurately reflect your financial situation.</p>
                  <div class="checkbox">
                        <label>
                          <input type="checkbox"> I have a net worth of one million dollars (exclusive of home).
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I made two hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> My spouse and I made three hundred thousand dollars in each of the preceding two years, and reasonably expect the same income.
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">None of the above apply to me.
                        </label>
                      </div>
                      <p><b>Investing Experience *</b></p>
                      <p>On a scale from 0-10, how much investment experience do you have? 0 being none, and 10 being 10+ years.</p>
                      <div class="form-group col-md-6">
                        <select class=" input-sm">
                        	<option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                      </div>
               </div>   
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>    
	    <!-- Listing Partner: Register Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><h3>Listing Partner App.</h3></h4>
          </div>
          
            <div class="modal-body clearfix">
            <form>
              <p class="col-md-12"><b>Name *</b></p>	
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" placeholder="First Name">
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" id="" placeholder="Last Name">
              </div>
              <p class="col-md-12"><b>Email Address *</b></p>	
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="" placeholder="example@.com">
              </div>
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Password </b></p>	</div>
                <input type="password" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group col-md-6">
              <div class="row"><p class="col-md-12"><b>Confirm Password</b></p>	</div>
                <input type="password" class="form-control" id="" placeholder="">
              </div>
              <p class="col-md-12"><b>Address *</b></p>	
              <div class="form-group col-md-12">
                <textarea class="form-control" id="" placeholder="Address 1"></textarea>
              </div>
              <div class="form-group col-md-12">
                 <textarea class="form-control" id="" placeholder="Address 2"></textarea>
              </div>
               
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>City</b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>State/Province </b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group col-md-8">
              	<div class="row"><p class="col-md-12"><b>Country</b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              
              <div class="form-group col-md-4">
              <div class="row"><p class="col-md-12"><b>Phone </b></p>	</div>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              <div class="col-md-12">
                  <p><b>States of Business *</b></p>
                  <p>List the states in which you conduct business.</p>
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder=""></textarea>
                    </div>
                      
               </div>
               <div class="col-md-12">
                  <p><b>Dollars Transacted *</b></p>
                  <p>(Estimated value, e.g., 1 million, 5 million, 10 million, 100 million, etc.)</p>
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder=""></textarea>
                    </div>
                      
               </div> 
               <div class="col-md-12">
                  <p><b>Company Description *</b></p>
                  <p>Brief bio/description of your company: (e.g., Small developer focusing on fix-and-flips in the tri-state; Large development company with 30 years of experience in infrastructure and ground up construction)</p>
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder=""></textarea>
                    </div>
                      
               </div>   
               <div class="col-md-12">
                  <p><b>Describe your company's "typical" real estate project. *</b></p>
                  
                  <div class="form-group">
                        <textarea class="form-control" id="" placeholder=""></textarea>
                    </div>
                      
               </div>   
               <div class="col-md-12">
                  <p><b>Website</b></p>
                  
                  <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="http/:">
                    </div>
                      
               </div>   
               <div class="col-md-12">
                  <p><b>Do you have a specific project you are looking to raise capital for?</b></p>
                  
                  <div class="form-group">
                        <select class=" input-sm">
                        	<option>Yes</option>
                            <option>No</option>
                           
                        </select>
                    </div>
                      
               </div>   
            </form>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>    

