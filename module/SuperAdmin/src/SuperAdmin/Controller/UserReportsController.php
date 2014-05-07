<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;

use SuperAdmin\Model\AttendenceModel;
use SuperAdmin\Model\AttendenceTable;

use SuperAdmin\Model\MonthlyModel;
use SuperAdmin\Model\MonthlyTable;


class UserReportsController extends AbstractActionController
{
    protected $authService;
    protected $registrationTable;
    protected $workHistoryTable;
    protected $attendenceTable;
    protected $monthlyTable;

    public function getAuthService()
    {
        if (! $this->authService)
        {
            $this->authService = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authService;
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
    public function getWorkHistoryTable()
    {		
        if(!$this->workHistoryTable)
        {	
            $sm = $this->getServiceLocator();
            $this->workHistoryTable = $sm->get('SuperAdmin\Model\UserWorkHistoryTable'); 
        }
        return $this->workHistoryTable;
    }
    
    public function getAttendenceTable()
    {		
        if(!$this->attendenceTable)
        {	
            $sm = $this->getServiceLocator();
            $this->attendenceTable = $sm->get('SuperAdmin\Model\AttendenceTable'); 
        }
        return $this->attendenceTable;
    }
    
    public function getMonthlyTable()
    {		
        if(!$this->monthlyTable)
        {	
            $sm = $this->getServiceLocator();
            $this->monthlyTable = $sm->get('SuperAdmin\Model\MonthlyTable'); 
        }
        return $this->monthlyTable;
    }


    public function indexAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            return new ViewModel(array(
                'flashMessages' => $this->flashMessenger()->getMessages(),
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
            ));
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
    }
    public function userReportsAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $config = $this->getServiceLocator()->get('config');
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            //Date1
            if($request->getPost('date1') != '')
            {
                $input_date1= $request->getPost('date1');
                $month = substr($input_date1,3,2);
                $day = substr($input_date1,0,2);
                $year = substr($input_date1,6,4);                            
                $d1 = $year.'-'.$month.'-'.$day;
            }
            //Date2
            if($request->getPost('date2') != '')
            {
                $input_date2= $request->getPost('date2');
                $month2 = substr($input_date2,3,2);
                $day2 = substr($input_date2,0,2);
                $year2 = substr($input_date2,6,4);                            
                $d2 = $year2.'-'.$month2.'-'.$day2;
            }
            
            $records = iterator_to_array($this->getWorkHistoryTable()->fetchAllRecords($request->getPost('name'),$d1,$d2));
            $totTime = iterator_to_array($this->getWorkHistoryTable()->totalTime($request->getPost('name'),$d1,$d2));
            
            foreach($totTime as $v)
            {
                $totTime= $v['total_time'];
                $ot= $v['ot'];
            }
            
            $viewModel= new ViewModel(array(
                'records'=> $records,
                'totWork'=> $totTime,
                'ot'=> $ot,
                'path' => $config,
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
            ));
            $viewModel->setTemplate('/super-admin/user-reports/index.phtml');
            return $viewModel;
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

    
    public function salaryCalculatorAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                if($request->getPost('date1') != '')
                {
                    $input_date1= $request->getPost('date1');
                    $month = substr($input_date1,3,2);
                    $day = substr($input_date1,0,2);
                    $year = substr($input_date1,6,4);                            
                    $d1 = $year.'-'.$month.'-'.$day;
                }
                //Date2
                if($request->getPost('date2') != '')
                {
                    $input_date2= $request->getPost('date2');
                    $month2 = substr($input_date2,3,2);
                    $day2 = substr($input_date2,0,2);
                    $year2 = substr($input_date2,6,4);                            
                    $d2 = $year2.'-'.$month2.'-'.$day2;
                }
                $id= $request->getPost('name');

                $leaves = $this->getAttendenceTable()->getNoOfLeaves($id, $d1, $d2);
                $halfD = 0;
                $fullD = 0;
                $halfP = 0;
                $fullP = 0;
                $days = 0;
                
                foreach ($leaves as $key => $leave) {
                    if($leave['leave_type'] == "Half Day")
                        $halfD += 0.5;
                    if($leave['leave_type'] == "Full Day")
                        $fullD += 1;
                    if($leave['leave_type'] == "Paid Half Day")
                        $halfP += 0.5;
                    if($leave['leave_type'] == "Paid Full Day")
                        $fullP += 1;     
                }
                $total = $halfD + $fullD + $halfP + $fullP;
                $salaryPerDay = $this->getRegistrationTable()->getSalary($id);
                //echo $salaryPerDay;
                $now = strtotime("$d2");
                $your_date = strtotime("$d1");
                $datediff = $now - $your_date;
                $days = (floor($datediff/(60*60*24))) + 1;
                if($total > 2){
                    $totalP = $halfP + $fullP;
                    $days =  $days - $totalP;
                    $totalSalary = ($salaryPerDay * $days);
                }
                else {
                    $totalSalary = $salaryPerDay * $days; //exit;
                }
                
                //echo $totalSalary;    //exit;            
                
            }
            
            $viewModel = new ViewModel(array(
                'salary' => $totalSalary,
                'records' => $this->getAttendenceTable()->getNoOfLeaves($id, $d1, $d2),
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
               
            ));
            return $viewModel;
            
        }
        else
        {
           return $this->redirect()->toRoute('superAdmin');    
        }
    }
    
}
