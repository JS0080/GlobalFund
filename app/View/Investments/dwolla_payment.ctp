<div class="col-md-10">
    
    <div style="color:red"><?php echo $this->Session->flash();?></div>
  
        <h4>Dwolla Payment </h4>
        <hr/>
        
        
          <div class="style1"><a href="#">
     <?php $amount = $_GET['amount']; ?>             
                  
 <script
  src="https://www.dwolla.com/scripts/button.min.js" class="dwolla_button" type="text/javascript"
  data-key="lBeJ8i4dSHNgnm1fU3nbY/Q1dWLwphEzxIij1iF6AOuhBj9F0N"
  data-redirect="groupfund.sdssoftltd.co.uk/investments/paymentSuccess"
  data-label="Pay With Dwolla"
  data-name="GroupFund"
  data-description="GroupFund"
  data-amount="<?php echo $amount; ?>"
  data-guest-checkout="true"
  data-type="freetype"
>
</script>
<!--<img src="../img/dwolla.png" alt=""/>-->
              
     </a>
         
      
  </div>