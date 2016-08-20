<?php

App::uses('Component', 'Controller');

class CommonComponent extends Component {
    /*
     * Send Email via SMTP Gmail server
     */

    function sendMail($to, $from, $subject, $Body) {

//       App::import('Vendor', 'phpmailer', array(
//              'file' => 'phpmailer/class.phpmailer.php'));  
        require_once( WWW_ROOT . 'PHPmailer/class.phpmailer.php' );

        $mail = new PHPMailer();
        $mail->IsMAIL();
        $mail->IsHTML(true);

        $body = preg_replace('/\[\]/', '', $Body);

        $mail->SetFrom($from, 'Genie');

        $mail->AddReplyTo($from, "Genie");

        $address = $to;

        $mail->AddAddress($address);

        $mail->Subject = $subject;

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $mail->MsgHTML($body);


        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        } else {
            return "Success";
        }
    }

    function template($contentDeatil, $url, $logo) {

        $body = '<center>';

        $body .= '<table style="background-color: #000000; border-top: 0px none; border-bottom: 0px none; width: 640px;" border="0" cellpadding="0" cellspacing="0">';

        $body .= '<td style="padding-bottom: 20px; border-collapse: collapse;" align="center" valign="top">';
        $body .= '<table id="bodyContentBlock" style="background-color: #151515; border-top: 1px solid #252525; border-bottom: 1px solid #252525; width: 560px;" border="0" cellpadding="20" cellspacing="0">';

        $body .= '<td style="padding-top: 30px; padding-bottom: 30px; border-collapse: collapse;" align="center" valign="top">';
        $body .= '<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">';

        $body .= '<table width="100%" border="0">';

        $body .= '<tr>';
        $body .= '<td colspan="2" width="100%" style="padding-bottom:10px;"><a href="#"><img src="' . $logo . '" width="117" height="117" border="0" border="0" /> </a></td>';
        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td colspan="2" width="100%"  style="font-size:18px; color:#FFFFFF; font-family: Helvetica !important; padding-bottom:10px;">Hi Candidate</td>';
        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td style="font-size:14px; font-family: Helvetica !important;color:#FF6C00;">' . $contentDeatil . '</td>';
        $body .= '<td>&nbsp;</td>';
        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td colspan="2" style="font-size:14px; color:#B2B2B2; font-family: Helvetica !important; padding-bottom:15px;">Please follow the link below to login.</td>';
        $body .= '<td>&nbsp;</td>';
        $body .= '</tr>';

        $body .='<tr>';
        $body .= '<td colspan="2" style="font-size:14px; color:#B2B2B2; font-family: Helvetica !important; padding-bottom:15px;">url:' . $url . ' </td>';
        $body .= '<td>&nbsp;</td>';
        $body .='</tr>';

        $body .='<tr>';
        $body .='<td colspan="2" style="font-size:18px; font-family: Helvetica !important;color: #ECBA08;">Regards,</td>';
        $body .='</tr>';

        $body .= '<tr>';
        $body .= '<td colspan="2" style="font-size:18px; font-family: Helvetica !important;color: #ECBA08;">Genie Team</td>';
        $body .='</tr>';

        $body .='</table>';

        $body .= '</table>';
        $body .= '</td>';

        $body .='</table>';

        $body .='</center>';

        return $body;
    }

    function magictemplate($contentDeatil, $logo, $url) {

        $body = '<center>';

        $body .= '<table style="background-color: #fff; border-top: 0px none; border-bottom: 0px none; width: 640px;" border="0" cellpadding="0" cellspacing="0">';

        $body .= '<td style="padding-bottom: 20px; border-collapse: collapse;" align="center" valign="top">';
        $body .= '<table id="bodyContentBlock" style="background-color: #fff; border-top: 1px solid #252525; border-bottom: 1px solid #252525; width: 560px;" border="0" cellpadding="20" cellspacing="0">';

        $body .= '<td style="padding-top: 30px; padding-bottom: 30px; border-collapse: collapse;" align="center" valign="top">';
        $body .= '<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">';

        $body .= '<table width="100%" border="0">';

//        $body .= '<tr>';
//        $body .=  '<td colspan="2" width="100%" style="padding-bottom:10px;"><a href="#"><img src="'.$logo.'" width="117" height="117" border="0" border="0" /> </a></td>';
//        $body .=  '</tr>';

        $body .= '<tr>';
        $body .= '<td colspan="2" width="100%"  style="font-size:18px; color:#000; font-family: Helvetica !important; padding-bottom:10px;">Hi Candidate</td>';
        $body .= '</tr>';

        $body .= '<tr>';
        $body .= '<td style="font-size:14px; font-family: Helvetica !important;color:#000;">' . $contentDeatil . '</td>';
        $body .= '<td>&nbsp;</td>';
        $body .= '</tr>';

        $body .='<tr>';
        $body .='<td colspan="2" style="font-size:18px; font-family: Helvetica !important;color: #000;">
          Please follow the link below to login.          

         </td>';
        $body .='</tr>';

        $body .='<tr>';
        $body .= '<td colspan="2" style="font-size:14px; color:#000; font-family: Helvetica !important; padding-bottom:15px;">URL:-' . $url . ' </td>';
        $body .= '<td>&nbsp;</td>';
        $body .='</tr>';


        $body .='<tr>';
        $body .='<td colspan="2" style="font-size:18px; font-family: Helvetica !important;color: #000;">
          After redirect  click on New-Password tab in page and set your new password.    
            

         </td>';
        $body .='</tr>';

        $body .='<tr>';
        $body .='<td colspan="2" style="font-size:18px; font-family: Helvetica !important;color: #000;">Regards,</td>';
        $body .='</tr>';

        $body .= '<tr>';
        $body .= '<td colspan="2" style="font-size:18px; font-family: Helvetica !important;color: #000;">Genie Team</td>';
        $body .='</tr>';

        $body .='</table>';

        $body .= '</table>';
        $body .= '</td>';

        $body .='</table>';

        $body .='</center>';

        return $body;
    }

}

?>
