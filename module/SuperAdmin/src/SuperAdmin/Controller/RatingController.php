<?php 

namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


use SuperAdmin\Model\RatingModel;
use SuperAdmin\Model\RatingTable;


class RatingController extends AbstractActionController
{
    protected $authService;
    protected $RatingTable;


    public function getAuthService()
    {
        if (! $this->authService)
        {
            $this->authService = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authService;
    }
    
 
    
    public function getRatingTable()
    {	
        if(!$this->ratingTable)
        {
            $sm= $this->getServiceLocator();
            $this->ratingTable = $sm->get('SuperAdmin\Model\RatingTable'); 
        }
        return $this->ratingTable;
    }
    
    
    public function indexAction() {
        
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $id= $this->params()->fromRoute('id');
            //echo $id;
            $viewModel= new ViewModel(array(
            'employee' => $id,
        ));
        return $viewModel;
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    
    
    
    
    
    public function addAction()
    {	
                
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            //echo $id;
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost()){
                $count = $request->getPost('noskill');
                $data = new RatingModel;
                for($i=1; $i< $count; $i++){
                    $data->setEmployeeCode($id);
                    $data->setSkill($request->getPost('skill'.$i));
                    $data->setRating($request->getPost('rating'.$i));
                    $this->getRatingTable()->insertData($data);
                }   
            
            return $this->redirect()->toRoute('superAdmin/rating/index',array('id'=>$id));
            }
            
                $viewModel= new ViewModel(array(
                'employee' => $id,
            ));
            return $viewModel;
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
        
    }
    
    
    public function ajaxListAction()
    {    
        $id= $this->params()->fromRoute('id');
        
        $viewModel= new ViewModel(array(
            'ratingDatas' => $this->getRatingTable()->fetchSpecificData($id),
            'employee' => $id,
        ));

        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    
    public function deleteAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $idt= $this->params()->fromRoute('idt');
            $id= $this->params()->fromRoute('id');
            $this->getRatingTable()->deleteData($idt);
            $this->flashMessenger()->addMessage("Deleting...");
            return $this->redirect()->toRoute('superAdmin/rating/index',array('id'=>$id));
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    public function editAction()
    {	
                
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            $idt = $this->params()->fromRoute('idt');
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost()){
                $count = $request->getPost('noskill');
                $data = new RatingModel;
                
                $data->setEmployeeCode($id);
                $data->setSkill($request->getPost('skill'));
                $data->setRating($request->getPost('rating'));
                $this->getRatingTable()->editData($data, $idt);
                 
            
            return $this->redirect()->toRoute('superAdmin/rating/index',array('id'=>$id));
            }
            $viewModel= new ViewModel(array(
            'ratingDatas' => $this->getRatingTable()->fetchSpecificSkillData($idt),
              'employee' => $id,  
        ));
        return $viewModel;
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
        
    }
    
    public function cancelAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            return $this->redirect()->toRoute('superAdmin/rating/index',array('id'=>$id));
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    
    public function backAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            return $this->redirect()->toRoute('superAdmin/registration/profile',array('id'=>$id));
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
}
    