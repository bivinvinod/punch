<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\LoginModel;
use SuperAdmin\Model\LoginTable;


class UserReportsController extends AbstractActionController
{
    protected $authService;
    protected $loginTable;

    public function getAuthService()
    {
        if (! $this->authService)
        {
            $this->authService = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authService;
    }

    public function getLoginTable()
    {
        if(!$this->loginTable)
        {
            $sm= $this->getServiceLocator();
            $this->loginTable = $sm->get('SuperAdmin\Model\LoginTable'); 
        }
        return $this->loginTable;
    }

    public function indexAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            return new ViewModel(array(
                'flashMessages' => $this->flashMessenger()->getMessages(),
            ));
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
    
}
