<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\MonthlyModel;
use SuperAdmin\Model\MonthlyTable;


class LeaveController extends AbstractActionController
{
    protected $authservice;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
    }
    
    public function setLeaveTable()
    {	
        if(!$this->monthlyTable)
        {
            $sm= $this->getServiceLocator();
            $this->monthlyTable = $sm->get('SuperAdmin\Model\MonthlyTable'); 
        }
        return $this->monthlyTable;
    }
    
    public function setMonthlyInOutTable()
    {		
        if(!$this->monthlyInOutTables)
        {	
            $sm = $this->getServiceLocator();
            $this->monthlyInOutTables = $sm->get('SuperAdmin\Model\MonthlyInOutTable'); 
        }
        return $this->monthlyInOutTables;
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

    //Actions
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
    public function addAction()
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
