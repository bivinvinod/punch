<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;


class UserReportsController extends AbstractActionController
{
    protected $authService;
    protected $registrationTable;
    protected $workHistoryTable;

    public function getAuthService()
    {
        if (! $this->authService)
        {
            $this->authService = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authService;
    }

    public function getRegistrationTable()
    {		
        if(!$this->registrationTable)
        {	
            $sm = $this->getServiceLocator();
            $this->registrationTable = $sm->get('SuperAdmin\Model\RegistrationTable'); 
        }
        return $this->registrationTable;
    }
    public function getWorkHistoryTable()
    {		
        if(!$this->workHistoryTable)
        {	
            $sm = $this->getServiceLocator();
            $this->workHistoryTable = $sm->get('SuperAdmin\Model\UserWorkHistoryTable'); 
        }
        return $this->workHistoryTable;
    }


    public function indexAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            return new ViewModel(array(
                'flashMessages' => $this->flashMessenger()->getMessages(),
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
            ));
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
    }
    public function userReportsAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $config = $this->getServiceLocator()->get('config');
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            //Date1
            if($request->getPost('date1') != '')
            {
                $input_date1= $request->getPost('date1');
                $month = substr($input_date1,3,2);
                $day = substr($input_date1,0,2);
                $year = substr($input_date1,6,4);                            
                $d1 = $year.'-'.$month.'-'.$day;
            }
            //Date2
            if($request->getPost('date2') != '')
            {
                $input_date2= $request->getPost('date2');
                $month2 = substr($input_date2,3,2);
                $day2 = substr($input_date2,0,2);
                $year2 = substr($input_date2,6,4);                            
                $d2 = $year2.'-'.$month2.'-'.$day2;
            }
            
            $records = iterator_to_array($this->getWorkHistoryTable()->fetchAllRecords($request->getPost('name'),$d1,$d2));
            $totTime = iterator_to_array($this->getWorkHistoryTable()->totalTime($request->getPost('name'),$d1,$d2));
            
            foreach($totTime as $v)
            {
                $totTime= $v['total_time'];
                $ot= $v['ot'];
            }
            
            $viewModel= new ViewModel(array(
                'records'=> $records,
                'totWork'=> $totTime,
                'ot'=> $ot,
                'path' => $config,
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
            ));
            $viewModel->setTemplate('/super-admin/user-reports/index.phtml');
            return $viewModel;
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
    }

    public function ajaxList()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
        
            $viewModel = new ViewModel(array(
                'listCountryData' => $this->getCountryTable()->listAllLogoForAdmin(),
                'flashMessages' => $this->flashMessenger()->getMessages()

            ));

            $viewModel->setTerminal(true);
            return $viewModel;
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
    }
    
    
    public function salaryCalculatorAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $id= $this->params()->fromRoute('id');
            

            
            
            
            
        }
        else
        {
           return $this->redirect()->toRoute('superAdmin');    
        }
    }
    
}
