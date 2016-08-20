<?php
//Required for Stage 1 & Stage 2
 include 'Accredify.php';
 use Accredify\API as AccredifyAPI;
 $AccredifyAPI = new AccredifyAPI;

 $_SESSION['accredifyDetail'] = array();

 //Stage 1, Create Accredify Connect Button
 $AccredifyButton = $AccredifyAPI::getButton();
 
//Stage 2: Place this code on your callback URI, in this example the callback is the same page as the button.
 //Note: You do not need the $example conditional in production code, it is to illustrate the two methods. 
$example = "option1";

/******
	Option 1, Return Token then later pull Accredify Client Informaiton. 
******/
if($example == "option1"){
   
	//Stage 2.a Recive Token
	$AccredifyClientToken = $AccredifyAPI::getToken(); //Store for later API Calls

	//Stagr 2.b Pull Accredify Information
	$AccredifyClient =  $AccredifyAPI::getClient($AccredifyClientToken); // Send Token, return Accredify Client

        if(!empty($AccredifyClient)){
            
          $accrediated = $AccredifyClient['is_federally_accredited'];
            
         if($accrediated ==''){
            $check=0; 
         }else{
           $check = $accrediated; 
         }  
          
         header('Location: ../../../investments/checkAccredifyVerification?check='.$check);
      }
               
}

/******
	Option 2, Return Token & Accredify Client Information
******/
//if($example == "option2"){
//    
//	$AccredifyInfo = $AccredifyAPI::getTokenandClient(); //Returns Both Token and Accredify Client Informaiton
//        
//}

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Accredify SDK Example</title>
    <style type="text/css">
            #header{width:100%; margin-bottom: 10px; padding:5px; border-bottom: 1px dashed #ccc;}
            #logo{width:200px; height:100px; background:#f1f1f1; text-align: center;  float: left;}
            #login{float:left;}
    /*	#login .accredify_button{height: 30px;}*/
            #content{width:100%; height:200%; text-align: center; }
            #content p{text-align: left;}
            #content .response{text-align: left;}
            .clear{clear:both;}
    </style>
    </head>
    
    
    <body>
        <div id='header'>
<!--		<div id='logo'>
                        <h1>Your Logo</h1>
                </div>-->
                <div id='login'>
                        <!-- Accredify Connect Button -->
                        <?php //echo $AccredifyButton;?>
                     
                   <a href="https://api.accredify.com/oauth/authorize?client_id=fRTdnP0nODNH1yPjsRQig9SNdha1c38rU1FhRGEF&redirect_uri=http://groupfund.sdssoftltd.co.uk/app/webroot/accredify/example.php&response_type=code"> <img src="<?php echo "http://localhost/gfund/Construction/Code/app/webroot/img/accredifybutton.png" ?>"></a>
              
<!-- //Accredify Connect Button -->

                </div>
                <div class="clear"></div>
        </div>

        <div id="content">
		<h1>Accredify Verification</h1>
		<p>
                        <strong>When you click on the Accredify Connect Button</strong><br/>
                        Test Login: <strong>DemoAccred@Gmail.com</strong><br/>
                        Test Password: <strong>verifyme!</strong><br/>

                </p>
                <hr/>

                <div class="response">
                 <?php 
//                        if(isset($AccredifyClient) && $AccredifyClient != null){
//                        
//                            
//                           
//                        }

//                        if(isset($AccredifyInfo) && $AccredifyInfo['token'] != null){
//                            //Option 2				
//                            echo "<h2>Accredify Client oAuth2 Access Token</h2><br/><strong>{$AccredifyInfo['token']}</strong>";
//                            
//                            echo "<h2>Accredify Client Info</h2>";
//                            
//                            foreach($AccredifyInfo['client'] as $field=>$value){
//                                    echo $field.":&nbsp&nbsp&nbsp<strong>".$value."</strong><br/><br/>";
//                            }				
//                        }
                 ?>
                </div>
        </div>
    </body>
</html>
