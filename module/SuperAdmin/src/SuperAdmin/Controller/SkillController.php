<?php 

namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


use SuperAdmin\Model\SkillModel;
use SuperAdmin\Model\SkillTable;


class SkillController extends AbstractActionController
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
    
 
    
    public function getSkillTable()
    {	
        if(!$this->skillTable)
        {
            $sm= $this->getServiceLocator();
            $this->skillTable = $sm->get('SuperAdmin\Model\SkillTable'); 
        }
        return $this->skillTable;
    }
    
    
    public function indexAction() {
        
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            
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
            
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost()){
                $count = $request->getPost('noskill');
                $data = new SkillModel;
                for($i=1; $i< $count; $i++){
                    $data->setSkill($request->getPost('skill'.$i));
                    $this->getSkillTable()->insertData($data);
                }   
            
            return $this->redirect()->toRoute('superAdmin/skill');
            }
            
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
            'skillDatas' => $this->getSkillTable()->fetchAllData(),
        ));

        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    
    public function deleteAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            $this->getSkillTable()->deleteData($id);
            $this->flashMessenger()->addMessage("Deleting...");
            return $this->redirect()->toRoute('superAdmin/skill');
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
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost()){
                $count = $request->getPost('noskill');
                $data = new SkillModel;
                $data->setId($id);
                $data->setSkill($request->getPost('skill'));
                $this->getSkillTable()->editData($data);
            return $this->redirect()->toRoute('superAdmin/skill');
            }
            $viewModel= new ViewModel(array(
            'skillDatas' => $this->getSkillTable()->fetchSpecificSkillData($id),
        ));
        return $viewModel;
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
        
    }
    
    
}
    