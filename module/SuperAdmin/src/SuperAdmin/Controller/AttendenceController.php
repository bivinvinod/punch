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
            $this->attendenceTable = $sm->get('SuperAdmin\Model\AttendenceTableTable'); 
        }
        return $this->attendenceTable;
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
                $leave= new LeaveModel();
                //Date
                if($request->getPost('date') != '')
                {
                    $input_date= $request->getPost('date');
                    $month = substr($input_date,3,2);
                    $day = substr($input_date,0,2);
                    $year = substr($input_date,6,4);                            
                    $d1 = $year.'-'.$month.'-'.$day;
                }
                $leave->setDate($d1);
                $leave->setDescription($request->getPost('dis'));
                $this->getLeaveTable()->inserts($leave);
            }
            
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
}
