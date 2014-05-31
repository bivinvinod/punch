<?php 
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


use SuperAdmin\Model\MealModel;
use SuperAdmin\Model\MealTable;


class MealPolicyController extends AbstractActionController
{
    protected $authService;
    




    public function getAuthService()
    {
        if (! $this->authService)
        {
            $this->authService = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authService;
    }
    
    
    public function getMealTable()
    {	
        if(!$this->mealTable)
        {
            $sm= $this->getServiceLocator();
            $this->mealTable = $sm->get('SuperAdmin\Model\MealTable'); 
        }
        return $this->mealTable;
    }
    
    
    public function indexAction()
    {	
                
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            
            
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
        
    }
    
    public function ajaxListAction()
    {
        $viewModel= new ViewModel(array(
            'policyDatas' => $this->getMealTable()->fetchAllData(),
        ));

        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    public function addAction()
    {   
        if($this->getAuthService()->hasIdentity()){
            $this->layout('layout/superAdminDashboardLayout');
            
            $request= $this->getRequest();
            if($request->isPost()){
                $datas= new MealModel();
                
                $mealType = $request->getPost('meal');
                $fromTime = $request->getPost('fromTime');
                $toTime = $request->getPost('toTime');
                
                $datas->setMealType($mealType);
                $datas->setStartTime($fromTime);  
                $datas->setStopTime($toTime);
                $this->getMealTable()->insertData($datas);
                return $this->redirect()->toRoute('superAdmin/MealPolicy');
                
            }
            
            
        }
        else
        {
           $this->flashMessenger()->addMessage("Please Login");
           return $this->redirect()->toRoute("superAdmin"); 
        }
        
    }
    
    
    public function statusAction()
        {
             //echo "here"; exit;
            if($_POST['offId'] != '')
            {
                if($this->getMealTable()->updateMealStatusOff($_POST['offId']))
                {     
                    echo "Status Edited SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Change Status....";exit;
                }
            }




                //Status On
                if($_POST['onId'] != '')
                {
                    if($this->getMealTable()->updateMealStatusOn($_POST['onId']))
                    {     
                        echo "Status Edited SuccessFully....";exit;
                    }
                    else
                    {
                        echo "You can't Change Status....";exit;
                    }
                } 
        }
        
        
        public function editAction() {
            $id= $this->params()->fromRoute('id');
            if($this->getAuthService()->hasIdentity()){
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $datas= new MealModel();
                
                $mealType = $request->getPost('meal');
                $fromTime = $request->getPost('fromTime');
                $toTime = $request->getPost('toTime');
                
                $datas->setId($id);
                $datas->setMealType($mealType);
                $datas->setStartTime($fromTime);  
                $datas->setStopTime($toTime);
                $this->getMealTable()->updateMealData($datas);
                return $this->redirect()->toRoute('superAdmin/mealPolicy');
            }
            $viewModel = new ViewModel(array(
               'edit' => $this->getMealTable()->fetchspecificData($id), 
            ));
            return $viewModel;
            }
            else{
                $this->flashMessenger()->addMessage("Please Login");
                return $this->redirect()->toRoute("superAdmin");   
            }
            
        }    
        
}

