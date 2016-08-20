
<?php
//Required for Stage 1 & Stage 2
 include 'Accredify.php';
 use Accredify\API as AccredifyAPI;
 $AccredifyAPI = new AccredifyAPI;


 //Stage 1, Create Accredify Connect Button
 $AccredifyButton = $AccredifyAPI::getButton();

//Stage 2: Place this code on your callback URI, in this example the callback is the same page as the button.
 //Note: You do not need the $example conditional in production code, it is to illustrate the two methods. 
$example = "option1";

header("Location: http://google.com"); 
             die;

/******
	Option 1, Return Token then later pull Accredify Client Informaiton. 
******/
if($example == "option1"){
	//Stage 2.a Recive Token
	$AccredifyClientToken = $AccredifyAPI::getToken(); //Store for later API Calls

	//Stagr 2.b Pull Accredify Information
	$AccredifyClient =  $AccredifyAPI::getClient($AccredifyClientToken); // Send Token, return Accredify Client

}

/******
	Option 2, Return Token & Accredify Client Information
******/
if($example == "option2"){
    
	$AccredifyInfo = $AccredifyAPI::getTokenandClient(); //Returns Both Token and Accredify Client Informaiton
        
}

 if (isset($AccredifyClient) && $AccredifyClient != null) {
    //Option 1
   // echo "<h2>Accredify Client oAuth2 Access Token</h2><br/><strong>{$AccredifyClientToken}</strong>";
   // echo "<h2>Accredify Client Info</h2>";

    // code by nishtha yadav

  

    // end code by nishthA
}

//if (isset($AccredifyInfo) && $AccredifyInfo['token'] != null) {
//    //Option 2				
//    echo "<h2>Accredify Client oAuth2 Access Token</h2><br/><strong>{$AccredifyInfo['token']}</strong>";
//    echo "<h2>Accredify Client Info</h2>";
//    foreach ($AccredifyInfo['client'] as $field => $value) {
//        echo $field . ":&nbsp&nbsp&nbsp<strong>" . $value . "</strong><br/><br/>";
//    }
//}
?>
