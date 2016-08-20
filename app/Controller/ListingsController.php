<?php
class ListingsController extends AppController {

    var $uses = array('BasicsDetail','CapitalStructure','CapitalStructureContent','Document','DocumentContent',
                       'ListingPartner','ListingPartnerContent','User','ListingDetail','ListingPortfolio');
  

    function beforeFilter() {

        $this->Auth->allow('countCapital');
    }


    
    function listing(){
       $this->layout='listing_layout'; 
       $userId =  $this->Auth->user('id');
       
       $users = $this->User->find('first', array('conditions' => array('User.id' =>$userId)));
    
         $options = array(
            'joins' =>
            array(
                array(
                    'table' => 'sds_gfund_listing_details',
                    'alias' => 'ListingDetail',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('ListingDetail.user_id = User.id')
                ),
            )
        );
  
      $options['conditions'] = array('User.id' =>$this->Auth->user('id'));
      
      $options['fields'] = array('User.id', 'User.first_name', 'User.last_name', 'User.username','User.profile_image',
                              'User.address1', 'User.address2', 'User.city', 'User.state', 'User.country',
                              'User.code',  'User.phone', 'User.states', 'User.company_description', 'User.website',
                              'ListingDetail.id', 'ListingDetail.company_name', 'ListingDetail.about_bio',
                              'ListingDetail.website','ListingDetail.upload_bio', 'ListingDetail.portfolio', 
                              'ListingDetail.executive_summary', 'ListingDetail.team_leadership');
      
      $users = $this->User->find('first', $options);
      
      // Portfolio Images
      
      $portfolios = $this->ListingPortfolio->find('all' , array('conditions' =>array('ListingPortfolio.user_id' =>$this->Auth->user('id'))));
      
     // pr($portfolios); 
      
      
      $projects = $this->BasicsDetail->find('all', array('conditions' => array(
                        'BasicsDetail.user_id' => $this->Auth->user('id')
                    ),
                    'order' => array('BasicsDetail.id DESC')
                ));
      
       $this->set(compact('users','portfolios','projects'));

    }
    
    
     /*
   * edit_investor_profile @ used to edit listing partner
   * Created On : 30-3-2015
   * Created By : Abdur
    */   
   function edit_listing_partner(){
      $this->layout = 'listing_layout';
     
      $timestamp = time();
    
      if(!empty($this->request->data)){
         
          
     $userDetail = $this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->User('id'))));
          
        if(!empty($this->request->data['User']['profile_image']['name'])){
           
            $imageName =  $timestamp.$this->request->data['User']['profile_image']['name'];

            $tmp_name = $this->request->data['User']['profile_image']['tmp_name'];

            $path  = IMAGEUPLOAD.'ListingPartnerProfile/'.$imageName;

            $upload = move_uploaded_file($tmp_name, $path);

            $data['User']['profile_image'] = $imageName;

        }else{
          $data['User']['profile_image'] = $userDetail['User']['profile_image'];    
        }
          
        
        if(!empty($this->request->data['User']['password'])){
            $data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
        } else{
          $data['User']['password'] = $userDetail['User']['password'];
        }
        
        $data['User']['city'] = $this->request->data['User']['city'];
          
        $data['User']['state'] = $this->request->data['User']['state'];
       
        $this->User->id = $this->Auth->user('id'); 
       
        $this->User->save($data);
        
        // code to update Listing Detail Table
        
        
        $userProfileDetail = $this->ListingDetail->find('first',array('conditions'=>array('ListingDetail.user_id'=>$this->Auth->User('id'))));

        
        $data1['ListingDetail']['company_name'] = $this->request->data['ListingDetail']['company_name'];
        $data1['ListingDetail']['about_bio'] = $this->request->data['ListingDetail']['about_bio'];

        
        // code to save User Bio
         if(!empty($this->request->data['ListingDetail']['bio_data']['name'])){
           
            $BioName =  $timestamp.$this->request->data['ListingDetail']['bio_data']['name'];

            $tmp_name = $this->request->data['ListingDetail']['bio_data']['tmp_name'];

            $path  = IMAGEUPLOAD.'ListingPartnerPortfolio/'.$BioName;

            $upload = move_uploaded_file($tmp_name, $path);

            $data1['ListingDetail']['upload_bio'] = $BioName;

        }else{
          $data1['ListingDetail']['upload_bio'] = $userProfileDetail['ListingDetail']['upload_bio'];    
        }
        
         // code to save User portfolio
        
         if(!empty($this->request->data['ListingDetail']['portfolio']['name'])){
           
            $BioName =  $timestamp.$this->request->data['ListingDetail']['portfolio']['name'];

            $tmp_name = $this->request->data['ListingDetail']['portfolio']['tmp_name'];

            $path  = IMAGEUPLOAD.'ListingPartnerPortfolio/'.$BioName;

            $upload = move_uploaded_file($tmp_name, $path);

            $data1['ListingDetail']['portfolio'] = $BioName;

        } else {
            
          $data1['ListingDetail']['portfolio'] = $userProfileDetail['ListingDetail']['portfolio'];    
          
        }
        
        // code for executive data
        
         if(!empty($this->request->data['ListingDetail']['executive']['name'])){
           
            $BioName =  $timestamp.$this->request->data['ListingDetail']['executive']['name'];

            $tmp_name = $this->request->data['ListingDetail']['executive']['tmp_name'];

            $path  = IMAGEUPLOAD.'ListingPartnerPortfolio/'.$BioName;

            $upload = move_uploaded_file($tmp_name, $path);

            $data1['ListingDetail']['executive_summary'] = $BioName;

        }else{
          $data1['ListingDetail']['executive_summary'] = $userProfileDetail['ListingDetail']['executive_summary'];    
        }
        
        
        // code for Team Leadership
        
         if(!empty($this->request->data['ListingDetail']['leadership']['name'])){
           
            $BioName =  $timestamp.$this->request->data['ListingDetail']['leadership']['name'];

            $tmp_name = $this->request->data['ListingDetail']['leadership']['tmp_name'];

            $path  = IMAGEUPLOAD.'ListingPartnerPortfolio/'.$BioName;

            $upload = move_uploaded_file($tmp_name, $path);

            $data1['ListingDetail']['team_leadership'] = $BioName;

        }else{
          $data1['ListingDetail']['team_leadership'] = $userProfileDetail['ListingDetail']['team_leadership'];    
        }  
        
        $data1['ListingDetail']['user_id'] = $this->Auth->user('id');
        
        if(!empty($userProfileDetail)){
        
           $this->ListingDetail->id = $userProfileDetail['ListingDetail']['id'];
        }
        
       if($this->ListingDetail->save($data1)){

          //$this->Session->setFlash('Listing Partner added successfully.');
          $this->redirect(array('controller' => 'listings', 'action' => 'listing'));
       }        
   }else{
       
        $userDetail = $this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->User('id'))));
        
        $userProfileDetail = $this->ListingDetail->find('first',array('conditions'=>array('ListingDetail.user_id'=>$this->Auth->User('id'))));
      //pr($userDetail);
        $this->set(compact('userDetail' ,'userProfileDetail'));
   } 
   
}
    
    
    
    
     /*
   * change_listing_password @ used to change_password1
   * Created On : 01-04-2015
   * Created By : Abdur
    */
    
    function change_password1(){
        $this->layout='listing_layout';
        if(!empty($this->request->data)){
           // $id=$this->request->data['User']['id'];
            $user_id=$this->Auth->user('id');
            $old= $this->request->data['User']['password_old'];
            $old_password=$this->Auth->password($old);
            $check_password = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id,'User.password'=>$old_password),'fields'=>array('User.password')));
            $new_pass_gen=$this->request->data['User']['password_new'];
            $new_pass=$this->Auth->password($new_pass_gen);
            
            if(!empty($check_password)){
                
                $new=$this->request->data['User']['password_new'];
                              
                $re_type_new=$this->request->data['User']['password_confirm'];
                
                if(!empty($new)&&!empty($re_type_new)){
                    
                    if($new==$re_type_new){
                        
                        $this->request->data['User']['password']=$new_pass;
                        
                        $this->User->id=$user_id;
                        
                     if($this->User->save($this->request->data)){
                         
                         $password_change_successfully=__('password_change_successfully',true);
                         $this->Session->setFlash(__($password_change_successfully, true));
                   $this->redirect($this->referer());
                     }
                    }
                }
            }  else {
               
                $sorry_your_old_password_is_incorrect = __('sorry_your_old_password_is_incorrect',true);
               $this->Session->setFlash(__($sorry_your_old_password_is_incorrect, true));
            }
        }
    }
    
    function thank_you(){
     $this->layout='listing_layout';
    }

    
      /*
     * add_property_detail @used to submit Property Detail
     * Created By : Nishtha
     * CReated On : 7April15
     */
      function add_property_detail(){
        $this->layout='listing_layout';
        
        $Id = $this->Auth->user('id');
        
        $Ids = array(0,$Id);
        
        // Code to get Listin g Partner 
        
        $options=array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_listing_partners',
                        'alias' => 'ListingPartner',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('ListingPartnerContent.id = ListingPartner.content_id')
                    )            
                  )  
          );
        
         $options['group'] = array('ListingPartnerContent.id');
        
         $options['fields'] = array('ListingPartnerContent.id', 'ListingPartnerContent.contents','ListingPartnerContent.created_by',
                                 'ListingPartner.id','ListingPartner.user_id', 'ListingPartner.content_id','ListingPartner.content_value');
        
         $options['conditions'] =  array('ListingPartnerContent.created_by' =>$Ids);
         
         $ListingPartners = $this->ListingPartnerContent->find('all', $options);
    
          // Code to get Document   
        $optionsDocument = array(             
            'joins' =>
              array(
                 array(
                    'table' => 'sds_gfund_documents',
                    'alias' => 'Document',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions'=> array('DocumentContent.id = Document.content_id')
                )            
              )  
          );
        
         $optionsDocument['fields'] = array('DocumentContent.id', 'DocumentContent.contents','DocumentContent.created_by',
                           'Document.id','Document.user_id', 'Document.content_id','Document.content_value');
        
         $optionsDocument['conditions'] =  array('DocumentContent.created_by' =>$Ids);
         
         $optionsDocument['group'] = array('DocumentContent.id');
         
         $Documents = $this->DocumentContent->find('all', $optionsDocument);
         
//     Code to get Capital Structure List
         
       $optionsCapital=array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_capital_structures',
                        'alias' => 'CapitalStructure',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('CapitalStructureContent.id = CapitalStructure.content_id')
                    )            
                  )  
          );
        
         $optionsCapital['fields'] = array('CapitalStructureContent.id', 'CapitalStructureContent.contents','CapitalStructureContent.created_by',
                           'CapitalStructure.id','CapitalStructure.user_id', 'CapitalStructure.content_id','CapitalStructure.content_value');
        
         $optionsCapital['conditions'] =  array('CapitalStructureContent.created_by' =>$Ids);
         
         $optionsCapital['group'] = array('CapitalStructureContent.id');
         
         $Capitals = $this->CapitalStructureContent->find('all', $optionsCapital);
         
          //pr($Capitals);
         // GET LISTING DETAIL 
         
          $linstingDetail = $this->ListingDetail->find('first' , array('conditions' =>array('ListingDetail.user_id' =>$this->Auth->user('id'))));
          
          $this->set(compact('ListingPartners','Documents','Capitals','linstingDetail'));
       
      
    }
    
   
    /*
     * listing_partner_content_add @used to upload Listing Partner Image
     * Created By : Nishtha
     * CReated On : 7April15
     */
    function add_listing_partner(){
        $this->autoRender=false;
         $timestamp = time();
 
        if(!empty($this->request->data)){
        $MaxId = $this->BasicsDetail->query("SELECT MAX(id) as max FROM `sds_gfund_basics_details`");
        
        $ProjectId = $MaxId[0][0]['max'] +1;   
            
         $data['ListingPartner']['content_id'] = $this->request->data['Listing']['content_id'];        
         $data['ListingPartner']['user_id'] = $this->Auth->user('id'); 
         $data['ListingPartner']['project_id'] = $ProjectId;
         
         if(!empty($_FILES['image']['name'])){
            $imageName =  $timestamp.$_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $path  = IMAGEUPLOAD.'ListingPartner/'.$imageName;
          
            $upload = move_uploaded_file($tmp_name, $path);
          
            if($upload){
               $data['ListingPartner']['content_value'] = $imageName;
            }else{
              $data['ListingPartner']['content_value'] = ''; 
            }
            
            if($this->ListingPartner->save($data)){
                echo 0;
                exit;
           }
         }
       }
    }
    
    
     /*
     * add_listing_partner_content @used to upload Listing Partner Content
     * Created By : Nishtha
     * CReated On : 7April15
     */
     function add_listing_partner_content() {
        $this->layout = '';
        $timestamp = time();
      
        $MaxId = $this->BasicsDetail->query("SELECT MAX(id) as max FROM `sds_gfund_basics_details`");
        
        $ProjectId = $MaxId[0][0]['max'] +1;
        
        if (!empty($this->request->data)) {

            $data1['ListingPartnerContent']['contents'] = $this->request->data['ListingContent']['content_name'];
            $data1['ListingPartnerContent']['created_by'] = $this->Auth->user('id');
            $data1['ListingPartnerContent']['project_id'] = $ProjectId;
            
            if ($this->ListingPartnerContent->save($data1)) {

                $ContentId = $this->ListingPartnerContent->getLastInsertID();
                $data['ListingPartner']['content_id'] = $ContentId;
                $data['ListingPartner']['user_id'] = $this->Auth->user('id');

                $data['ListingPartner']['project_id'] = $ProjectId;
                
                if (!empty($_FILES['listing_image']['name'])) {
                    $imageName = $timestamp . $_FILES['listing_image']['name'];
                    $tmp_name = $_FILES['listing_image']['tmp_name'];

                    $path = IMAGEUPLOAD .'ListingPartner/'. $imageName;

                    $upload = move_uploaded_file($tmp_name, $path);

                    if ($upload) {
                        $data['ListingPartner']['content_value'] = $imageName;
                    } else {
                        $data['ListingPartner']['content_value'] = '';
                    }
                  
                    if ($this->ListingPartner->save($data)) {                  
                       // $Ids = array(0,$ProjectId);
                        
                        $Ids = $this->ListingPartner->getLastInsertID();
                        
                        $contents = $this->ListingPartnerContent->find('all' , array('conditions' =>array(
                                     'ListingPartnerContent.id' =>$ContentId
                                )));
                        
                        $this->set(compact('contents'));
                    }
                }
            }
        }
    }
       
       
       
       /*
     * upload_document_property @used to upload Document Property
     * Created By : Nishtha
     * CReated On : 7April15
     */
    function upload_document_property(){
        $this->autoRender=false;
         $timestamp = time();

        if(!empty($this->request->data)){
            
        $MaxId = $this->BasicsDetail->query("SELECT MAX(id) as max FROM `sds_gfund_basics_details`");
        
        $ProjectId = $MaxId[0][0]['max'] +1;      
            
         $data['Document']['project_id'] = $ProjectId;     
         $data['Document']['content_id'] = $this->request->data['Document']['content_id'];        
         $data['Document']['user_id'] = $this->Auth->user('id'); 
            
         if(!empty($_FILES['doc_image']['name'])){
            $imageName =  $timestamp.$_FILES['doc_image']['name'];
            $tmp_name = $_FILES['doc_image']['tmp_name'];

           $path  = IMAGEUPLOAD.'Document/'.$imageName;
          
            $upload = move_uploaded_file($tmp_name, $path);
          
            if($upload){
               $data['Document']['content_value'] = $imageName;
            }else{
              $data['Document']['content_value'] = ''; 
            }
            
            if($this->Document->save($data)){
               echo 0;
                exit;
           }
         }
       }
    } 
    
    
    
    /*
     * add_document_content @used to add document content
     * Created By : Nishtha
     * CReated On : 7April15
     */
     function add_document_content() {
        $this->layout = '';
        $timestamp = time();

        $MaxId = $this->BasicsDetail->query("SELECT MAX(id) as max FROM `sds_gfund_basics_details`");
        
        $ProjectId = $MaxId[0][0]['max'] +1;
        
        
        
        if (!empty($this->request->data)) {

            $data1['DocumentContent']['contents'] = $this->request->data['DocumentContent']['content_name'];
            $data1['DocumentContent']['created_by'] = $this->Auth->user('id');
            $data1['DocumentContent']['project_id'] = $ProjectId;
            
            if ($this->DocumentContent->save($data1)) {

                $ContentId = $this->DocumentContent->getLastInsertID();
                $data['Document']['content_id'] = $ContentId;
                $data['Document']['user_id'] = $this->Auth->user('id');
                $data['Document']['project_id'] = $ProjectId;
                
                if (!empty($_FILES['document_image']['name'])) {
                    $imageName = $timestamp . $_FILES['document_image']['name'];
                    $tmp_name = $_FILES['document_image']['tmp_name'];

                    $path = IMAGEUPLOAD .'Document/'. $imageName;

                    $upload = move_uploaded_file($tmp_name, $path);

                    if ($upload) {
                        $data['Document']['content_value'] = $imageName;
                    } else {
                        $data['Document']['content_value'] = '';
                    }
                    // pr($data); die;

                    if ($this->Document->save($data)) {
                       $Ids = array(0,$ProjectId);
                        $documents = $this->DocumentContent->find('all' , array('conditions' =>array(
                                       'DocumentContent.id' =>$ContentId
                                        )));
                        
                        $this->set(compact('documents'));
                    }
                }
            }
        }
    }
    
  /* add_document_content @used to add document content
     * Created By : Nishtha
     * CReated On : 7April15
     */
     function add_capital_content() {
        $this->autoRender = false;
        $timestamp = time();

        $MaxId = $this->BasicsDetail->query("SELECT MAX(id) as max FROM `sds_gfund_basics_details`");
        
        $ProjectId = $MaxId[0][0]['max'] +1;

        if (!empty($this->request->data)) {

            $data1['CapitalStructureContent']['contents'] = $this->request->data['CapitalStructureContent']['content_name'];
            $data1['CapitalStructureContent']['created_by'] = $this->Auth->user('id');
            $data1['CapitalStructureContent']['project_id'] = $ProjectId;
            
            if ($this->CapitalStructureContent->save($data1)) {

                $ContentId = $this->CapitalStructureContent->getLastInsertID();
                $data['CapitalStructure']['content_id'] = $ContentId;
                $data['CapitalStructure']['user_id'] = $this->Auth->user('id');
                $data['CapitalStructure']['content_value'] = $this->request->data['CapitalStructureContent']['content_value'];

                if ($this->CapitalStructure->save($data)) {
                    $this->Session->setFlash('Capital Structure added successfully.');
                    $this->redirect(array('controller' => 'listings', 'action' => 'add_property_detail'));
                }
            }
        }
    }
 
    
    /* add_basic_detail @used to add document content
     * Created By : Nishtha
     * CReated On : 7April15
     */
     function add_basic_detail() {
        $this->autoRender = false;
        $timestamp = time();

        if (!empty($this->request->data)) {
              // pr($this->request->data); die;
          $MaxId = $this->BasicsDetail->query("SELECT MAX(id) as max FROM `sds_gfund_basics_details`");
        
           $ProjectId = $MaxId[0][0]['max'] +1;      
            
          // $data1['BasicsDetail']['project_id'] = $ProjectId; 
           $data1['BasicsDetail']['user_id'] = $this->Auth->user('id');
           $data1['BasicsDetail']['project_name'] = $this->request->data['BasicsDetail']['project_name'];
           $data1['BasicsDetail']['offering_amount'] = $this->request->data['BasicsDetail']['offering_amount'];
           $data1['BasicsDetail']['address'] = $this->request->data['BasicsDetail']['address'];
           $data1['BasicsDetail']['projected_return'] = $this->request->data['BasicsDetail']['projected_return'];
        //   $data1['BasicsDetail']['listing_partner'] = $this->request->data['BasicsDetail']['listing_partner'];
           $data1['BasicsDetail']['price_per_share'] = $this->request->data['BasicsDetail']['price_per_share'];
           $data1['BasicsDetail']['description'] = $this->request->data['BasicsDetail']['description'];
           $data1['BasicsDetail']['acquistion_price'] = $this->request->data['BasicsDetail']['acquistion_price'];
           $data1['BasicsDetail']['offering_size'] = $this->request->data['BasicsDetail']['offering_size'];
           $data1['BasicsDetail']['no_of_shares'] = $this->request->data['BasicsDetail']['no_of_shares'];
          // $data1['BasicsDetail']['target_returns'] = $this->request->data['BasicsDetail']['target_returns'];
           
           $data1['BasicsDetail']['offering_type'] = $this->request->data['BasicsDetail']['offering_type'];
           $data1['BasicsDetail']['holding_term'] = $this->request->data['BasicsDetail']['holding_term'];
       //    $data1['BasicsDetail']['project_returns'] = $this->request->data['BasicsDetail']['project_returns'];

            if (!empty($this->request->data['BasicsDetail']['image'])) {
                $imageName = $timestamp . $this->request->data['BasicsDetail']['image']['name'];
                $tmp_name = $this->request->data['BasicsDetail']['image']['tmp_name'];

                $path = IMAGEUPLOAD . 'BasicDetail/' . $imageName;
               
                $upload = move_uploaded_file($tmp_name, $path);

                if ($upload) {
                    $data1['BasicsDetail']['image'] = $imageName;
                } else {
                    $data1['BasicsDetail']['image'] = '';
                }
            }
            
//            if (!empty($this->request->data['BasicsDetail']['capital_structure'])) {
//                $imageCapitalName = $timestamp . $this->request->data['BasicsDetail']['capital_structure']['name'];
//                $tmp_capital_name = $this->request->data['BasicsDetail']['capital_structure']['tmp_name'];
//
//                $path = IMAGEUPLOAD . 'BasicDetail/' . $imageCapitalName;
//
//                $upload1 = move_uploaded_file($tmp_capital_name, $path);
//
//                if ($upload1) {
//                    $data1['BasicsDetail']['capital_structure'] = $imageCapitalName;
//                } else {
//                    $data1['BasicsDetail']['capital_structure'] = '';
//                }
//            }

            if($this->BasicsDetail->save($data1)){
              $ProjectId = $this->BasicsDetail->getLastInsertId();
              
              $this->BasicsDetail->updateAll(array('BasicsDetail.project_id'=>$ProjectId), array('BasicsDetail.id'=>$ProjectId));
                
                $Catpitals = $this->request->data['CapitalStructureContent'];
                
                foreach($Catpitals as $key => $value){
                  $data['CapitalStructure']['project_id'] = $ProjectId; 
                  $data['CapitalStructure']['user_id'] = $this->Auth->user('id'); 
                  $data['CapitalStructure']['content_id'] = $key;
                  $data['CapitalStructure']['content_value'] = $value;
            
                  $this->CapitalStructure->create();
                  $this->CapitalStructure->save($data);
                  
                }      
                
                 //$this->Session->setFlash('Project added successfully.');
                 $this->redirect(array('controller' => 'listings', 'action' => 'thank_you'));                
            }
        }
    }
    
    /* current_project @used to add Current Project
     * Created By : Nishtha
     * CReated On : 7April15
     */ 
    
    
    function current_project(){
        $this->layout='listing_layout';
        
        $projects = $this->BasicsDetail->find('all', array('conditions' => array(
                            'BasicsDetail.user_id' => $this->Auth->user('id')
                        ),
                        'order' => array('BasicsDetail.id DESC')
                    ));
         $this->set(compact('projects'));
        
    }
    
    
     /* current_project_details @used to add Current Project Detail
     * Created By : Nishtha
     * CReated On : 13April15
     */ 
    
    
    function current_project_detail($pId=null){
        $this->layout='listing_layout';
        
        $projectDetail = $this->BasicsDetail->find('first',array('conditions' =>array(
                           'BasicsDetail.project_id' =>$pId  
                        )));
        
       // Code to get listing partner detail
        
         $listingDetail = $this->ListingDetail->find('first', array('conditions' => array(
                            'ListingDetail.user_id' =>$projectDetail['BasicsDetail']['user_id']
                        )
                    ));
        
      //  pr($listingDetail);
        // Code to get Listin g Partner 
        
        $Ids = array(0,$pId);
        
        $options=array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_listing_partners',
                        'alias' => 'ListingPartner',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('ListingPartnerContent.id = ListingPartner.content_id')
                    )            
                  )  
          );
        
         $options['group'] = array('ListingPartnerContent.id');
        
         $options['fields'] = array('ListingPartnerContent.id', 'ListingPartnerContent.contents','ListingPartnerContent.created_by',
                                 'ListingPartner.id','ListingPartner.user_id', 'ListingPartner.content_id','ListingPartner.content_value');
        
         $options['conditions'] =  array('ListingPartnerContent.created_by' =>$Ids);
         
         $ListingPartners = $this->ListingPartnerContent->find('all', $options);
         
     
          // Code to get Document   
        $optionsDocument = array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_documents',
                        'alias' => 'Document',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('DocumentContent.id = Document.content_id')
                    )            
                  )  
          );
        
         $optionsDocument['fields'] = array('DocumentContent.id', 'DocumentContent.contents','DocumentContent.created_by',
                                           'Document.id','Document.user_id', 'Document.content_id','Document.content_value');
        
         $optionsDocument['conditions'] =  array('DocumentContent.created_by' =>$Ids);
         
         $optionsDocument['group'] = array('DocumentContent.id');
       
         $Documents = $this->DocumentContent->find('all', $optionsDocument);
         
       //  pr($Documents); die;
//     Code to get Capital Structure List
         
       $optionsCapital=array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_capital_structures',
                        'alias' => 'CapitalStructure',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('CapitalStructureContent.id = CapitalStructure.content_id')
                    )            
                  )  
          );
        
         $optionsCapital['fields'] = array('CapitalStructureContent.id', 'CapitalStructureContent.contents','CapitalStructureContent.created_by',
                           'CapitalStructure.id','CapitalStructure.user_id', 'CapitalStructure.content_id','CapitalStructure.content_value');
        
         $optionsCapital['conditions'] =  array('CapitalStructureContent.created_by' =>$Ids);
         
         $optionsCapital['group'] = array('CapitalStructureContent.id');
         
         $Capitals = $this->CapitalStructureContent->find('all', $optionsCapital);
         

         $this->set(compact('projectDetail','ListingPartners','Documents','Capitals','listingDetail'));
        
    }
    
    /*
     * download @ function used to download 
     * Created By : Nishtha
     * Created On  : 16 April 2015
     */
    function download($file_name,$folder) {

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
    
    
    
    /*
     * upload_portfolio @ function used to upload portfolio 
     * Created By : Nishtha
     * Created On  : 16 April 2015
     */
    function upload_portfolio() {
     //  pr($_FILES);
        $ret = array();
       $fileCount = count($_FILES["portfolio_image"]['name']);
      
            for($i=0; $i < $fileCount; $i++)
            {
                $RandomNum   = time();
               
                $ImageName = $RandomNum."_".$_FILES['portfolio_image']['name'][$i];
                $ImageTmpName = $_FILES['portfolio_image']['tmp_name'][$i];
                
                $path = IMAGEUPLOAD . 'ListingPartnerPortfolio/' . $ImageName;
               
                $upload = move_uploaded_file($ImageTmpName, $path);
                
                    $data['ListingPortfolio']['user_id'] = $this->Auth->user('id');
                    $data['ListingPortfolio']['portfolio_image'] = $ImageName;
                    
                    $this->ListingPortfolio->create();
                    $this->ListingPortfolio->save($data);
             
                
//                $ImageName      = str_replace(' ','-',strtolower($_FILES['portfolio_image']['name'][$i]));
//                $ImageType      = $_FILES['portfolio_image']['type'][$i]; //"image/png", image/jpeg etc.
//
//                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
//                $ImageExt       = str_replace('.','',$ImageExt);
//                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
//                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
//
//                $ret[$NewImageName]= $output_dir.$NewImageName;
//                move_uploaded_file($_FILES["portfolio_image"]["tmp_name"][$i],$output_dir.$NewImageName );
            }
            echo "done";
            exit;
            
    }
    
    
    /*
     * listing investment detail @used to show detail of Listing Investment detail
     * Created By : Nishtha
     * CReated On : 20April15
     */
    
    function listing_invest_detail($projectId=null){
        $this->layout='listing_layout';

       $geojson = array();
        
       $projects = $this->BasicsDetail->find('first',array('conditions' =>array(
                     'BasicsDetail.project_id' =>$projectId   
                    )));
       
      $documents = $this->Document->find('all',array('conditions' =>array(
                     'Document.project_id' =>$projectId   
                    ),
                    'group' =>array('Document.id')
                  ));
      
       $listingPartners = $this->ListingPartner->find('all',array('conditions' =>array(
                     'ListingPartner.project_id' =>$projectId   
                    ),
                    'group' =>array('ListingPartner.id')
                    ));
      
//      $capitalStructures = $this->CapitalStructure->find('all',array('conditions' =>array(
//                                'CapitalStructure.project_id' =>$projectId   
//                               )));
       
       
         $optionsCapital=array(             
        'joins' =>
                  array(
                     array(
                        'table' => 'sds_gfund_capital_structures',
                        'alias' => 'CapitalStructure',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('CapitalStructureContent.id = CapitalStructure.content_id')
                    )            
                  )  
          );
        
         $optionsCapital['fields'] = array('CapitalStructureContent.id', 'CapitalStructureContent.contents','CapitalStructureContent.created_by',
                           'CapitalStructure.id','CapitalStructure.user_id','CapitalStructure.project_id', 'CapitalStructure.content_id','CapitalStructure.content_value');
        
         $optionsCapital['conditions'] =  array('CapitalStructure.project_id' =>$projectId);
         
         $optionsCapital['group'] = array('CapitalStructureContent.id');
         
        $Capitals = $this->CapitalStructureContent->find('all', $optionsCapital);  
        //pr($Capitals);
        $html = '';
        
        foreach($Capitals as $structure){
            $content = $structure['CapitalStructureContent']['contents'];
            $content_value = $structure['CapitalStructure']['content_value'];
           $html .= '['."'$content'".','.$content_value.'],';

        }
        
        $capital = $html;
        
       // pr($listingPartners); die;
      $this->set(compact('projects','documents','listingPartners','capital')); 
  }
  
  
  
  function countCapital(){
    $this->autoRender=false;  
      
     $equity = $this->request->data['equity'];
     $issuer_equtiy = $this->request->data['issuer_equtiy'];
     $senior_debt = $this->request->data['senior_debt'];
     $junior_debt = $this->request->data['junior_debt'];
     
     $sumCapital = $equity+$issuer_equtiy+$senior_debt+$junior_debt;
     
     if($sumCapital ==100){
         echo  "success";
          exit;
     }else{
        echo "unsuccess"; 
        exit;
     }
     
  }
  
  
  
  
  function admin_edit_basic($pId=null,$uId=null){
     $this->autoRender=false;    
      
     if(!empty($this->request->data)){
       $ProjectId =  $this->request->data['BasicsDetail']['project_id'];   
        
           $this->BasicsDetail->id =  $ProjectId;
           if($this->BasicsDetail->save($this->request->data)){
             $this->Session->setFlash('Project edited successfully.');
            $this->redirect(array('controller' => 'users', 'action' => 'admin_project_view',$ProjectId));    
          }   
     } 
  }
  
  
function admin_edit_project_summary($pId=null,$uId=null){
     $this->autoRender=false;    
      
     if(!empty($this->request->data)){
       $ProjectId =  $this->request->data['BasicsDetail']['project_id'];   
        
           $this->BasicsDetail->id =  $ProjectId;
           if($this->BasicsDetail->save($this->request->data)){
             $this->Session->setFlash('Project edited successfully.');
            $this->redirect(array('controller' => 'users', 'action' => 'admin_project_view',$ProjectId));    
          }   
     } 
  }  
  
  
  
function admin_edit_listing($pId=null,$uId=null){
     $this->autoRender=false;    
      $timestamp = time();
     if(!empty($this->request->data)){
       $ProjectId =  $this->request->data['ListingPartner']['project_id'];
       $ListingId =  $this->request->data['ListingPartner']['listing_id'];  

       $ListingDetail = $this->ListingPartner->find('first', array('conditions' =>array(
                              'ListingPartner.id' =>$ListingId
                             )
                         ));
       
       $imageOldName = $ListingDetail['ListingPartner']['content_value'];
       
        $file_path = IMAGEUPLOAD .'ListingPartner/';
         $unlink =  unlink($file_path . $imageOldName);
       
       if(!empty($this->request->data['ListingPartner']['content']['name'])){
           $imageName = $timestamp . $this->request->data['ListingPartner']['content']['name'];
            $tmp_name = $this->request->data['ListingPartner']['content']['tmp_name'];

            $path = IMAGEUPLOAD .'ListingPartner/'. $imageName;

            $upload = move_uploaded_file($tmp_name, $path);

            if ($upload) {
                $this->request->data['ListingPartner']['content_value'] = $imageName;
            } else {
                $this->request->data['ListingPartner']['content_value'] = '';
            }  
            
           $this->ListingPartner->id =  $ListingId;
           if($this->ListingPartner->save($this->request->data)){
             $this->Session->setFlash('Project edited successfully.');
            $this->redirect(array('controller' => 'users', 'action' => 'admin_project_view',$ProjectId));    
          }   
       }   
     } 
  }   
  
  
  
function admin_edit_document($pId=null,$uId=null){
     $this->autoRender=false;    
      $timestamp = time();
     if(!empty($this->request->data)){
       $ProjectId =  $this->request->data['Document']['project_id'];
       $documentId =  $this->request->data['Document']['document_id'];  

       $DocumentDetail = $this->Document->find('first', array('conditions' =>array(
                              'Document.id' =>$documentId
                             )
                         ));
       
       $imageOldName = $DocumentDetail['Document']['content_value'];
       
        $file_path = IMAGEUPLOAD .'Document/';
         $unlink =  unlink($file_path . $imageOldName);
       
       if(!empty($this->request->data['Document']['content']['name'])){
           $imageName = $timestamp . $this->request->data['Document']['content']['name'];
            $tmp_name = $this->request->data['Document']['content']['tmp_name'];

            $path = IMAGEUPLOAD .'Document/'. $imageName;

            $upload = move_uploaded_file($tmp_name, $path);

            if ($upload) {
                $this->request->data['Document']['content_value'] = $imageName;
            } else {
                $this->request->data['Document']['content_value'] = '';
            }  
            
           $this->Document->id =  $documentId;
           if($this->Document->save($this->request->data)){
             $this->Session->setFlash('Project edited successfully.');
            $this->redirect(array('controller' => 'users', 'action' => 'admin_project_view',$ProjectId));    
          }   
       }   
     } 
  } 
  
  
     /*
     * listing_partner_detail @ used to display partne detail
     * Created ON : 17 April
     * Created BY : Nishtha
     */
  function listing_partner_detail($user_id=null){
       $this->layout='listing_layout'; 
       $userId =  $user_id;
        $users = $this->User->find('first', array('conditions' => array('User.id' =>$userId)));
        //  pr($users);exit; 
        
         $options = array(
            'joins' =>
            array(
                array(
                    'table' => 'sds_gfund_listing_details',
                    'alias' => 'ListingDetail',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('ListingDetail.user_id = User.id')
                ),
            )
        );
  
      $options['conditions'] = array('User.id' =>$userId);
      
      $options['fields'] = array('User.id', 'User.first_name', 'User.last_name', 'User.username','User.profile_image',
                            'User.address1', 'User.address2', 'User.city', 'User.state', 'User.country',
                            'User.code',  'User.phone', 'User.states', 'User.company_description', 'User.website',
                            'ListingDetail.id', 'ListingDetail.company_name', 'ListingDetail.about_bio',
                             'ListingDetail.website','ListingDetail.upload_bio', 'ListingDetail.portfolio', 
                             'ListingDetail.executive_summary', 'ListingDetail.team_leadership');
      
      $users = $this->User->find('first', $options);
      
      
       $portfolios = $this->ListingPortfolio->find('all' , array('conditions' =>array('ListingPortfolio.user_id' =>$userId)));
      
        $projects = $this->BasicsDetail->find('all', array('conditions' => array(
                        'BasicsDetail.user_id' => $user_id
                    ),
                    'order' => array('BasicsDetail.id DESC')
                ));
       
      //  pr($projects);    
      $this->set(compact('users','portfolios','projects'));

    }
  

}