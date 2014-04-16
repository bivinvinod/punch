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

use SuperAdmin\Model\LoginModel;
use SuperAdmin\Model\LoginTable;


class IndexController extends AbstractActionController
{
    protected $authService;
    protected $loginTable;
    protected $logoTable;

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
        
            $this->layout('layout/superAdmin');
            return new ViewModel(array(
                'flashMessages' => $this->flashMessenger()->getMessages(),
            ));
        
    }


    public function superAdminAuthenticateAction()
    {
       
            $this->layout('layout/layoutAgentSuperAdmin');
            $request = $this->getRequest();
            if ($request->isPost())
            {
                if($request->getPost('username') && $request->getPost('password') != '' )
                {
                    
                    $s=$this->getAuthService()->getAdapter()
                                              ->setIdentity($request->getPost('username'))
                                              ->setCredential($request->getPost('password'));
                         
                    $result = $this->getAuthService()->authenticate();
                    //print_r($result); exit;
                    if ($result->isValid())
                    {     
                        
                        $adminUserResult = $this->getLoginTable()->getUserDetails($request->getPost('username'), $request->getPost('password'));                   
                        $adminUser = $adminUserResult->current();
                        //print_r($adminUser);exit;
                        
                        $session = new Container('superAdmin');
                        $session->offsetSet('superAdminId',     $adminUser['id']);
                        $session->offsetSet('superAdminName', $adminUser['username']);
                        $session->offsetSet('superAdminStatus', $adminUser['status']);
                        $session->offsetSet('superAdminUserType', $adminUser['user_type']);
                        
                        $superAdminId   = $session->offsetGet('superAdminId');
                        $superAdminName = $session->offsetGet('superAdminName');
                        $superAdminStatus = $session->offsetGet('superAdminStatus');
                        $superAdminUserType = $session->offsetGet('superAdminUserType');
                        //echo $superAdminUserType; exit;
                        $ip       = $_SERVER['REMOTE_ADDR'];
                        $this->getLoginTable()->updateUserLogin($superAdminId,$ip);
                        if($superAdminUserType == 'user' && $superAdminStatus == '1')
                        {
                            return $this->redirect()->toRoute('superAdmin/superAdminUserDashboard');
                        }
                        else if($superAdminUserType == 'admin' && $superAdminStatus == '1')
                        {
                            //exit("haiii");
                            return $this->redirect()->toRoute('superAdmin/superAdminAdminDashboard');
                        }
                        else if($superAdminUserType == 'superadmin' && $superAdminStatus == '1')
                        {
                            return $this->redirect()->toRoute('superAdmin/superAdminDashboard');
                        }
                        else
                        {
                            $this->flashmessenger()->addMessage("Your are not Active Super Admin");
                            return $this->redirect()->toRoute('superAdmin');
                        }   
                    }
                    else
                    {
                        $this->flashmessenger()->addMessage("You are not Registered Agent Super Admin");
                        return $this->redirect()->toRoute('superAdmin');
                    }
                }
                else
                {
                    $this->flashmessenger()->addMessage("Username or Password is Not correct");
                    return $this->redirect()->toRoute('superAdmin');
                }     
            }
        
    }

    public function superAdminDashboardAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
             
    }
    public function superAdminUserDashboardAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            return $this->layout('layout/superAdminUserDashboardLayout');
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
             
    }
    public function superAdminAdminDashboardAction()
    {
        
        if ($this->getAuthService()->hasIdentity())
        {
            //exit("haii");
           return $this->layout('layout/superAdminAdminDashboardLayout');
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

    public function superAdminLogoutAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->getAuthService()->clearIdentity();                
            $session = new Container('superAdmin');
            $session->getManager()->getStorage()->clear('superAdmin');
            unset($_SESSION['superAdmin']);
        
            $this->flashmessenger()->addMessage("You've been logged out...");
            return $this->redirect()->toRoute('superAdmin');
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
    }
    
}
