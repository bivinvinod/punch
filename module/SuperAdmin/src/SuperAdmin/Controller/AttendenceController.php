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

use SuperAdmin\Model\AttendenceModel;
use SuperAdmin\Model\AttendenceTable;


class AttendenceController extends AbstractActionController
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
    
    public function getAttendenceTable()
    {	
        if(!$this->attendenceTable)
        {
            $sm= $this->getServiceLocator();
            $this->attendenceTable = $sm->get('SuperAdmin\Model\AttendenceTable'); 
        }
        return $this->attendenceTable;
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
            $request= $this->getRequest();
            if($request->isPost())
            {
                $attendence= new AttendenceModel();
                //Date
                if($request->getPost('date') != '')
                {
                    $input_date= $request->getPost('date');
                    $month = substr($input_date,3,2);
                    $day = substr($input_date,0,2);
                    $year = substr($input_date,6,4);                            
                    $d1 = $year.'-'.$month.'-'.$day;
                }
                $attendence->setUserId($request->getPost('name'));
                $attendence->setLeaveDate($d1);
                $attendence->setLeaveMatter($request->getPost('dis'));
                $this->getAttendenceTable()->inserts($attendence);
            }
            $viewModel= new ViewModel(array(
                'userNames' => $this->getRegistrationTable()->fetchAllUsers(),
            ));
            return $viewModel;
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
}
