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
    
    public function ajaxListAction()
        {
            if($this->params()->fromRoute('id'))
            {
                $id = $this->params()->fromRoute('id');
                $this->layout('layout/superAdminDashboardLayout');
                $viewModel= new ViewModel(array(
                'employeeLeaveDatas' => $this->getAttendenceTable()->SpecificEmployeeData($id),
                ));
                return $viewModel;
            }
            else
            {
            $viewModel= new ViewModel(array(
                'employeeLeaveDatas' => $this->getAttendenceTable()->getNames(),
            ));

            $viewModel->setTerminal(true);
            return $viewModel;
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
		$fromTime = $request->getPost('fromTime');
                $toTime = $request->getPost('toTime'); 
                $type = $request->getPost('leaveType');
                if($type == "Full Day" || $type == "Paid Full Day" ){
                    $fromTime = "09:00:00";
                    $toTime = "18:00:00";
                }
		$employeeCode = $request->getPost('employeeName');
		$leaveMatter = $request->getPost('leaveMatter');
		$s1=1;


                $attendence->setLeaveDate($d1);
                $attendence->setUserId($employeeCode);
		$attendence->setFrom($fromTime);
                $attendence->setTo($toTime);
                $attendence->setLeaveType($type);
                $attendence->setLeaveMatter($leaveMatter);
                $attendence->setStatus($s1);


                $this->getAttendenceTable()->inserts($attendence);
                return $this->redirect()->toRoute('superAdmin/attendence');
            }
                
            $viewModel = new ViewModel(array(
                'name' => $this->getRegistrationTable()->fetchAllUsers(),

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
                //echo "Here... crap"; exit;
             
                        if($_POST['offId'] != '')
                        {
                            if($this->getAttendenceTable()->updateEmployeeLeaveStatusOff($_POST['offId']))
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
                                if($this->getAttendenceTable()->updateEmployeeLeaveStatusOn($_POST['onId']))
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
              $employeeCode = $request->getPost('employeeName');
              $employeeName = $this->getRegistrationTable()->getEmployeeName($employeeCode); 
              
                
              $attendence = new AttendenceModel();
              $attendence->setId($id);  
              $attendence->setLeaveDate($request->getPost('date'));
	      $attendence->setLeaveType($request->getPost('leaveType'));   
              $attendence->setLeaveMatter($request->getPost('desc'));
              $attendence->setUserId($request->getPost('employeeName'));
   
              $this->getAttendenceTable()->updateEmployeeLeave($attendence);
              return $this->redirect()->toRoute('superAdmin/attendence');
            }
            $viewModel = new ViewModel(array(
               'edit' => $this->getAttendenceTable()->fetchSpecificData($id),
               'name' => $this->getRegistrationTable()->fetchAllUsers(),
            ));
            return $viewModel;
                       
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    public function specificAction() {
        
        if($this->getAuthService()->hasIdentity())
        {
            $id = $this->params()->fromRoute('id');
            $this->layout('layout/superAdminDashboardLayout');
            $viewModel= new ViewModel(array(
            'employeeLeaveDatas' => $this->getAttendenceTable()->SpecificEmployeeData($id),
            ));
            $viewModel->setTerminal(true);
            return $viewModel;
        }
        else {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
        
    }
    
    
    
}

