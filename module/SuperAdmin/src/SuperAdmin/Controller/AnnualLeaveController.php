<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\AttendenceModel;
use SuperAdmin\Model\AttendenceTable;


class AnnualLeaveController extends AbstractActionController
{
    protected $authservice;
    protected $attendenceTable;
    protected $registrationTable;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
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
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
}
    