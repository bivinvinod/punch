<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;



use SuperAdmin\Model\UserWorkHistoryModel;
use SuperAdmin\Model\UserWorkHistoryTable;


class editController extends AbstractActionController
{
    protected $userWorkHistoryTable;
    protected $registration;
    
    
    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
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
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
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
                 $viewModel= new ViewModel(array(
                'record' => $this->getUserWorkHistoryTable()->getData($name, $d1)
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
    
    
    
    
    
    
}