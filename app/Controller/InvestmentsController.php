<?php
class InvestmentsController extends AppController {

    var $uses = array('BasicsDetail','CapitalStructure','CapitalStructureContent','Document','DocumentContent',
                       'ListingPartner','ListingPartnerContent','User','InvestorDetail','InvestorInvestment',
                      'ListingDetail','ListingPortfolio','Transaction','Investment','MessageUser','Message');
  

    function beforeFilter() {
        
        $this->Auth->allow('checkAccredifyVerification');
        
    }

    
    /*
     * investor @used to show detail of Investor LoggedIn User
     * Created By : Nishtha
     * CReated On : 8April15
     */
    
     function investor(){
        
      $this->layout='investor_layout';
      
      $user_id = $this->Auth->user('id');
      
      $options = array(
            'joins' =>
            array(
                array(
                    'table' => 'sds_gfund_investor_details',
                    'alias' => 'InvestorDetail',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('InvestorDetail.user_id = User.id')
                ),
            )
        );
  
      $options['conditions'] = array('User.id' =>$this->Auth->user('id'));
      
      $options['fields'] = array('User.id', 'User.first_name', 'User.last_name', 'User.username','User.profile_image',
                             'User.password','User.address1', 'User.address2', 'User.city', 'User.state', 'User.country',
                             'User.code', 'User.experience', 'User.phone', 'User.states', 'User.finance1', 'User.finance2',
                             'User.finance3', 'User.finance4', 'User.company_description', 'User.website',
                             'InvestorDetail.id', 'InvestorDetail.user_id', 'InvestorDetail.occupation',
                             'InvestorDetail.bio_about','InvestorDetail.estimated_net_worth', 'InvestorDetail.finances', 
                             'InvestorDetail.investing_experience', 'InvestorDetail.other_investments', 'InvestorDetail.property_interest');
      
      // Annual Project Number
      
      $countProject = $this->Investment->find('all' , array('conditions' =>array('Investment.user_id' =>$user_id),
                       'field' =>array('Investment.project_id'),
                       'group' =>'Investment.project_id'));

       $annualTotalNumProject = count($countProject);
       
    //  $annualTotalNumProject = $annualTotalProject[0][0]['count( project_id )'];
      //END Annual Project Number
      
      
       // Annual Fund Investment
       $annualTotalFundInvested = $this->Investment->query(" 
                                    SELECT sum( amount )
                                    FROM `sds_gfund_investments`
                                    WHERE Year( `date` ) = Year(
                                    CURRENT_TIMESTAMP )
                                    AND user_id='".$user_id."' ");
       
      $annualTotalFundInvested = $annualTotalFundInvested[0][0]['sum( amount )'];
      //END Annual Investment
      
      // Calculation For Projected Return Value
       $allProjects = $this->Investment->find('all', array(
                        'joins' => array(
                            array(
                                'table' => 'basics_details',
                                'alias' => 'BasicsDetail',
                                'type' => 'left',
                                'conditions' => array('BasicsDetail.id = Investment.project_id',                                     
//                                     'BasicsDetail.from_date  BETWEEN ? and ?' => array(date('Y') . '-01-01',
//                                      date('Y') . '-12-31')
                                 )
                            )
                        ),
                        'conditions' =>array('Investment.date BETWEEN ? and ?' =>array(date('Y') . '-01-01',
                                       date('Y') . '-12-31'),
                                      'Investment.user_id' => $user_id),
                        'fields' => array('BasicsDetail.id', 'BasicsDetail.project_name', 'BasicsDetail.offering_amount' , 'BasicsDetail.projected_return',
                                          'Investment.project_id' ,'Investment.user_id','Investment.shares','Investment.amount'),
                        'group' => 'Investment.project_id'
                  )
              );
      
        $project_name = '';
        $project = '';
        $projectReturnGraph = '';
        $totalPlatform = array();
        $projected_return = array();
        
        $totalProjects = count($allProjects);
        
       foreach($allProjects as $projects) {  //pr($projects);
       
           $Investment = $this->Investment->find('all', array('conditions' => 
                           array('Investment.project_id' => $projects['BasicsDetail']['id'],
                                 'Investment.user_id' => $user_id ),
                                 'fields' => array('SUM(replace(Investment.amount, ",", "")) as total_sum')
                                        
                              )
                          );
                      

           $InvestAmount = $Investment[0][0]['total_sum'];
           
           ///X axis detail
            $content_name = $projects['BasicsDetail']['project_name']; 
            $project_name .= "'$content_name'".',';            
           
           // Project Offering Amount
            $content_value = preg_replace('/[.,]/', '',$InvestAmount);
            $project .= "$content_value".',';  

            //Projected Return
             $offeringAmount = preg_replace('/[.,]/', '', $projects['BasicsDetail']['offering_amount']);
            
            $percent = $InvestAmount*$projects['BasicsDetail']['projected_return'];
            $perGraph = number_format( $percent / 100, 0 );
            
            $perGraph = preg_replace('/[.,]/', '', $perGraph);
            
            $projectReturnGraph .= "$perGraph".','; 
            
            $projected_return[] = ( preg_replace('/[.,]/', '', $percent) / 100 ) ;

            // Total Platform Return
              $totalPlatform[] = $projects['BasicsDetail']['projected_return'];  
       }
       
       
        // pr($projected_return);
       
       $projectReturn = array_sum($projected_return);
       
       $totalPlatformReturn = array_sum($totalPlatform);
       
       $totalPlatformReturn = number_format( $totalPlatformReturn / $totalProjects, 2 ) ;
      // End Calculation For Projected Return Value     
      
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

        $users = $this->User->find('first', $options);
    
    
        $this->set(compact('users','projectReturn','annualTotalFundInvested','annualTotalNumProject',
                    'messages','projectReturnGraph','project','project_name','totalPlatformReturn'));
  }
    
    
    
  /*
   * edit_investor_profile @ used to edit investor profile
   * Created On : 30-3-2015
   * Created By : Abdur
    */
  
 function edit_investor_profile(){
     
    $this->layout='investor_layout';
   
    $timestamp = time();
    
     $id = $this->Auth->user('id');
            
    if(!empty($this->request->data)){
        // pr($this->request->data); die;
     $userDetail = $this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->User('id'))));
     
     $userProfileDetail = $this->InvestorDetail->find('first',array('conditions'=>array('InvestorDetail.user_id'=>$this->Auth->User('id'))));
        
   
       if(!empty($this->request->data['profile_image']['name'])){
           
         $imageName =  $timestamp.$this->request->data['profile_image']['name'];
         
         $tmp_name = $this->request->data['profile_image']['tmp_name'];

         $path  = IMAGEUPLOAD.'InvestorProfile/'.$imageName;

         $upload = move_uploaded_file($tmp_name, $path);
       
         $this->request->data['User']['profile_image'] = $imageName;
         
        }else{
         // $this->request->data['User']['profile_image'] = '';    
        }
        
        
        
        if(!empty($this->request->data['User']['password'])){
            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
        } else{
          $this->request->data['User']['password'] = $userDetail['User']['password'];
        }
            
        $this->User->id=$id;
        
      if($this->User->save($this->request->data)){
          
          $data['InvestorDetail']['user_id'] = $this->Auth->user('id');
          $data['InvestorDetail']['bio_about'] = $this->request->data['InvestorDetail']['bio_about'];
          $data['InvestorDetail']['occupation'] = $this->request->data['InvestorDetail']['occupation'];
          $data['InvestorDetail']['estimated_net_worth'] = $this->request->data['InvestorDetail']['estimated_net_worth'];
    
          if(isset($this->request->data['InvestorDetail']['other_investments'])) {
              
             $otherInvestment = $this->request->data['InvestorDetail']['other_investments'];
             $otherInvestment = implode(",",$otherInvestment);   
              
          }else{
              
             $otherInvestment = ''; 
             
          }
          
          
          if(isset($this->request->data['InvestorDetail']['property_interest'])) {
              
             $propertyInerest = $this->request->data['InvestorDetail']['property_interest'];
          
             $propertyInerest = implode(",",$propertyInerest);
              
          }else{
             $propertyInerest = ''; 
          }
          
          $data['InvestorDetail']['other_investments'] = $otherInvestment;
          
         
          
          $data['InvestorDetail']['property_interest'] = $propertyInerest;
          
          
          if(!empty($userProfileDetail)){
          
          $this->InvestorDetail->id=$userProfileDetail['InvestorDetail']['id'];
            if($this->InvestorDetail->save($data)){
                $this->redirect(array('controller'=>'investments','action'=>'investor'));
            }
          }else {
            if($this->InvestorDetail->save($data)){
                 $this->redirect(array('controller'=>'investments','action'=>'investor'));
            }
          }
        }       
    }else{
      $options = array(
            'joins' =>
            array(
                array(
                    'table' => 'sds_gfund_investor_details',
                    'alias' => 'InvestorDetail',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('InvestorDetail.user_id = User.id')
                ),
            )
        );
  
      $options['conditions'] = array('User.id' =>$this->Auth->user('id'));
      
      $options['fields'] = array('User.id', 'User.first_name', 'User.last_name', 'User.username',
                            'User.password', 'User.address1', 'User.address2', 'User.city', 'User.state', 'User.country',
                            'User.code', 'User.experience', 'User.phone', 'User.states', 'User.finance1', 'User.finance2',
                            'User.finance3', 'User.finance4', 'User.company_description', 'User.website',
                             'InvestorDetail.id', 'InvestorDetail.user_id', 'InvestorDetail.occupation',
                             'InvestorDetail.bio_about','InvestorDetail.estimated_net_worth', 'InvestorDetail.finances', 
                             'InvestorDetail.investing_experience', 'InvestorDetail.other_investments', 'InvestorDetail.property_interest');
      
      
      
      $users = $this->User->find('first', $options);
    
      $this->set(compact('users'));
     
    } 
}
    
    
    
    
     /*
     * investment @used to show detail of Listing Investment
     * Created By : Nishtha
     * CReated On : 8April15
     */
    function investment(){
      $this->layout='investor_layout';  
      
       $order = array('BasicsDetail.created' =>'DESC');
       $conditions = array('BasicsDetail.is_deleted' =>0);
       
        $this->paginate = array(
            'conditions' =>$conditions,
            'order' => $order,
            'limit' =>10
        );
      
        $investments = $this->paginate('BasicsDetail');
      
      
       $this->set(compact('investments'));
  }
    
    
 
     /*
     * investment @used to show detail of Listing Investment
     * Created By : Nishtha
     * CReated On : 8April15
     */
    
    function invest_detail($projectId=null){
        $this->layout='investor_layout';

       $geojson = array();
        
      $options['joins'] = array(
            array(
                'table' => 'listing_details',
                'alias' => 'ListingDetail',
                'type' => 'LEFT',
                'conditions' => array(
                    'BasicsDetail.user_id = ListingDetail.user_id'
                )
            )
        );

        $options['conditions'] = array('BasicsDetail.project_id' =>$projectId);

         $options['fields'] = array('BasicsDetail.id', 'BasicsDetail.user_id',
                                'BasicsDetail.project_id', 'BasicsDetail.project_name',
                                'BasicsDetail.offering_amount', 'BasicsDetail.image', 
                                'BasicsDetail.address', 'BasicsDetail.projected_return', 
                                'BasicsDetail.listing_partner', 'BasicsDetail.price_per_share', 
                                'BasicsDetail.description', 'BasicsDetail.acquistion_price', 
                                'BasicsDetail.offering_size', 'BasicsDetail.no_of_shares', 
                                'BasicsDetail.project_price_shares', 'BasicsDetail.target_returns',
                                'BasicsDetail.offering_type', 'BasicsDetail.holding_term', 
                                'BasicsDetail.project_returns', 'BasicsDetail.capital_structure',
                                'BasicsDetail.percentage_completed', 'BasicsDetail.is_deleted',
                                'ListingDetail.user_id', 'ListingDetail.upload_bio' ,'ListingDetail.portfolio',
                                'ListingDetail.executive_summary','ListingDetail.team_leadership');

        $projects = $this->BasicsDetail->find('first', $options);
        // pr($projects); 
        
       $documents = $this->Document->find('all',array('conditions' =>array(
                     'Document.project_id' =>$projectId   
                    )));
      
       $listingPartners = $this->ListingPartner->find('all',array('conditions' =>array(
                     'ListingPartner.project_id' =>$projectId   
                    )));
   
       
      $optionsCapital = array(
                            'joins' =>
                            array(
                                array(
                                    'table' => 'sds_gfund_capital_structures',
                                    'alias' => 'CapitalStructure',
                                    'type' => 'left',
                                    'foreignKey' => false,
                                    'conditions' => array('CapitalStructureContent.id = CapitalStructure.content_id')
                                )
                            )
                        );
        
         $optionsCapital['fields'] = array('CapitalStructureContent.id', 'CapitalStructureContent.contents','CapitalStructureContent.created_by',
                                           'CapitalStructure.id','CapitalStructure.user_id','CapitalStructure.project_id', 'CapitalStructure.content_id',
                                            'CapitalStructure.content_value');
        
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
        $this->set(compact('projects','documents','listingPartners','capital')); 
  }
    
   /*
     * investor_invest_detail @used to show detail of Investment Detail
     * Created By : Nishtha
     * CReated On : 14April15
     */
    
    function investor_invest_detail($projectId=null){
       $this->layout='investor_layout';
      // echo $projectId; die;
       $projects = $this->BasicsDetail->find('first',array('conditions' =>array(
                     'BasicsDetail.project_id' =>$projectId   
                    )));
       
       $userDetail = $this->User->find('first',array('conditions' =>array(
                     'User.id' =>$this->Auth->user('id')
                    )));
       
          //pr($projects);   
      $this->set(compact('projects','userDetail'));
      
 }
    
    
      /*
     * add_investment @used to show detail of Add  Investment Detail
     * Created By : Nishtha
     * CReated On : 14April15
     */
    
    function add_investment(){
      $this->autoRender = false;
    
       if(!empty($this->request->data)){
           $this->request->data['InvestorInvestment']['user_id'] = $this->Auth->user('id');
           
           if($this->InvestorInvestment->save($this->request->data)){
                $this->redirect(array('controller'=>'investments','action'=>'invest_activity')); 
           }
       }
  }
    
    
     /*
     * add_investment @used to show detail of Add  Investment Detail
     * Created By : Nishtha
     * CReated On : 14April15
     */
    
    function invest_activity(){
       $this->layout='investor_layout';

      $user_id = $this->Auth->user('id');
        
      
      // Monthly Investment
        $MonthlyTotalFundInvested = $this->Investment->query(" 
                                     SELECT sum( amount )
                                     FROM `sds_gfund_investments`
                                     WHERE Year( `date` ) = Year(
                                     CURRENT_TIMESTAMP )
                                     AND Month( `date` ) = Month(
                                     CURRENT_TIMESTAMP ) AND user_id='".$user_id."' ");

       $MonthlyTotalFundInvested = $MonthlyTotalFundInvested[0][0]['sum( amount )'];
       //END Monthly Investment
      
       
      // Annual Investment
       $annualTotalFundInvested = $this->Investment->query(" 
                                    SELECT sum( amount )
                                    FROM `sds_gfund_investments`
                                    WHERE Year( `date` ) = Year(
                                    CURRENT_TIMESTAMP )
                                    AND user_id='".$user_id."' ");
       
      $annualTotalFundInvested = $annualTotalFundInvested[0][0]['sum( amount )'];
      //END Annual Investment
      
      
       // Projected  Investment
      $userProjects = $this->Investment->find('all', array('conditions' =>array('Investment.user_id' =>$user_id)));
      
      $allProjects = $this->Investment->find('all', array(
                        'joins' => array(
                            array(
                                'table' => 'basics_details',
                                'alias' => 'BasicsDetail',
                                'type' => 'left',
                                'conditions' => array('BasicsDetail.id = Investment.project_id',                                     
//                                     'BasicsDetail.from_date  BETWEEN ? and ?' => array(date('Y') . '-01-01',
//                                      date('Y') . '-12-31')
                                 )
                            )
                        ),
                        'conditions' =>array('Investment.date BETWEEN ? and ?' =>array(date('Y') . '-01-01',
                                       date('Y') . '-12-31'),
                                      'Investment.user_id' => $user_id),
                        'fields' => array('BasicsDetail.id', 'BasicsDetail.project_name', 'BasicsDetail.offering_amount' , 'BasicsDetail.projected_return',
                                          'Investment.project_id' ,'Investment.user_id','Investment.shares','Investment.amount')
                  )
              );
        // pr($allProjects); die;
      
         $project = '';
         $projectName = '';
         $investment = '';
         
         $projectedReturn = 0;
        
         foreach($allProjects as $projects){
             
            // Project Name 
            $projectname = $projects['BasicsDetail']['project_name'];  
            $projectName .= "'$projectname'".',';
            
            // Project Offering Amount
            $content_value =  preg_replace('/[.,]/', '', $projects['BasicsDetail']['offering_amount']);
           
            $project .= "$content_value".',';  
            
            // Invested Amount
            $investAmount = $projects['Investment']['amount']; 
            $investment .= "$investAmount".','; 
            
            //Projected Return
            $percent = $projects['Investment']['amount']*$projects['BasicsDetail']['projected_return'];
            $projected_return[] = number_format( $percent / 100, 2 ) ;
           
         }
       
        
          $ProjectedReturn = array_sum($projected_return);
         
          $no_of_projects = $project;
   
          $investment_amount = $investment;

          $Projects = $projectName;     
        
      //END Annual Projected Investment
      $this->set(compact('MonthlyTotalFundInvested','annualTotalFundInvested',
            'no_of_projects','investment_amount','Projects','ProjectedReturn'));
      
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
     * listing_partner @ used to display list of listing  detail
     * Created ON : 17 April
     * Created BY : Nishtha
     */
    
    function listing_partner(){
       $this->layout='investor_layout'; 
          
         $options = array(
            'joins' =>
            array(
                array(
                    'table' => 'sds_gfund_users',
                    'alias' => 'User',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('User.id = ListingDetail.user_id')
                )
            )
        );
  
      $options['conditions'] = array('User.user_type' =>'listing');
      
      $options['fields'] = array('User.id', 'User.first_name', 'User.last_name', 'User.username','User.profile_image',
                            'User.address1', 'User.address2', 'User.city', 'User.state', 'User.country','User.user_type',
                            'User.code',  'User.phone', 'User.states', 'User.company_description', 'User.website',
                            'ListingDetail.id', 'ListingDetail.company_name', 'ListingDetail.about_bio',
                             'ListingDetail.website','ListingDetail.upload_bio', 'ListingDetail.portfolio', 
                             'ListingDetail.executive_summary', 'ListingDetail.team_leadership');
       
       $listings = $this->ListingDetail->find('all', $options);
        // pr($listings);    
      $this->set(compact('listings'));
       
    }
    
    
    /*
     * listing_partner_detail @ used to display partne detail
     * Created ON : 17 April
     * Created BY : Nishtha
     */
  function listing_partner_detail($user_id=null){
       $this->layout='investor_layout'; 
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
        // pr($portfolios); 
        $projects = $this->BasicsDetail->find('all', array('conditions' => array(
                        'BasicsDetail.user_id' => $user_id
                    ),
                    'order' => array('BasicsDetail.id DESC')
                ));
       
      //  pr($projects);    
      $this->set(compact('users','portfolios','projects'));
    }
    
    
     /*
     * paymentSuccess @ return Success data From dwolla
     * Created ON : 19 April 2015
     * Created BY : Nishtha
     */
    
    function paymentSuccess(){
        $this->autoRender = false;
      
        $error = $_GET['error'];
        
       if($error =='failure') {
          $description = $_GET['error_description'];
          
          $this->Session->setFlash($description);
          $this->redirect(array('controller'=>'investments','action'=>'edit_investor_profile'));       
          
       } else {
        
            $signature = $_GET['signature'];
            $orderId =  $_GET['orderId'];

            $amount = $_GET['amount'];
            $checkoutId =  $_GET['checkoutId'];

            $status = $_GET['status'];
            $clearingDate =  $_GET['clearingDate'];

            $transaction = $_GET['transaction'];
            $destinationTransaction =  $_GET['destinationTransaction'];

            $postback = $_GET['postback'];

            if($postback == 'success'){
                
                $this->request->data['Transaction']['signature'] = $signature;
                $this->request->data['Transaction']['amount'] = $amount;
                $this->request->data['Transaction']['checkoutId'] = $checkoutId;
                $this->request->data['Transaction']['status'] = $status;
                $this->request->data['Transaction']['clearingDate'] = $clearingDate;
                $this->request->data['Transaction']['transaction'] = $transaction;
                $this->request->data['Transaction']['destinationTransaction'] = $destinationTransaction;

                if($this->Transaction->save($this->request->data)){

                    $this->Session->setFlash('You have successfully done payment.');
                    $this->redirect(array('controller'=>'investments','action'=>'investor'));
                }
            }
       }          
    }

    
     /*
     * listing_partner_detail @ used to display partne detail
     * Created ON : 17 April
     * Created BY : Nishtha
     */
    
    function checkAccredifyVerification(){
        $this->autoRender=false;
       
       $accrediated = $_GET['check'];
       
       if($accrediated ==0){
           $value = 0;
           
           
       }else if($accrediated =='false'){
          $value = 0;  
       }else if($accrediated =='true'){
         $value = 1;    
       }
       
     $update = $this->User->updateAll(array('User.is_accreditaed' =>$accrediated), array('User.id' => $this->Auth->user('id'))); 
     if($update){
        $this->redirect(array('controller'=>'investments','action'=>'edit_investor_profile')); 
     }
  }
 
  
  
/*
* grap @ used to display invest messages
* Created ON : 27 May
* Created BY : Nishtha
*/
    
  function grap(){
      
  }
  
  
  
  
     /*
     * invest_message @ used to display invest messages
     * Created ON : 27 May
     * Created BY : Nishtha
     */
    
  function invest_message(){
      
       $this->layout='investor_layout';       
  }
  
  
  
   /*
     * invest_message @ used to display invest messages
     * Created ON : 27 May
     * Created BY : Nishtha
     */
    
  function dwolla_payment(){     
       $this->layout='investor_layout';       
  }
  
  
  
  
    /*
     * projects_investments @ used to save Project Investments
     * Created ON : 27 May
     * Created BY : Nishtha
     */ 
  function projects_investments(){
   $amount = $this->request->data['amount'];
   $price = $this->request->data['price'];
   $shares = $this->request->data['shares'];
   $projectId = $this->request->data['projectId'];

    $projectDetail = $this->BasicsDetail->find('first' , array('conditions' =>array('BasicsDetail.id' =>$projectId)));
      
   $OfferingAmount = preg_replace('/[.,]/', '', $projectDetail['BasicsDetail']['offering_amount']);

   $PricePerShare = $projectDetail['BasicsDetail']['price_per_share'];

    // GET TOTAL NUMBER OF SHARES 
    
    $totalShares = round($OfferingAmount/$PricePerShare);

    if(!empty($projectId) && !empty($amount)) {
        
      $data1['Investment']['user_id'] = $this->Auth->user('id');
      $data1['Investment']['project_id'] = $projectId;
      $data1['Investment']['shares'] = $shares;
      $data1['Investment']['amount'] = $amount;
      $data1['Investment']['date'] = date('Y:m:d');
     
      if($this->Investment->save($data1)){
          
        // GET NUMBER OF SHARES INVESTED\
        $NumerOfShare = $this->Investment->query("SELECT SUM( shares ) as sum
                            FROM `sds_gfund_investments`
                            WHERE `project_id` ='".$projectId."'");  
          
        
         $NumerOfShares = $NumerOfShare[0][0]['sum'];
   
        $percentageCompleted = round(($NumerOfShares / $totalShares) * 100);
       
        $update = $this->BasicsDetail->updateAll(
                     array('BasicsDetail.percentage_completed' => $percentageCompleted),
                     array('BasicsDetail.id' => $projectId)
                  );

            if($update){
              echo 0;
              exit;  
            }
      } 
    } else{
       echo 1;
        exit; 
    }  
  }
  
  
  function share_limit(){
     $shares = $this->request->data['shares'];
     
     $projectId = $this->request->data['project_id'];
    
     if(!empty($projectId)){
         
      $projectDetail = $this->BasicsDetail->find('first' , array('conditions' =>array('BasicsDetail.id' =>$projectId))); 
      
      $OfferingAmount = $projectDetail['BasicsDetail']['offering_amount'];
      
      $pricePerShare = $projectDetail['BasicsDetail']['price_per_share'];
       
      $OfferingAmount = preg_replace('/[.,]/', '',$OfferingAmount);
      
      $TotalShareAllow = round($OfferingAmount/$pricePerShare);
      
     // echo $TotalShareAllow; die;
      
      $sumShares = $this->Investment->find('all', array(
                        'conditions' => array(
                        'Investment.project_id' => $projectId),
                        'fields' => array('sum(Investment.shares) as total_sum'
                                )
                            )
                        );
       
      $purchasedShares = $sumShares[0][0]['total_sum']; 
      
      $shares  = $shares+$purchasedShares;
   //   echo $TotalShareAllow; die;
      if($TotalShareAllow < $shares){
         echo 0; 
         exit;
      }else{
          
          echo 1;
          exit;
      }
     }   
 }
  
  
   
  
  
  
    
}