<?php

namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;


use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;


use SuperAdmin\Model\SalaryAdvanceModel;
use SuperAdmin\Model\SalaryAdvanceTable;


class SalaryAdvanceController extends AbstractActionController
{
 
    protected $authservice;
    protected $salaryAdvanceTable;
    protected $registrationTable;
    
    
    
    public function getAuthService()
    { 
	
        if (!$this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authservice;
    }
    
    
    public function getSalaryAdvanceTable()
    {	
        if(!$this->salaryAdvanceTable)
        {
            $sm= $this->getServiceLocator();
            $this->salaryAdvanceTable = $sm->get('SuperAdmin\Model\SalaryAdvanceTable'); 
        }
        return $this->salaryAdvanceTable;
    }
    
    public function getRegistrationTable()
    {	
        if(!$this->registrationTable)
        {
            $sm= $this->getServiceLocator();
            $this->registrationTable = $sm->get('SuperAdmin\Model\RegistrationTable'); 
        }
        return $this->registrationTable;
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
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $viewModel= new ViewModel(array(
            'data' => $this->getSalaryAdvanceTable()->fetchAllData(),
            ));
            $viewModel->setTerminal(true);
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
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost()){
                
                
                $salary = new SalaryAdvanceModel();
                
                $employeeCode = $request->getPost('employeeCode');
                $date = $request->getPost('date');
                $amount = $request->getPost('amount');
                
                
                $salary->setEmployeeCode($employeeCode);
                $salary->setMonth($date);
                $salary->setamount($amount);
                $this->getSalaryAdvanceTable()->insertData($salary);
                return $this->redirect()->toRoute("superAdmin/salaryAdvance");
                
            }
            
            
            $viewModel= new ViewModel(array(
            'names' => $this->getRegistrationTable()->getEmployeeName(),
            ));
            return $viewModel;
           
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
        
    }
    
    
    public function editAction()
    {
        if($this->getAuthService()->hasIdentity()) {
            $this->layout('layout/superAdminDashboardLayout');
            $id = $this->params()->fromRoute('id');
            $request= $this->getRequest();
            if($request->isPost()){
               $salary = new SalaryAdvanceModel();
                
                $employeeCode = $request->getPost('employeeCode');
                $date = $request->getPost('date');
                $amount = $request->getPost('amount');
                
                
                $salary->setEmployeeCode($employeeCode);
                $salary->setMonth($date);
                $salary->setamount($amount);
                $salary->setId($id);
                $this->getSalaryAdvanceTable()->updateData($salary);
                return $this->redirect()->toRoute("superAdmin/salaryAdvance"); 
            }
            
            $viewModel= new ViewModel(array(
                'names' => $this->getRegistrationTable()->getEmployeeName(),
                'datas' => $this->getSalaryAdvanceTable()->fetchSpecificData($id),
            ));
            return $viewModel;
        }
        else{
            
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        } 
        
        
    }
                  
    public function deleteAction()
    {   
        if($this->getAuthService()->hasIdentity())
        {
            $idt = $_POST['tableId'];
            $this->getSalaryAdvanceTable()->deleteData($idt);
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
    
    public function listAllAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $page = (int) $this->params()->fromRoute('page',1);
            $this->layout('layout/superAdminDashboardLayout');
            $iteratorAdapter = new \Zend\Paginator\Adapter\ArrayAdapter(iterator_to_array($this->getSalaryAdvanceTable()->fullData())); 
            $fullData = new \Zend\Paginator\Paginator($iteratorAdapter); 
            $fullData->setCurrentPageNumber($page)->setItemCountPerPage(20);
            $viewModel= new ViewModel(array(
            'data' => $fullData,
            ));
            return $viewModel;

        }
        else {

            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    
}