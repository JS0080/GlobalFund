<?php

Class UsersController extends AppController {

    var $uses = array('User','BasicsDetail','ListingPartner','Document','ListingPartnerContent',
                  'DocumentContent','CapitalStructureContent','CapitalStructure','ListingDetail',
                'Investment');
    
    
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler', 'Common');

    function beforeFilter() {

        $this->Auth->allow('success','checkEmail','signups','login','forgot_password',
                   'forgot_set_password','verify');
    }
    
    

    function login() {
        $this->layout = 'main_layout';
        if (!empty($this->request->data)) {

            if ($this->Auth->login()) {
              //  pr($_SESSION['Auth']['User']); die;
                if ($_SESSION['Auth']['User']['user_type'] == 'investor' && $_SESSION['Auth']['User']['is_verified'] == 1 && $_SESSION['Auth']['User']['is_deleted'] ==0) {
                    $this->redirect(array('controller' => 'investments', 'action' => 'investor'));
                } else if ($_SESSION['Auth']['User']['user_type'] == 'listing' && $_SESSION['Auth']['User']['is_verified'] == 1 && $_SESSION['Auth']['User']['is_deleted'] ==0) {
                    $this->redirect(array('controller' => 'listings', 'action' => 'listing'));
                } else if ($_SESSION['Auth']['User']['is_verified'] == 1 && $_SESSION['Auth']['User']['is_deleted'] ==1){
                    $this->Session->setFlash("Please contact 'admin@gmail.com'.");
                }else{
                     $this->Session->setFlash('Please verify your email.');
                    
                }
            } else {
                $this->Session->setFlash('Please enter correct email and password.');
            }
        }
    }
    
    

    function listing2() {
        $this->layout = 'main_layout';

        $users = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->User('id'))));

        $this->set(compact('users'));
    }
    

    function logout() {
        $this->Session->setFlash('You have successfully logout.', 'default', array('class' => 'successmessage'));
        $this->redirect($this->Auth->logout());
    }
    
    

    function checkEmail() {

        $this->autoRender = false;

        $email = $_POST['username'];

        $count = $this->User->find('count', array('conditions' => array('User.username' => $email)));

        if ($count == 0) {
            echo "true";
            exit;
        } else {
            echo "false";
            exit;
        }
        // pr($count);exit;
    }
    


    function signups() {
        
        $this->autoRender = false;
       
        if (!empty($this->request->data)) {

            $forgotRandStr = $this->getrandomstr();
            
            if($this->request->data['User']['user_type'] == 'listing'){
                
                $this->request->data['User']['username'] = $this->request->data['useremail'];
                 $email = $this->request->data['useremail'];
                 
                 $data1['ListingDetail']['company_name'] = $this->request->data['User']['company_name'];
 
            } else {
                
               $this->request->data['User']['username'] = $this->request->data['username'];   
                 $email = $this->request->data['username'];
            }

            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
            
            $this->request->data['User']['forgot_str'] = $forgotRandStr;
            // code for send email
            $name = $this->request->data['User']['first_name'] . " " . $this->request->data['User']['last_name'];

           

            $from = $email;
            
            $subject = "Gfund Verification mail";
            /// $resultnew = $this->Common->sendMail($email, $from, $subject, $message);

            require_once( WWW_ROOT . 'PHPmailer/class.phpmailer.php' );

            $message = "
                 <p> Hi" . "  " . $name . ", </p>
                 <p> Thank you for registering on Gfund.</p>
                 <p>Please  <a href=" . SITEPATH . "users/verify/" . $forgotRandStr . "/" . ">Click Here</a> activate your Profile on Gfund  </p>
                 <p>Thanks </p>
                 <p>Gfund Staff</p>";

            // echo $body; die;
            $to = 'admin@gfund.com';

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom($to, 'Gfund');

            $mail->AddReplyTo($to, "Gfund");
            
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->AddAddress(trim($email));

            $mail->AddAddress(trim($email));

            if (!$mail->Send()) {
                
                echo $mail->ErrorInfo;
                
            } else {
                
                if ($this->User->save($this->request->data)) {
  
                   $LastUserId = $this->User->getLastInsertId();
                   
                   $data1['ListingDetail']['user_id'] = $LastUserId;
                   
                   $this->ListingDetail->save($data1);
                    
                    $this->Session->setFlash('You have successfully registered, Please check your email.', 'default', array('class' => 'successmessage'));
                    
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }               
            }
            // end  code for send email
        }
    }

    /*
     * verify @ used to verify User
     * Created On : 16-4-2015
     * Created By : Nishtha
     */

    function verify($str = null) {
        $this->autoRender = false;

        $update = $this->User->updateAll(array('User.is_verified' => 1), array('User.forgot_str' => $str));

        if ($update) {
            $this->Session->setFlash('You have successfully activated your profile via email,Please log in to the system.', 
                    'default', array('class' => 'successmessage'));
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

    /*
     * edit_investor_profile @ used to edit listing partner
     * Created On : 30-3-2015
     * Created By : Abdur
     */

    function edit_listing_partner() {
        $this->layout = 'listing_layout';
        $id = $this->Auth->user('id');
        if (!empty($this->request->data)) {
            $this->User->id = $this->Auth->user('id');
            if ($this->User->save($this->request->data)) {
                $this->redirect(array('controller' => 'listings', 'action' => 'listing'));
            }
        } else {

            $users = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            //pr($users);exit; 
            $this->set('users', $users);
        }
    }

    /*
     * change_investor_password @ used to change_password
     * Created On : 01-04-2015
     * Created By : Abdur
     */

    function change_password() {
        $this->layout = 'main_layout';

        if (!empty($this->request->data)) {

            $user_id = $this->Auth->user('id');

            $old = $this->request->data['User']['password_old'];


            $old_password = $this->Auth->password($old);

            $check_password = $this->User->find('first', array('conditions' => array('User.id' => $user_id, 'User.password' => $old_password), 'fields' => array('User.password')));

            $new_pass_gen = $this->request->data['User']['password_new'];

            $new_pass = $this->Auth->password($new_pass_gen);
//pr($new_pass);exit;
            if (!empty($check_password)) {

                $new = $this->request->data['User']['password_new'];

                $re_type_new = $this->request->data['User']['password_confirm'];

                if (!empty($new) && !empty($re_type_new)) {
                    if ($new == $re_type_new) {

                        $this->request->data['User']['password'] = $new_pass;

                        $this->User->id = $user_id;

                        if ($this->User->save($this->request->data)) {
                            $password_change_successfully = __('password_change_successfully', true);
                            $this->Session->setFlash(__($password_change_successfully, true));
                            $this->redirect($this->referer());
                        }
                    }
                }
            } else {
                $sorry_your_old_password_is_incorrect = __('sorry_your_old_password_is_incorrect', true);
                $this->Session->setFlash(__($sorry_your_old_password_is_incorrect, true));
            }
        }
    }

    /*
     * forgot_password @ used to forgotpassword
     * Created On : 31-3-2015
     * Created By : Abdur
     */

    function forgot_password() {
        $this->layout = 'main_layout';

        if (!empty($this->request->data)) {

            $email = $this->request->data['User']['username'];
            
            $userinfo = $this->User->find('first', array('conditions' => array('User.username' => $email)));

            $usercount = $this->User->find('count', array('condition' => array('User.username' => $email)));

            if ($usercount == 0) {
                $this->Session->setFlash('Please enter correct email id.');
                $this->redirect($this->referer());
            }

            $forgotRandStr = $this->getrandomstr();
            
             require_once( WWW_ROOT . 'PHPmailer/class.phpmailer.php' );

            
             $body = "
                 <p> Hi" . "  " . $email . ", </p>
                <p>Please<a href=" . SITEPATH . "users/forgot_set_password" . "/" . $forgotRandStr . ">Click Here</a> to Change your Password  </p>
                <p>For any assistance or queries you can contact support@gfund.com  </p>
                <p>Regards,  </p>
                <p>Gfund</p>";

//            // echo $body; die;
            $to = $email;
                        

            $mail = new PHPMailer();

            $mail->IsHTML(true);

            $mail->SetFrom('sweety224455@gmail.com', 'Gfund');

            $mail->AddReplyTo("sweety224455@gmail.com","Gfund");
            
            $address = $email;
            $mail->AddAddress($address, "Gfund");
            
            $mail->Subject = "Please change your password";
           
            $mail->MsgHTML($body);
            
             if (!$mail->Send()) {
                
                 echo $mail->ErrorInfo; die;
                $this->Session->setFlash('There was an error while sending mail regarding mail.', 'default', array('class' => 'errormessage'));
               
            } else {
                
                // echo "Message sent!";
                
                $userDetails = $this->User->find('first', array(
                    'conditions' => array(
                        'User.username' => $email
                    )
                ));
   
               $update =  $this->User->updateAll(array('User.forgot_str' =>"'$forgotRandStr'"), array('User.id' => $userDetails['User']['id']));
               
                $this->Session->setFlash('A mail has been send on your email. Please check your email and set your new password.', 'default', array('class' => 'successmessage'));
                $this->redirect(array('controller' => 'users', 'action' => 'forgot_password'));                
            }
        }
    }
    
    
    

    function forgot_set_password($forgotRandStr = NULL) {
        
        $this->layout = 'main_layout';
        
        $userDetails = $this->User->find('first', array(
            'conditions' => array(
                //'User.id' => $userId,
                'User.forgot_str' => $forgotRandStr
            )
        ));

        $this->set(compact('userDetails'));

        if (!empty($this->request->data)) {

            $pass = $this->Auth->password($this->request->data['User']['password']);

            $updated = $this->User->updateAll(array('User.password' => "'$pass'"), array('User.id' =>$userDetails['User']['id']));

            if ($updated) {
                $this->Session->setFlash('You Have Successfully Changed your password', 'default', array('class' => 'success'));
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            } else {
                $this->Session->setFlash('Password is not changed .Please try again.', 'default', array('class' => 'errorsmessage'));
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }
        }
    }

    
    
    function getrandomstr() {
        $length = 10;
        $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
        $string = "";

        for ($p = 0; $p < $length; $p++) {
            @$string .= $characters[mt_rand(0, strlen($characters))];
        }

        return $string;
    }
    
    

    function investments() {
        $this->layout = 'main_layout';
    }
    
    

    function propertydetails() {
        $this->layout = 'main_layout';
    }  
    
  /*
   * checkOldPassword @ Function used to check wheather the old password correct or not
   * Request : OldPass
   * Response : Yes OR NO
   */ 
    
    function checkOldPassword(){
      $oldPassword = $this->request->data['oldPassword']; 
      
       $userDetail = $this->User->find('first' , array('conditions' =>array('User.id' =>$this->Auth->user('id'))));
      
       $userOldPass = $this->Auth->password($oldPassword);
       
       if($userDetail['User']['password'] == $userOldPass){
           echo 0;
           exit;
       } else {
           echo "Please enter correct old password.";
           exit;  
       }  
    }
    
    
    /*
     * admin_login @ function used bussiness logic of admin login
     */
    
    function admin_login(){
        $this->layout='admin_layout';
        
        if(!empty($this->request->data)){
           
            if($this->Auth->login()){
             
              $this->redirect(array('controller' => 'users', 'action' => 'admin_dashboard'));  
             }else{
                $this->Session->setFlash('Please enter correct email-id and password.');
                $this->redirect(array('controller' => 'users', 'action' => 'admin_login'));  
            }           
        }  
    }
    
    
   /*
     * admin_dashboard @ function used bussiness logic of admin dashboard
     */
    
    function admin_dashboard(){
        $this->layout='admin';
        
        $countInvestor = $this->User->find('count' , array('conditions' =>array('User.user_type' =>'investor')));
         // echo $countInvestor; 
        $countListing = $this->User->find('count' , array('conditions' =>array('User.user_type' =>'listing')));
        
        $countProject = $this->BasicsDetail->find('count');
        
        $totalOfferingAmount = $this->BasicsDetail->find('all', array(
                                'fields' => array('SUM(replace(BasicsDetail.offering_amount, ",", "")) as total_sum'
                                        )
                                    )
                                );
        
        
        $amount = $totalOfferingAmount[0][0]['total_sum'];
        
        
        $totalProjectedReturn = $this->BasicsDetail->find('all', array(
                                'fields' => array('SUM(BasicsDetail.projected_return) as total_return'
                                        )
                                    )
                                );
        
        
        $totalReturn = $totalProjectedReturn[0][0]['total_return'];
        
         // Calculation For Projected Return Value
       $allProjects = $this->Investment->find('all', array(
                        'joins' => array(
                            array(
                                'table' => 'basics_details',
                                'alias' => 'BasicsDetail',
                                'type' => 'left',
                                'conditions' => array('BasicsDetail.id = Investment.project_id',                                     
                                 )
                            )
                        ),
//                        'conditions' =>array('Investment.date BETWEEN ? and ?' =>array(date('Y') . '-01-01',
//                                       date('Y') . '-12-31'),
//                                      'Investment.user_id' => $user_id),
                        'fields' => array('BasicsDetail.id', 'BasicsDetail.project_name', 'BasicsDetail.offering_amount' , 'BasicsDetail.projected_return',
                                          'Investment.project_id' ,'Investment.user_id','Investment.shares','Investment.amount'),
                       // 'group' => 'Investment.project_id'
                  )
              );
      
       
      // pr($allProjects); die;
       
        $project_name = '';
        $project = '';
        $projectReturnGraph = '';
        $totalPlatform = array();
        $projected_return = array();
        
        $totalProjects = count($allProjects);
        
        foreach($allProjects as $projects) {  //pr($projects);

//            $Investment = $this->Investment->find('all', array('conditions' => 
//                            array('Investment.project_id' => $projects['BasicsDetail']['id']
//                               )
//                            )
//                           );

              //pr($Investment); die;
            $InvestAmount = $projects['Investment']['amount'];

             //Projected Return
              $offeringAmount = preg_replace('/[.,]/', '', $projects['BasicsDetail']['offering_amount']);

             $percent = $InvestAmount*$projects['BasicsDetail']['projected_return'];
           
             $projected_return[] = ( preg_replace('/[.,]/', '', $percent) / 100 ) ;

             // Total Platform Return
               $totalPlatform[] = $projects['BasicsDetail']['projected_return'];  
        }
        
          $projectedReturn = number_format( $totalReturn / $countProject, 2 ) ;
      
      
        // END code for Projected Return
        
        
      // previous investment income 
        //$totalInvestmentIncome = array_sum($projected_return);
     
        //$totalPlatformReturn = array_sum($totalPlatform);
      // end previous investment income 
       
       $totalValue = $amount*$projectedReturn;
       
       $totalInvestmentIncome = number_format( $totalValue / 100, 2 );
        
    
        $this->set(compact('countInvestor','countListing','countProject','totalOfferingAmount',
                      'totalInvestmentIncome','totalProjected','projectedReturn'));
    }  
    
     /*
     * admin_project_list @ function used bussiness logic of admin dashboard
     */
    
    function admin_project_list(){
        $this->layout='admin';
        
      $this->BasicsDetail->bindModel(
                array('belongsTo' => array(
                        'User' => array(
                            'className' => 'User'
                        )
                    )
                )
            );  
        
        
       $order = array('BasicsDetail.created' =>'DESC');
      // $conditions = array('BasicsDetail.is_deleted' =>0);
       
        $this->paginate = array(
         //   'conditions' =>$conditions,
            'order' => $order,
            'limit' => 10
        );
      
        $userProjectDetails = $this->paginate('BasicsDetail');
       
      $this->set(compact('userProjectDetails')); 
  } 
  
  
   /*
     * admin_delete_project @ function used delete project
     */
    
    function admin_delete_project($pId=null){
        $this->autoRender= false;
        
       $delete = $this->BasicsDetail->delete(array('BasicsDetail.id' => $pId));
        
        $this->CapitalStructureContent->deleteAll(array('CapitalStructureContent.project_id' => $pId));
        
        $this->CapitalStructure->deleteAll(array('CapitalStructure.project_id' => $pId));
        
        $this->ListingPartner->deleteAll(array('ListingPartner.project_id' => $pId));
        
        $this->ListingPartnerContent->deleteAll(array('ListingPartnerContent.project_id' => $pId));
        
        $this->Document->deleteAll(array('Document.project_id' => $pId));
        
        $this->DocumentContent->deleteAll(array('DocumentContent.project_id' => $pId));
        
        if($delete){
              $this->Session->setFlash('You have successfully deleted the project.');
              $this->redirect(array('controller' => 'users', 'action' => 'admin_project_list'));  
        } 
    }  
  
  
   /*
     * admin_logout @ function used logout
     */
  function admin_logout(){    
      
     $this->Session->setFlash('You have successfully logout.', 'default', array('class' => 'successmessage')); 
     $this->redirect($this->Auth->logout());
  }
    
    
    
    /*
    * admin_active @ function used to active project
    */
  function admin_active_project($pId=null,$status=null){
      $this->autoRender=false;
      
    if($status ==0){
        $st = 1;
    }else{
       $st = 0; 
    } 
      
     $updated = $this->BasicsDetail->updateAll(array('BasicsDetail.is_deleted' => "'$st'"),
                   array('BasicsDetail.id' => $pId));
     
     $this->redirect(array('controller' => 'users', 'action' => 'admin_project_list')); 
  }
        
    
    
   /*
    * admin_project_view @ function used  to view project
    */
  function admin_project_view($projectId=null){
      $this->layout='admin';
      
      $Ids = array(0,$projectId);
      
      $projects = $this->BasicsDetail->find('first',array('conditions' =>array(
                     'BasicsDetail.project_id' =>$projectId   
                    )));
       
       $optionsListing = array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_listing_partner_contents',
                        'alias' => 'ListingPartnerContent',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('ListingPartnerContent.id = ListingPartner.content_id')
                    )            
                  )  
          );
        
       $optionsListing['group'] = array('ListingPartnerContent.id');
       
       $optionsListing['conditions'] = array('ListingPartner.project_id' =>$Ids);
       
       $optionsListing['fields'] = array('ListingPartnerContent.id', 'ListingPartnerContent.contents','ListingPartnerContent.created_by',
                                         'ListingPartnerContent.project_id','ListingPartner.id','ListingPartner.project_id',
                                         'ListingPartner.content_id','ListingPartner.content_value');
      
      
      $listingPartners = $this->ListingPartner->find('all',$optionsListing);
      
      $optionsDocument = array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_document_contents',
                        'alias' => 'DocumentContent',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('DocumentContent.id = Document.content_id')
                    )            
                  )  
          );
        
       
       
       $optionsDocument['conditions'] = array('Document.project_id' =>$Ids);
       
       $optionsDocument['group'] = array('DocumentContent.id');
       
       $optionsDocument['fields'] = array('DocumentContent.id', 'DocumentContent.contents','DocumentContent.created_by',
                                         'DocumentContent.project_id','Document.id','Document.project_id',
                                         'Document.content_id','Document.content_value');
      
      
      $Documents = $this->Document->find('all',$optionsDocument);
    
     $this->set(compact('projects' ,'Documents' , 'listingPartners')); 
  }  
  
  
  
     /*
     * admin_download @ function used to download 
     * Created By : Nishtha
     * Created On  : 16 April 2015
     */
    function admin_download($file_name,$folder) {

        $this->viewClass = 'Media';
        $params = array(
            'id' => $file_name,
            'name' => $file_name,
            'download' => true,
            'extension' => 'rar',
            'path' => 'img/'.$folder . DS
        );
        $this->set($params);
    }
    
    
    
    
    function success(){
      $this->layout = 'main_layout';  
      
    }
    
    
    
     function admin_investor_list(){
      $this->layout = 'admin'; 

              
       $order = array('User.created' =>'DESC');
       $conditions = array('user_type' =>'investor','user_type !=' =>'admin');
       
        $this->paginate = array(
            'conditions' =>$conditions,
            'order' => $order,
            'limit' => 10
        );
      
        $userLists = $this->paginate('User');
      
      $this->set(compact('userLists'));
     
    }
    
    function admin_listing_list(){
      $this->layout = 'admin'; 
   
       $order = array('User.created' =>'DESC');
       $conditions = array('user_type' =>'listing','user_type !=' =>'admin');
       
        $this->paginate = array(
            'conditions' =>$conditions,
            'order' => $order,
            'limit' => 10
        );
      
        $userLists = $this->paginate('User');
      
      $this->set(compact('userLists'));
     
    }
    
    
    function admin_investor_inactive_user($uId=null){
     // $this->layout = 'admin'; 

     $updated = $this->User->updateAll(array('User.is_deleted' => "1"),
                   array('User.id' => $uId));
     
     if($updated){
       $this->redirect(array('controller' => 'users', 'action' => 'admin_investor_list')); 
     }   
    }
    
    
    
    function admin_listing_inactive_user($uId=null){
     // $this->layout = 'admin'; 

     $updated = $this->User->updateAll(array('User.is_deleted' => "1"),
                   array('User.id' => $uId));
     
     if($updated){
       $this->redirect(array('controller' => 'users', 'action' => 'admin_listing_list')); 
     } 
    }
    
    
   function admin_investor_active_user($uId=null){
     $updated = $this->User->updateAll(array('User.is_deleted' => "0"),
                   array('User.id' => $uId));
     
     if($updated){
       $this->redirect(array('controller' => 'users', 'action' => 'admin_investor_list')); 
     }  
    }  
    
    
  function admin_listing_active_user($uId=null){
     $updated = $this->User->updateAll(array('User.is_deleted' => "0"),
                   array('User.id' => $uId));
     
     if($updated){
       $this->redirect(array('controller' => 'users', 'action' => 'admin_listing_list')); 
     }  
    }  
    
    
   function admin_investor_delete_user($uId=null){
     // $this->layout = 'admin'; 

        $delete = $this->User->delete(array('User.id' => $uId));

        if($delete){
          $this->Session->setFlash('You have successfully deleted the User.'); 
          $this->redirect(array('controller' => 'users', 'action' => 'admin_investor_list')); 
        }     
    }  
    
    
    
   function admin_listing_delete_user($uId=null){
        $delete = $this->User->delete(array('User.id' => $uId));
        if($delete){
          $this->Session->setFlash('You have successfully deleted the User.'); 
          $this->redirect(array('controller' => 'users', 'action' => 'admin_listing_list')); 
        }     
    }  
    
      
   function admin_getListingDetail(){
       $Id = $this->params['named']['to_id'];
  
        $listingDetail = $this->ListingDetail->find('first', array('conditions' => array('ListingDetail.user_id' => $Id),
                         'fields' =>array('ListingDetail.id', 'ListingDetail.company_name')
                      ));
        
       return $listingDetail; 
 }
    
    
    function admin_allow_investment($UID=null){
        $updated = $this->User->updateAll(array('User.finance4' => '"on"'),
                   array('User.id' => $UID));
     
        if($updated){
          $this->redirect(array('controller' => 'users', 'action' => 'admin_investor_list')); 
        }            
    }
    
    
   function admin_not_allow_invest($UID=null){
        $updated = $this->User->updateAll(array('User.finance4' =>"null"),
                   array('User.id' => $UID));
        // pr($updated); die;
        if($updated){
          $this->redirect(array('controller' => 'users', 'action' => 'admin_investor_list')); 
        }    
        
    }
    
    
    
   function admin_project_investors($projectId){
      $this->layout = 'admin';
      
      $InvestorsList = $this->Investment->find('all', array(
                        'joins' => array(
                            array(
                                'table' => 'basics_details',
                                'alias' => 'BasicDetails',
                                'type' => 'LEFT',
                                'conditions' => array(
                                'BasicDetails.id = Investment.project_id'
                                )
                            ),

                            array(
                                'table' => 'users',
                                'alias' => 'User',
                                'type' => 'LEFT',
                                'conditions' => array(
                                'User.id = Investment.user_id'
                                )
                            )
                        ),
                        'conditions' => array(
                             'Investment.project_id' =>$projectId
                        ),
                        'fields' => array('BasicDetails.*','Investment.*','User.*')
                    )); 
          // pr($InvestorsList); die;
           $this->set(compact('InvestorsList'));    
   }
   
   
   function user_detail($uID){
     
       $userDetail = $this->User->find('first' , array('conditions' =>array('User.id' =>$uID)));
       
      $this->set(compact('userDetail'));  
   }
   
   
   function user_listing_detail($uID){
       
      $userDetail = $this->User->find('first' , array('conditions' =>array('User.id' =>$uID)));
      
      $listingDetail = $this->ListingDetail->find('first' , array('conditions' =>array('ListingDetail.user_id' =>$uID)));
       
      $this->set(compact('userDetail','listingDetail'));     
   }
  
  
    
    
    
    
}