<?php
 require_once("smtp.php");
 $from="singhsaurabh44@yahoo.com";  
 $sender_line=__LINE__;
 $recipient_line=__LINE__;

 $smtp=new smtp_class;

 $smtp->host_name="email-smtp.us-east-1.amazonaws.com";  
 $smtp->host_port=25;    
 $smtp->ssl=0;      
 $smtp->start_tls=1;
 $smtp->localhost="localhost";
 $smtp->direct_delivery=1;  
 $smtp->timeout=30;    
 $smtp->data_timeout=0;
 $smtp->debug=0;       
 $smtp->html_debug=0;  
 $smtp->pop3_auth_host="";
 $smtp->user="AKIAJ3ZMJMGI4OUSU4FA";          
 $smtp->realm="email-smtp.us-east-1.amazonaws.com";
 $smtp->password="AvVinzF8qUngR7PTHEwBWK0tyQZl8uCM0WdyztOIhxQA";         
 $smtp->workstation="";      
 $smtp->authentication_mechanism="";

 if($smtp->direct_delivery)
 {
  if(!function_exists("GetMXRR"))
  {
   $_NAMESERVERS=array();
   include("getmxrr.php");
  }
 }

 $sub = 'testmail';
 $message = 'this is test mail';
 $to = 'saurabhsinghapps@gmail.com\r\n';
 $headers .= 'Subject: '.$sub. "\r\n"; // Mail headers
 $headers .= 'Date: '.strftime("%a, %d %b %Y %H:%M:%S %Z"). "\r\n"; // Mail headers
 $smtp->SendMessage($from,array($to),array($headers),$message);
?>