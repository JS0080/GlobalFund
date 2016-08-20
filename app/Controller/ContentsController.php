<?php

Class ContentsController extends AppController {

    var $uses = array('Content', 'ContentPage');
    var $components = array('Auth', 'Session', 'Email', 'RequestHandler');

    function beforeFilter() {

        $this->Auth->allow('home', 'about', 'how_it_works', 'investment_education');
    }

    function admin_content_list() {
        $this->layout = 'admin';

        $contents = $this->Content->find('all');

        $this->set(compact('contents'));
    }

    function admin_content_edit($id = null) {
        $this->layout = 'admin';

        if (!empty($this->request->data)) {
            $this->Content->id = $id;
            if ($this->Content->save($this->request->data)) {
                $this->Session->setFlash('Content edited successfully.');
                $this->redirect(array('controller' => 'contents', 'action' => 'admin_content_list'));
            }
        } else {
            $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        }

        $this->set(compact('contentDetail'));
    }

    function admin_home() {
        $this->layout = 'admin';

        $homeDetail = $this->Content->find('first', array('conditions' => array('Content.page_id' => 1,
                'Content.content_name' => 'Home')));

        // pr($homeDetail);

        $this->set(compact('homeDetail'));
    }

    function admin_home_edit($id = null) {
        $this->layout = 'admin';

        if (!empty($this->request->data)) {
            $this->Content->id = $id;
            if ($this->Content->save($this->request->data)) {
                $this->Session->setFlash('Content edited successfully.');
                $this->redirect(array('controller' => 'contents', 'action' => 'admin_home'));
            }
        } else {
            $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        }

        $this->set(compact('contentDetail'));
    }

    function admin_home_view($id = null) {
        $this->layout = 'admin';

        $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));


        $this->set(compact('contentDetail'));
    }
    
    
    
    
   function admin_about() {
        $this->layout = 'admin';

        $homeDetail = $this->Content->find('first', array('conditions' => array('Content.page_id' => 2,
                'Content.content_name' => 'About')));

        // pr($homeDetail);

        $this->set(compact('homeDetail'));
    }

    
    
    
   function admin_about_view($id = null) {
        $this->layout = 'admin';

        $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));

        $this->set(compact('contentDetail'));
    }
       
    
   function admin_about_edit($id = null) {
        $this->layout = 'admin';

        if (!empty($this->request->data)) {
            $this->Content->id = $id;
            if ($this->Content->save($this->request->data)) {
                $this->Session->setFlash('Content edited successfully.');
                $this->redirect(array('controller' => 'contents', 'action' => 'admin_about'));
            }
        } else {
            $contentDetail = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
        }

        $this->set(compact('contentDetail'));
    }
    

    function home() {
        $this->layout = 'main_layout';

        $options['joins'] = array(
            array(
                'table' => 'contents',
                'alias' => 'Content',
                'type' => 'left',
                'foreignKey' => false,
                'conditions' => array('Content.page_id = ContentPage.id')
            )
        );

        $options['conditions'] = array('ContentPage.page_name' => 'Home');

        $options['fields'] = array('ContentPage.id', 'ContentPage.page_name', 'Content.page_id', 'Content.content_name', 'Content.content','Content.long_desc');

        $homeDetail = $this->ContentPage->find('first', $options);
        // pr($homeDetail); die;
        $this->set(compact('homeDetail'));
    }

    function about() {
        $this->layout = 'main_layout';

        $options['joins'] = array(
            array(
                'table' => 'contents',
                'alias' => 'Content',
                'type' => 'left',
                'foreignKey' => false,
                'conditions' => array('Content.page_id = ContentPage.id')
            )
        );

        $options['conditions'] = array('ContentPage.page_name' => 'About');

        $options['fields'] = array('ContentPage.id', 'ContentPage.page_name', 'Content.page_id', 
                                    'Content.content_name', 'Content.content','Content.long_desc');

        $homeDetail = $this->ContentPage->find('first', $options);

        $this->set(compact('homeDetail'));
    }

    function how_it_works() {
        $this->layout = 'main_layout';

        $options['joins'] = array(
            array(
                'table' => 'contents',
                'alias' => 'Content',
                'type' => 'left',
                'foreignKey' => false,
                'conditions' => array('Content.page_id = ContentPage.id')
            )
        );

        $options['conditions'] = array('ContentPage.page_name' => 'Home');

        $options['fields'] = array('ContentPage.id', 'ContentPage.page_name', 'Content.page_id', 'Content.content_name', 'Content.content');

        $homeDetail = $this->ContentPage->find('first', $options);

        $this->set(compact('homeDetail'));
    }

    function investment_education() {
        $this->layout = 'main_layout';

        $options['joins'] = array(
            array(
                'table' => 'contents',
                'alias' => 'Content',
                'type' => 'left',
                'foreignKey' => false,
                'conditions' => array('Content.page_id = ContentPage.id')
            )
        );

        $options['conditions'] = array('ContentPage.page_name' => 'Home');

        $options['fields'] = array('ContentPage.id', 'ContentPage.page_name', 'Content.page_id', 'Content.content_name', 'Content.content');

        $homeDetail = $this->ContentPage->find('first', $options);

        $this->set(compact('homeDetail'));
    }

}