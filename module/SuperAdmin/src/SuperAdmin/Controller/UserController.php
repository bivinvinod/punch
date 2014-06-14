<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;   
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

 
use SuperAdmin\Model\LoginModel;
use SuperAdmin\Model\LoginTable;


class UserController extends AbstractActionController
{
    protected $loginTable;
    
    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authservice;
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

    //Actions
    public function indexAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $user= new LoginModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $user->setUsername($request->getPost('username'));
                $user->setPassword(md5($request->getPost('password')));
                $user->setUserType($request->getPost('userType'));
                $user->setStatus('1');
                $this->getLoginTable()->inserts($user);
            }
                       
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
            $request= $this->getRequest();
            if($request->isPost())
            {
                $user= new LoginModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	                                
                $user->setUsername($request->getPost('username'));
                $user->setPassword(md5($request->getPost('password')));
                $user->setUserType($request->getPost('userType'));
                $user->setStatus('1');
                $this->getLoginTable()->inserts($user);
                return $this->redirect()->toRoute('superAdmin/user');
            }
                       
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    public function ajaxListAction()
    {
        $viewModel= new ViewModel(array(
            'userDatas' => $this->getLoginTable()->listAllUserData(),
        ));

        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    public function editAction()
    {
        if($this->getAuthService()->hasIdentity())
        {
            $id= $this->params()->fromRoute('id');
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $user= new LoginModel();
                
                //Current User Id from Session
                $session = new Container('user'); 
                $userId = $session->offsetGet('userId');
        	$user->setId($id);                                
                $user->setUsername($request->getPost('username'));
                $user->setUserType($request->getPost('userType'));
                $user->setPassword(md5($request->getPost('password')));
                $this->getLoginTable()->updateData($user);
                return $this->redirect()->toRoute('superAdmin/user');
            }
            $viewModel = new ViewModel(array(
               'edit' => $this->getLoginTable()->editData($id), 
            ));
            return $viewModel;
                       
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    public function statusAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $user = new LoginModel();
            //Status off
            if($_POST['offId'] != '')
            {
                if($this->getLoginTable()->updateUserStatusOff($_POST['offId']))
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
                if($this->getLoginTable()->updateUserStatusOn($_POST['onId']))
                {     
                    echo "Status Edited SuccessFully....";exit;
                }
                else
                {
                    echo "You can't Change Status....";exit;
                }
            }
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
        
    }

}
