<div class="col-md-9">
    
  <div id='flash' style="color:red"><?php echo $this->Session->flash();?></div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Message 
        </div>
        <div class="panel-body"> 

            
            <table class="table table-bordered">
        
                <tbody>
                    
                    <div class="col-md-10 well">

                        <div class="row ">
                            <div class="col-md-11 col-md-offset-1">
                                <h3> <?php echo $messageDetail['Message']['subject']; ?></h3>
                            </div>
                            
                            <div class="col-md-1" style="padding:0px;">

                            </div>
                            
                            <div class="col-md-8">
                                <span><strong><?php echo $messageDetail['Receiver']['first_name'] . " " . $messageDetail['Receiver']['last_name']; ?></strong> &nbsp; &nbsp;< <?php echo $messageDetail['Receiver']['username']; ?> ></span><br/>
                                <span><strong>Date:</strong> <?php echo date('M j Y g:i A', strtotime($messageDetail['Message']['created'])); ?></span><br/>
                                <span><strong>From:</strong> <?php echo $messageDetail['User']['username']; ?></span><br/><br/>

                                <p><?php echo $messageDetail['Message']['message']; ?></p><br>

                                <p>Regards,</p>
                                <p><?php echo $messageDetail['User']['first_name'] ." ".$messageDetail['User']['last_name']; ?></p>
                            </div>

                        </div>                                 
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>