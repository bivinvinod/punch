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

use SuperAdmin\Model\LeaveModel;
use SuperAdmin\Model\LeaveTable;


class LeaveController extends AbstractActionController
{
    protected $authservice;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authservice;
    }
    
    public function getLeaveTable()
    {	
        if(!$this->leaveTable)
        {
            $sm= $this->getServiceLocator();
            $this->leaveTable = $sm->get('SuperAdmin\Model\LeaveTable'); 
        }
        return $this->leaveTable;
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
                $s1=1;
                $fromTime = $request->getPost('fromTime');
                $toTime = $request->getPost('toTime'); 
                $type = $request->getPost('leaveType');
                if($type == "Full Day" || $type == "Paid Full Day" ){
                    $fromTime = "09:00:00";
                    $toTime = "18:00:00";
                }
                $leave->setStatus($s1);
                $leave->setDescription($request->getPost('dis'));
                $leave->setFrom($fromTime);
                $leave->setTo($toTime);
                $leave->setType($type);
                $this->getLeaveTable()->insertLeave($leave);
                return $this->redirect()->toRoute('superAdmin/leave');
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
                'leaveDatas' => $this->getLeaveTable()->fetchAllData(),
            ));

            $viewModel->setTerminal(true);
            return $viewModel;
        }
    
        
        
         public function statusAction()
        {
                 if($_POST['offId'] != '')
                        {
                            if($this->getLeaveTable()->updateLeaveStatusOff($_POST['offId']))
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
                                if($this->getLeaveTable()->updateLeaveStatusOn($_POST['onId']))
                                {     
                                    echo "Status Edited SuccessFully....";exit;
                                }
                                else
                                {
                                    echo "You can't Change Status....";exit;
                                }
                            }
            
            
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
              $leave = new LeaveModel();
              $leave->setId($id);
              $leave->setDate($request->getPost('date'));
              $leave->setDescription($request->getPost('desc'));
              $leave->setfrom($request->getPost('fromTime'));
              $leave->setTo($request->getPost('toTime'));
              $leave->setType($request->getPost('type'));
              $this->getLeaveTable()->updateLeave($leave);
              return $this->redirect()->toRoute('superAdmin/leave');
            }
            $viewModel = new ViewModel(array(
               'edit' => $this->getLeaveTable()->fetchspecificData($id), 
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
