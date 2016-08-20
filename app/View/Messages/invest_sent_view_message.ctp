<div id="viewDetail">
    <ul class="list-unstyled list-inline">      
        <li><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal11">
                Compose
            </button></li>

        <li><a onclick="investViewInbox();" href="javascript:void(0)"><button type="button" class="btn btn-primary">Inbox</button></a></li>
        <li><a onclick="investSentMessage();" href="javascript:void(0)">
                <button type="button" class="btn btn-primary">Sent Mail</button></a></li>    
    
    </ul>
    <table class="table table-bordered">

        <tbody>

        <div class="col-md-10 well">

            <div class="row ">
                <div class="col-md-11 col-md-offset-1">
                    <h3> <?php echo $messageDetail['Message']['subject']; ?></h3></div>
                <div class="col-md-1" style="padding:0px;">
    <!--                                <img src="img/3d0abbe66d7a73ac71f000aadb253def.jpg">-->
                </div>
                <div class="col-md-8">
                    <span><strong><?php echo $messageDetail['Receiver']['first_name'] . " " . $messageDetail['Receiver']['last_name']; ?></strong> &nbsp; &nbsp;< <?php echo $messageDetail['Receiver']['username']; ?> ></span><br/>
                    <span><strong>Date:</strong> <?php echo date('M j Y g:i A', strtotime($messageDetail['Message']['created'])); ?></span><br/>
                    <span><strong>From:</strong> <?php echo $messageDetail['User']['username']; ?></span><br/><br/>

                    <p><?php echo $messageDetail['Message']['message']; ?></p><br>

                    <p>Regards,</p>
                    <p><?php echo $messageDetail['User']['first_name'] . " " . $messageDetail['User']['last_name']; ?></p>
                </div>
            </div>                                 
        </div>
    </tbody>
    </table> 
</div>    
