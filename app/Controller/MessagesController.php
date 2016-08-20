<?php

Class MessagesController extends AppController {

    var $uses = array('Message', 'User','MessageUser');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {

        $this->Auth->allow();
    }
    
    
    
    function search_name($keyword = null) {
        $this->layout = '';
        
        $user_type = $this->Auth->user('user_type');
        
        $keyword = $this->request->data['keyword'];
        
        if($user_type =='investor'){
            $names = $this->User->find('all', array('conditions' => array(
                        'User.first_name LIKE' => '%' . $keyword . '%',
                        'User.user_type' =>'admin'
                       ))
                     );  
        }else{
            $names = $this->User->find('all', array('conditions' => array(
                    'User.first_name LIKE' => '%' . $keyword . '%'
                ))
            );
        }
        // pr($tags); exit;
        $this->set(compact('names'));
   }

  /*
   * invest_message_list@ List Inbox for invester
   * Request : Null
   * Response : Array
   * Created : 30 june 2015 
   */
    function invest_message_list() {

        $this->layout = 'investor_layout';

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ) 
        );

        $options['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                       'MessageUser.is_deleted' =>0,
                                       'NOT' => array('MessageUser.created_by' => array($this->Auth->user('id'))));

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted' );

        $options['order'] = array('MessageUser.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
         // pr($messages); exit;
        
        $this->set(compact('messages'));
    }
    
    
     function listing_message_list() {

        $this->layout = 'listing_layout';
        

          $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
            array(
                'table' => 'users',
                'alias' => 'Sender',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.sender_id = Sender.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                'MessageUser.is_deleted' =>0,
                               'NOT' => array('MessageUser.created_by' => array($this->Auth->user('id'))));

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Sender.first_name' ,'Sender.last_name' ,'Sender.username' );

        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
        
        // pr($messages); die;
        $this->set(compact('messages'));
    }
    
    
    

 
    function invest_send_message() {
        $this->autoRender = false;

        if (!empty($this->request->data)) {

            $receiverName = $this->request->data['Message']['username'];
            
            $receiverName = explode(";", $receiverName);
            $userDetail = $this->User->find('first', array('conditions' => array('User.username' => $receiverName[0])));

            $senderId = $this->Auth->user('id');
            
            $receiverId = $userDetail['User']['id'];
            
            $data['Message']['sender_id'] = $this->Auth->user('id');
            $data['Message']['receiver_id'] = $userDetail['User']['id'];
            $data['Message']['subject'] = $this->request->data['Message']['subject'];
            $data['Message']['message'] = $this->request->data['Message']['message'];

            if ($this->Message->save($data)) {
                $messageId = $this->Message->getLastInsertId();
                
                $messageUsers = array($senderId ,$receiverId);
              //  pr($messageUsers); exit;
                foreach($messageUsers as $user){  
                    $data1['MessageUser']['message_id'] = $messageId;
                    $data1['MessageUser']['user_id'] = $user;
                    $data1['MessageUser']['created_by'] = $senderId;
                    $this->MessageUser->create();
                    $this->MessageUser->save($data1);
                }
                echo 1;
                exit;
            }
        }
    }

    

    function listing_send_message() {
        $this->autoRender = false;

        if (!empty($this->request->data)) {
         
           $receiverName = $this->request->data['Message']['username'];
             
           $user = explode(";",$receiverName);
            
           $receiverName = $user[0]; 
           
            $userDetail = $this->User->find('first', array('conditions' => array('User.username' => $receiverName)));

            $senderId = $this->Auth->user('id');
            
            $receiverId = $userDetail['User']['id'];
         
            $data['Message']['sender_id'] = $this->Auth->user('id');
            $data['Message']['receiver_id'] = $userDetail['User']['id'];
            $data['Message']['subject'] = $this->request->data['Message']['subject'];
            $data['Message']['message'] = $this->request->data['Message']['message'];
             //pr($data); die;
            if ($this->Message->save($data)) {
                
                $messageId = $this->Message->getLastInsertId();
                
                $messageUsers = array($senderId ,$receiverId);
                 //  pr($messageUsers); exit;
                foreach($messageUsers as $user){  
                    $data1['MessageUser']['message_id'] = $messageId;
                    $data1['MessageUser']['user_id'] = $user;
                    $data1['MessageUser']['created_by'] = $senderId;
                    $this->MessageUser->create();
                    $this->MessageUser->save($data1);
                }
                
                $this->Session->setFlash('Message send successfully.');
                $this->redirect(array('controller' => 'messages', 'action' => 'listing_message_list'));
            }
        }
    }
    
    

    function listing_view_message($mid = null) {
        $this->layout = 'listing_layout';

        $UserName = $this->Auth->user('first_name');

        $update = $this->MessageUser->updateAll(array('MessageUser.is_read' => "1"),
                   array('MessageUser.id' => $mid
                    ));

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ),
            array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.sender_id = Receiver.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.id' => $mid);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');


        $messageDetail = $this->MessageUser->find('first', $options);
            //  pr($messageDetail); 
       $this->set(compact('messageDetail', 'UserName'));
   }


    function invest_view_message($mid = null) {
       // $this->layout = 'investor_layout';

        $mid = $this->request->data['message_id'];
        
        $UserName = $this->Auth->user('first_name');

        $update = $this->MessageUser->updateAll(array('MessageUser.is_read' => "1"),
                   array('MessageUser.id' => $mid,
                       'MessageUser.user_id' => $this->Auth->user('id')
                    ));

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
            array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.sender_id = Receiver.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.id' => $mid);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted' ,'Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');

         
         
      

        $messageDetail = $this->MessageUser->find('first', $options);
              //pr($messageDetail); 
            $this->set(compact('messageDetail', 'UserName'));
    }
    
    

    function invest_sent_message() {
     //  $this->layout = 'investor_layout';

      $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
              array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.receiver_id = Receiver.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                       'MessageUser.created_by' => $this->Auth->user('id'),
                                       'MessageUser.is_deleted' => 0);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');

        $options['group'] = array('MessageUser.message_id'); 
         
        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
        //  pr($messages); die;
        $this->set(compact('messages'));
    }
    
    
    function listing_sent_message() {
     $this->layout = 'listing_layout';

      $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                       'MessageUser.created_by' => $this->Auth->user('id'),
                                       'MessageUser.is_deleted' => 0);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted');

        $options['group'] = array('MessageUser.message_id'); 
         
        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
       //  pr($messages); die;
        $this->set(compact('messages'));
    }  
    

    function invest_message_delete() {

        $mId = $this->request->data['message_id'];
        
        $update = $this->MessageUser->updateAll(array('MessageUser.is_deleted' => "1"),
                  array('MessageUser.id' => $mId));

        if ($update) {
            echo 1;
            exit;
//            $this->Session->setFlash('The conversation has been moved to the Trash.');
//          
//            $this->redirect(array('controller' => 'messages', 'action' => 'invest_message_list'));
            
        } else {
              echo 0;
               exit;
//            $this->Session->setFlash('Message has not been deleted successfully.');
//         
//            $this->redirect(array('controller' => 'messages', 'action' => 'invest_message_list'));
        }
    }
    
    
    
   function listing_message_delete($mId = null) {

        $update = $this->MessageUser->updateAll(array('MessageUser.is_deleted' => "1"),
                  array('MessageUser.id' => $mId));

        if ($update) {
            $this->Session->setFlash('The conversation has been moved to the Trash.');
            $this->redirect(array('controller' => 'messages', 'action' => 'listing_message_list'));
           // $this->redirect($this->request->here);
            
        } else {
            $this->Session->setFlash('Message has not been deleted successfully.');
            //$this->redirect($this->request->here);
            
            $this->redirect(array('controller' => 'messages', 'action' => 'listing_message_list'));
        }
    }   
    

    function invest_trash_list($mId = null) {

        $this->layout = 'investor_layout';

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
        );

         $options['conditions'] = array('MessageUser.is_deleted' => 1,
                                      'MessageUser.user_id' => $this->Auth->user('id'));

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted');

        $options['group'] = array('MessageUser.message_id'); 
         
        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
        
        $this->set(compact('messages'));
    }

    
    
    function listing_trash_list($mId = null) {

        $this->layout = 'listing_layout';

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
        );

         $options['conditions'] = array('MessageUser.is_deleted' => 1,
                                      'MessageUser.user_id' => $this->Auth->user('id'));

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted');

        $options['group'] = array('MessageUser.message_id'); 
         
        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
        
        $this->set(compact('messages'));
        
    }  
    
    

    function invest_sent_view_message($mid=null) {
      //$this->layout = 'investor_layout';
      $mid = $this->request->data['message_id'];
        
      $UserName = $this->Auth->user('first_name');

        $update = $this->MessageUser->updateAll(array('MessageUser.is_read' => "1"),
                   array('MessageUser.id' => $mid
                    ));

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ),
            array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.receiver_id = Receiver.id'
                )
            ) 
        );

        $options['conditions'] = array('MessageUser.id' => $mid);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');


        $messageDetail = $this->MessageUser->find('first', $options);
            //  pr($messageDetail);  die;
       $this->set(compact('messageDetail', 'UserName'));
    } 
    
    
    
     function listing_sent_view_message($mid = null) {
        $this->layout = 'listing_layout';

        $UserName = $this->Auth->user('first_name');

        $update = $this->MessageUser->updateAll(array('MessageUser.is_read' => "1"),
                   array('MessageUser.id' => $mid
                    ));

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ),
            array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.receiver_id = Receiver.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.id' => $mid);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');


        $messageDetail = $this->MessageUser->find('first', $options);
            //  pr($messageDetail); 
       $this->set(compact('messageDetail', 'UserName'));
   }

    
    
    
    
    
    function getToUser(){
       $Id = $this->params['named']['to_id'];
  //  echo $Id; die;
        $userDetail = $this->User->find('first', array('conditions' => array('User.id' => $Id),
                         'fields' =>array('User.id', 'User.first_name', 'User.last_name', 'User.username')
                      ));
       return $userDetail; 
    }
    
    
    // code to get invest inbox messages 
    
    function invest_view_inbox(){
      // Get Messages Content
       
          $mesg['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
            array(
                'table' => 'users',
                'alias' => 'Sender',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.sender_id = Sender.id'
                )
            ) 
        );

        $mesg['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                'MessageUser.is_deleted' =>0,
                               'NOT' => array('MessageUser.created_by' => array($this->Auth->user('id'))));

         $mesg['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Sender.first_name' ,'Sender.last_name' ,'Sender.username' );

        $mesg['order'] = array('Message.created' => 'DESC');
        
        $mesg['limit'] = array('5');

        $messages = $this->MessageUser->find('all', $mesg);
        
        $this->set(compact('messages'));
        
    }
    
 
    function admin_inbox(){
        
      $this->layout = 'admin';    
      
       $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
            array(
                'table' => 'users',
                'alias' => 'Sender',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.sender_id = Sender.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                  'MessageUser.is_deleted' =>0,
                                  'NOT' => array('MessageUser.created_by' => array($this->Auth->user('id'))));

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Sender.first_name' ,'Sender.last_name' ,'Sender.username' );

        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
        
        // pr($messages); die;
        $this->set(compact('messages'));    
    }
    
    
   function admin_view_message($mid = null) {
        $this->layout = 'admin';

        $UserName = $this->Auth->user('first_name');

        $update = $this->MessageUser->updateAll(array('MessageUser.is_read' => "1"),
                   array('MessageUser.id' => $mid
                    ));

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ),
            array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.sender_id = Receiver.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.id' => $mid);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');


        $messageDetail = $this->MessageUser->find('first', $options);
            //  pr($messageDetail); 
       $this->set(compact('messageDetail', 'UserName'));
    }
    
    
    function admin_send_message() {
       $this->layout = 'admin';
         
       $time = time();
         
        if (!empty($this->request->data)) {
            
            if(!empty($this->request->data['Message']['file']['name'])) {            
                $file_name = $time."_".$this->request->data['Message']['file']['name'];
                $file_size = $this->request->data['Message']['file']['size'];
                $file_tmp = $this->request->data['Message']['file']['tmp_name'];
                $file_type = $this->request->data['Message']['file']['type'];   
                
                $upload =  move_uploaded_file($file_tmp,IMAGEUPLOAD."/BasicDetail/".$file_name);
                
                if($upload){
                  $data['Message']['type'] = $file_name;                     
                }else{
                   $data['Message']['type'] = ""; 
                }                              
              } else {
                $data['Message']['type'] = "";
              }   
               
            $receiverName = $this->request->data['Message']['username'];
            
            $receiverName = explode(";", $receiverName);
            $userDetail = $this->User->find('first', array('conditions' => array('User.username' => $receiverName[0])));

            $senderId = $this->Auth->user('id');
            
            $receiverId = $userDetail['User']['id'];
            
            $data['Message']['sender_id'] = $this->Auth->user('id');
            $data['Message']['receiver_id'] = $userDetail['User']['id'];
            $data['Message']['subject'] = $this->request->data['Message']['subject'];
            $data['Message']['message'] = $this->request->data['Message']['message'];

            if ($this->Message->save($data)) {
                $messageId = $this->Message->getLastInsertId();
                
                $messageUsers = array($senderId ,$receiverId);
              //  pr($messageUsers); exit;
                foreach($messageUsers as $user){  
                    $data1['MessageUser']['message_id'] = $messageId;
                    $data1['MessageUser']['user_id'] = $user;
                    $data1['MessageUser']['created_by'] = $senderId;
                    $this->MessageUser->create();
                    $this->MessageUser->save($data1);
                }
                $this->Session->setFlash('Message successfully send.');
                $this->redirect(array('controller'=>'messages','action'=>'admin_inbox'));
            }
        }
    }
    
    
    
  function admin_compose(){
    $this->layout = 'admin';  
      
  }
  
  
  
  
   function admin_sent_message() {
     $this->layout = 'admin';

      $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.user_id' => $this->Auth->user('id'),
                                       'MessageUser.created_by' => $this->Auth->user('id'),
                                       'MessageUser.is_deleted' => 0);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted');

        $options['group'] = array('MessageUser.message_id'); 
         
        $options['order'] = array('Message.created' => 'DESC');

        $messages = $this->MessageUser->find('all', $options);
       //  pr($messages); die;
        $this->set(compact('messages'));
    }  
    
    
      
    function admin_getToUser(){
       $Id = $this->params['named']['to_id'];
  //  echo $Id; die;
        $userDetail = $this->User->find('first', array('conditions' => array('User.id' => $Id),
                         'fields' =>array('User.id', 'User.first_name', 'User.last_name', 'User.username')
                      ));
       return $userDetail; 
    }
    
    
    
  function admin_sent_view_message($mid = null) {
        $this->layout = 'admin';

        $UserName = $this->Auth->user('first_name');

        $update = $this->MessageUser->updateAll(array('MessageUser.is_read' => "1"),
                   array('MessageUser.id' => $mid
                    ));

        $options['joins'] = array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.user_id = User.id'
                )
            ),
            array(
                'table' => 'messages',
                'alias' => 'Message',
                'type' => 'LEFT',
                'conditions' => array(
                    'MessageUser.message_id = Message.id'
                )
            ),
            array(
                'table' => 'users',
                'alias' => 'Receiver',
                'type' => 'LEFT',
                'conditions' => array(
                    'Message.receiver_id = Receiver.id'
                )
            ), 
        );

        $options['conditions'] = array('MessageUser.id' => $mid);

         $options['fields'] = array('Message.id', 'Message.sender_id', 'Message.receiver_id', 'Message.is_read', 'Message.type',
                              'Message.subject', 'Message.message', 'Message.created', 'User.id', 'User.first_name', 'User.last_name',
                              'User.username','MessageUser.id','MessageUser.message_id' ,'MessageUser.user_id','MessageUser.is_read',
                              'MessageUser.is_deleted','Receiver.username','Receiver.id' ,'Receiver.first_name','Receiver.last_name');


        $messageDetail = $this->MessageUser->find('first', $options);
            //  pr($messageDetail); 
       $this->set(compact('messageDetail', 'UserName'));
   } 
   
   
   function download($fileName){
    $this->viewClass = 'Media';
    $params = array(
        'id' => $fileName,
        'name' => 'content',
        'download' => true,
        'extension' => 'rar',
        'path' => 'img' . DS.'BasicDetail'.DS
    );
    $this->set($params);  
 }
   
   

}