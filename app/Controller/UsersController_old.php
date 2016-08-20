<?php
Class UsersController extends AppController {

    var $uses = array('User');
    
    
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {

        $this->Auth->allow('verified_user','checkEmail');
    }
    
    
    
    function login() {
        $this->layout = 'main_layout';
        if (!empty($this->request->data)) {

            if ($this->Auth->login()) {

                if ($_SESSION['Auth']['User']['user_type'] == 'investor' && $_SESSION['Auth']['User']['is_verified']==1) {
                    $this->redirect(array('controller' => 'investments', 'action' => 'investor'));
                } else if ($_SESSION['Auth']['User']['user_type'] == 'listing' &&  $_SESSION['Auth']['User']['is_verified']==1) {
                    $this->redirect(array('controller' => 'listings', 'action' => 'listing'));
                }else{
                   $this->Session->setFlash('Please verify your email.');
                }
            } else {
                $this->Session->setFlash('Please enter correct username and password.');
            }
        }
    }

    function listing2() {
        $this->layout = 'main_layout';

        $users = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->User('id'))));

        $this->set(compact('users'));
    }

    function logout() {

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
  }
    
  /*
   * Investor SignUP
   */
  
  function signups(){
       $this->layout='main_layout';

       if(!empty($this->request->data)){
         pr($this->request->data); die;
            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
            $email =  $this->request->data['User']['username'];
            
            $forgotRandStr = $this->getrandomstr();
            App::uses('CakeEmail', 'Network/Email');

            $Email = new CakeEmail();
            $Email->from(array('admin@gfund.com' => 'gfund'));
            $Email->to($email);
            $Email->subject(' Verify Your Email');
            $message = "   
            </p>        
                <p>Please<a href=" . SITEPATH . "users/verified_user" . "/" . $forgotRandStr . ">Click Here</a> to verify email  </p>
                <p>For any assistance or queries you can contact support@gfund.com  </p>
                <p>Regards,  </p>
                <p>Gfund Team</p>";

            $Email->emailFormat('both'); 
            
            if ($Email->send($message)) {
            
                $this->request->data['User']['forgot_str'] = $forgotRandStr;
                if($this->User->save($this->request->data)){
                    $this->Session->setFlash('You have successfully registered, Please check your email.', 'default', array('class' => 'successmessage'));
                    $this->redirect(array('controller'=>'users','action'=>'login'));
                }
            }
        }
  }
  
   /*
   * edit_investor_profile @ used to edit listing partner
   * Created On : 30-3-2015
   * Created By : Abdur
    */   
  
  
  function verified_user($str=null){
      $this->autoRender=false;
      
    $update = $this->User->updateAll(array('User.is_verified' =>1), array('User.forgot_str' => $str));
      
    if($update){
      $this->Session->setFlash('Email verified successfully.', 'default', array('class' => 'successmessage'));
      $this->redirect(array('controller'=>'users','action'=>'login'));  
    }
    
  }
  

  /*
   * edit_investor_profile @ used to edit listing partner
   * Created On : 30-3-2015
   * Created By : Abdur
    */   
   function edit_listing_partner(){
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
            App::uses('CakeEmail', 'Network/Email');

            $Email = new CakeEmail();
            $Email->from(array('admin@gfund.com' => 'gfund'));
            $Email->to($email);
            $Email->subject(' Please change your password');
            $message = "
                
            </p>
                
                <p>Please<a href=" . SITEPATH . "users/forgot_set_password" . "/" . $forgotRandStr . ">Click Here</a> to Change your Password  </p>
                <p>For any assistance or queries you can contact support@tcd.com  </p>
                <p>Regards,  </p>
                <p>Tcd Team</p>";

            $Email->emailFormat('both');

            if ($Email->send($message)) {
                $userDetails = $this->User->find('first', array(
                    'conditions' => array(
                        'User.username' => $email
                    )
                ));
                //pr($userDetails);exit;
                $datafor['User']['forgot_str'] = $forgotRandStr;
                $this->User->id = $userDetails['User']['id'];
                $this->User->save($datafor);
                $this->Session->setFlash('A mail has been send on your email. Please check your email and set your new password.', 'default', array('class' => 'successmessage'));
                $this->redirect(array('controller' => 'users', 'action' => 'forgot_set_password/' . $forgotRandStr));
            } else {

                $this->Session->setFlash('There was an error while sending mail regarding mail.', 'default', array('class' => 'errormessage'));
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
//           pr($this->request->data);exit;
            $pass = $this->Auth->password($this->request->data['User']['password']);

//$datafor['User']['forgot_str'] = '';
            $updated = $this->User->updateAll(array('User.password' => "'$pass'"), array('User.id' => $this->request->data['User']['id']));

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
    
    
    
    function investments(){
     $this->layout = 'main_layout';  
    }
    
    
    
    
    function propertydetails(){
        $this->layout='main_layout';
    }
    
    
    
    
    
}