<?php 
namespace Accredify;

class Config{

	//Set HOST PATH to the example.php file to match shown redirect url for this example to work. 
	//Copy and Paste the contents of this file into  config.php file for testing. 
	//REMEBER TO USE YOUR OWN APPLICATION ID, SECRET, ETC WHEN GOING LIVE
    
	public $default = array(
                           'application_id'=>'fRTdnP0nODNH1yPjsRQig9SNdha1c38rU1FhRGEF',
                           'secret_key'=>'ksml1cFt3vMkFE7SViU7m2zg3eyVUdAeFXAG9fad',                        
                           'redirect_uri'=>'http://groupfund.sdssoftltd.co.uk/app/webroot/accredify/example.php',
                           'button'=>'dark'//Light or Dark Button
			);
}

?>