<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;



use SuperAdmin\Model\MonthlyInOutModel;
use SuperAdmin\Model\MonthlyInOutTable;

use SuperAdmin\Model\UserWorkHistoryModel;
use SuperAdmin\Model\UserWorkHistoryTable;


class editController extends AbstractActionController
{
    protected $userWorkHistoryTable;
    protected $registration;
    protected $monthlyInOutTable;
    protected $authservice;
    
    
    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authservice;
    }
    
    
    
    public function getUserWorkHistoryTable()
    {
        if(!$this->userWorkHistoryTable)
        {	
            $sm = $this->getServiceLocator();
            $this->userWorkHistoryTable = $sm->get('SuperAdmin\Model\UserWorkHistoryTable'); 
        }
        return $this->userWorkHistoryTable;
    }
    
    public function getMonthlyInOutTable()
    {
        if(!$this->monthlyInOutTable)
        {	
            $sm = $this->getServiceLocator();
            $this->monthlyInOutTable = $sm->get('SuperAdmin\Model\MonthlyInOutTable'); 
        }
        return $this->monthlyInOutTable;
    }
    
    public function getRegistrationTable()
    {
        if (!$this->registration)
        {
            $ser = $this->getServiceLocator();
            $this->registration = $ser->get('SuperAdmin\Model\RegistrationTable');
        }
        return $this->registration;
    }
    

    public function indexAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $viewModel= new ViewModel(array(
                'userNames' => $this->getRegistrationTable()->fetchAllUsers(),
                'flashMessages' => $this->flashMessenger()->getMessages()
            ));
            return $viewModel;
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    
    
    
    public function editRecordAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request = $this->getRequest();
             if ($request->isPost()) {
                $name = $request->getPost('name');
                $d1 = $request->getPost('date1');
                
                $res = $this->getMonthlyInOutTable()->editRecords($name, $d1);
                $viewModel= new ViewModel(array(
                'records' => $this->getMonthlyInOutTable()->editRecords($name, $d1)
                ));
            return $viewModel;
            }
           
            
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    
    public function updateRecordAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request = $this->getRequest();
            $postData = $this->getRequest()->getPost()->toArray();
            if ($request->isPost()) {
              $data = new MonthlyInOutModel;
              $totalInRecords = $request->getPost('totalInRecords');
              $id = $request->getPost('monthly_table_id');
              for($i=0; $i<$totalInRecords; $i++)
              { 
                $inTime = $postData['inTime'][$i];
                if($inTime!= ''){
                    $outTime = NULL;
                    $data->setInTime($inTime);
                    $data->setOutTime($outTime);
                    $data->setId($postData['inTableId'][$i]);
                    $this->getMonthlyInOutTable()->updateInOutTime($data);
                }
              }
                $totalOutRecords = $request->getPost('totalOutRecords');
                for($i=0; $i<$totalOutRecords; $i++)
                {
                    $outTime =  $postData['outTime'][$i];
                    $inTime =  NULL;
                    $data->setInTime($inTime);
                    $data->setOutTime($outTime);
                    $data->setId($postData['outTableId'][$i]);
                    $this->getMonthlyInOutTable()->updateInOutTime($data);
                }
                
              return $this->redirect()->toRoute('superAdmin/edit/recalc', array('id'=>$id));
            }
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    public function recalcAction()
    {
       if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $id= $this->params()->fromRoute('id');
            $records = $this->getMonthlyInOutTable()->selectMonthlyInOutTable($id);
            foreach ($records as $value) {
                //print_r($value);
            }
            
            
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    
    public function ajaxTableAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $inTotal = $_POST['inTotal'];
            $outTotal = $_POST['outTotal'];
            $viewModel= new ViewModel(array(
                'inTotal' =>  $inTotal,
                'outTotal' => $outTotal
            ));
            $viewModel->setTerminal(true);
            return $viewModel;
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
}