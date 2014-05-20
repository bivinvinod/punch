<?php
namespace SuperAdmin\Controller;

use DateTime;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;

use SuperAdmin\Model\AttendenceModel;
use SuperAdmin\Model\AttendenceTable;

use SuperAdmin\Model\MonthlyModel;
use SuperAdmin\Model\MonthlyTable;

use SuperAdmin\Model\LeaveModel;
use SuperAdmin\Model\LeaveTable;


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
    public function getLeaveTable()
    {		
        if(!$this->leaveTable)
        {	
            $sm = $this->getServiceLocator();
            $this->leaveTable = $sm->get('SuperAdmin\Model\LeaveTable'); 
        }
        return $this->leaveTable;
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
            $userDetails = $this->getRegistrationTable()->viewProfile($request->getPost('name'));
            //$leave = $this->getLeaveTable()->fetchAllLeave($d1,$d2);
            
            foreach($totTime as $v)
            {
                $totTime= $v['total_time'];
                $ot= $v['ot'];
            }
            foreach($userDetails as $q)
            {
                $uname= $q['employee_name'];
                $sout= $q['shift_out_time'];
            }
            
            $viewModel= new ViewModel(array(
                'records'       => $records,
                'uname'         => $uname,
                'sout'         => $sout,
                'totWork'       => $totTime,
                'ot'            => $ot,
                'userNames'     => $this->getRegistrationTable()->fetchAllUsers(),
                'd1'            => $d1,
                'd2'            => $d2,
                'uid'           => $request->getPost('name'),
                //'leaveCount' => $leave
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

    
    public function salaryCalculatorAction() {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $viewModel = new ViewModel(array(
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
               
            ));
            return $viewModel;
        }
        else{
            return $this->redirect()->toRoute('superAdmin'); 
        }
        
    }
    
    public function salaryReportAction()
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
                
            }
            
            $viewModel = new ViewModel(array(
                'salary' => $totalSalary,
                'records' => $this->getAttendenceTable()->getNoOfLeaves($id, $d1, $d2),
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
            ));
            $viewModel->setTemplate('/super-admin/user-reports/salary-calculator.phtml');
            return $viewModel;
            
        }
        else
        {
           return $this->redirect()->toRoute('superAdmin');    
        }
    }
    public function allEmpChartsAction()
    {       
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            //$con= $this->params()->fromRoute('action1');
            
            
            $viewModel= new ViewModel(array(
                                
            ));
            
            return $viewModel;
            
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
        
    }
    public function ajaxChartsAction()
    {       
        if ($this->getAuthService()->hasIdentity())
        {
            $request= $this->getRequest();
             $this->layout('layout/superAdminDashboardLayout');
            if($request->getPost('date1') != '' && $request->getPost('date2') != '')
            {
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
                
                //calculate sunday
                $start = new DateTime($d1);
                $end = new DateTime($d2);
                $days = $start->diff($end, true)->days;

                $sundays = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);

                //Sturday calculation
               // $saturDay=$this->getLeaveTable()->fetchAllSaturDay($d1,$d2);
                //$saturDay= $saturDay-2;
                
                
                //Total days
                $now = strtotime($d2); // or your date as well
                $your_date = strtotime($d1);
                $datediff = $now - $your_date;
                $totalDays=floor($datediff/(60*60*24))+1;
                $workingDays= ($totalDays-$sundays-2);
                $monthWorking= $workingDays*8;
                
                $strArray= array();
                $result= $this->getWorkHistoryTable()->fetchAllEmpCharts($d1,$d2);
                
                //print_r($result); exit;
                foreach($result as $val)
                {
                    $h= split(':', $val['totWork']);
                    if($h[0] > $monthWorking )
                    {
                        $h= split(':', $val['totWork']);
                        $name= split(' ',$val['employee_name']);
                        $n= "'$name[0]'";
                        $i[0]="null";
                        $j[0]="null";

                    }
                    elseif($h[0] < $monthWorking)
                    {
                        $i= split(':', $val['totWork']);
                        $name= split(' ',$val['employee_name']);
                        $n= "'$name[0]'";
                        $h[0]="null";
                        $j[0]="null";
                    }
                    else
                    {
                        $j= split(':', $val['totWork']);
                        $name= split(' ',$val['employee_name']);
                        $n= "'$name[0]'";
                        $h[0]="null";
                        $i[0]="null";
                    }
                    $strArr [] = "[{$n}, {$h[0]},{$i[0]},{$j[0]} ]";
                }
                //print_r($strArr); exit;
                
                $viewModel = new ViewModel(array(
                    'strArr'        => $strArr,
                    'd1'            => $d1,
                    'd2'            => $d2,
                    'monthWorking'  => $monthWorking,
                    'totalDays'     => $totalDays,
                    'sundays'       => $sundays,
                    'saturdays'     => $saturDay,
                    'workingDays'  => $workingDays
                    
                ));
                
                return $viewModel;
            }
            else
            {
                echo "Input is not correct";
                
            }
            
        }
        else
        {
            $this->flashmessenger()->addMessage("Please login...");
            return $this->redirect()->toRoute('admin');
        }
        
    }
    
    public function chartsAction()
    {       
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $con= $this->params()->fromRoute('action1');
            $s= split('_', $con);
            $records = iterator_to_array($this->getWorkHistoryTable()->fetchAllHours($s[2],$s[1],$s[0]));
            //$totWork= iterator_to_array($this->getWorkHistoryTable()->fetchTotalWork($s[2],$s[1],$s[0]));
            
            $strArr = array();
            foreach ($records as $key => $val) {
                //echo $val['worked_hour']; exit;
                if($val['worked_hour'] > '08:00:00')
                {
                    $h= split(':', $val['worked_hour']);
                    $i[0]= "null";
                    $j[0]= "null";
                    
                }
                elseif($val['worked_hour'] < '08:00:00')
                {
                    //echo $val['worked_hour'];exit;
                    $i= split(':', $val['worked_hour']);
                    
                    $h[0]= "null";
                    $j[0]= "null";
                }
                else
                {
                    $j= split(':', $val['worked_hour']);
                    $h[0]= "null";
                    $i[0]= "null";
                }
                
                $date= split('-', $val['worked_date']);
                $name= $val['employee_name'];
                $strArr [] = "['{$date[2]}', {$h[0]}, {$i[0]}, {$j[0]}]";
                
            }
            
            //print_r($records); exit;
            $viewModel= new ViewModel(array(
                'd1'    =>$s[0],
                'd2'    => $s[1],
                'name'       => $name,
                'strArr' => $strArr
            ));
            //$viewModel->setTemplate('/super-admin/user-reports/index.phtml');
            return $viewModel;
            
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
        
    }
    
    public function employeesMonthWaysChartAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
//            $result= $this->getWorkHistoryTable()->fetchAllEmpMonthlyWork();
//            $cnt= count($result);
//            $recArr = array();
//            foreach($result as $rs)
//            {
//                $recArr[$rs['mw']][] = $rs;
//                                   
//            }
                  
            
            
            $viewModel = new ViewModel(array(
                'userNames' => $this->getRegistrationTable()->fetchAllUsers(),
                               
            ));
            return $viewModel;
        }
        else
        {
           return $this->redirect()->toRoute('superAdmin');    
        }
        
    }
    
    public function monthChartAction()
    {       
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $name= $request->getPost("name");
                $year= $request->getPost("year");
                $result= $this->getWorkHistoryTable()->fetchAllEmpMonthlyWork($name,$year);
                foreach ($result as $val)
                {
                    $month= substr(date("F", mktime(0, 0, 0, $val['mw'], 10)),0,3);
                    $h= split(':', $val['twh']);
                    $name= $val['employee_name'];
                    $strArr [] = "['{$month}', {$h[0]} ]";
                                       
                    
                }
            }
            $viewModel = new ViewModel(array(
                'userNames' => $this->getRegistrationTable()->fetchAllUsers(),
                'name'  => $name,
                'strArr' => $strArr                             
            ));
            
            $viewModel->setTemplate('/super-admin/user-reports/employees-month-ways-chart.phtml');
            return $viewModel;
                
                      
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
        
    }
    
    public function monthAllChartAction()
    {       
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
           
            $viewModel = new ViewModel(array(
                'userNames' => iterator_to_array($this->getRegistrationTable()->fetchAllUsers()),
                'name'  => $name,
                'strArr' => $strArr                             
            ));
            
            //$viewModel->setTemplate('/super-admin/user-reports/employees-month-ways-chart.phtml');
            return $viewModel;
                
                      
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
        
    }
    public function monthAllEmpChartAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
            {
                $name1= $request->getPost("name1");
                $name2= $request->getPost("name2");
                $name3= $request->getPost("name3");
                $year= $request->getPost("year");
                $result= $this->getWorkHistoryTable()->fetchAllMonthlyWork($name1,$name2,$name3,$year);
                
                $attArr= array();
                
                
                foreach ($result as $keyIndex => $val)
                {                     
                    $attArr[$val['mw']][]=$val;
                    $s[]= $val['employee_name'];
                                                                                
                }
                //print_r($s);exit;
                $str = array();
                foreach($attArr as $keyIndex => $val)
                {
                    $tmpStr = array();
                    $tmpStr [] = $keyIndex;
                    
                    foreach ($val as $v)
                    {
                        $h= split(":",$v['twh']);
                        $tmpStr [] = $h[0];
                    }
                    
                    if($tmpStr[1] == NULL)
                    {
                        $tmpStr[1]= "null";
                        $tmpStr[0]=  substr(date("F", mktime(0, 0, 0, $tmpStr[0], 10)),0,3);
                        $strArr [] = "['{$tmpStr[0]}',{$tmpStr[1]}, {$tmpStr[2]}, {$tmpStr[3]} ]";
                    }
                    elseif($tmpStr[2] == NULL)
                    {
                        $tmpStr[2]= "null";
                        $tmpStr[0]=  substr(date("F", mktime(0, 0, 0, $tmpStr[0], 10)),0,3);
                        $strArr [] = "['{$tmpStr[0]}',{$tmpStr[1]}, {$tmpStr[2]}, {$tmpStr[3]} ]";
                    }
                    else if($tmpStr[3] == NULL)
                    {
                        $tmpStr[3]= "null";
                        $tmpStr[0]=  substr(date("F", mktime(0, 0, 0, $tmpStr[0], 10)),0,3);
                        $strArr [] = "['{$tmpStr[0]}',{$tmpStr[1]}, {$tmpStr[2]}, { $tmpStr[3] } ]";
                    }
                    else
                    {
                        $tmpStr[0]=  substr(date("F", mktime(0, 0, 0, $tmpStr[0], 10)),0,3);
                        $strArr [] = "['{$tmpStr[0]}',{$tmpStr[1]}, {$tmpStr[2]}, {$tmpStr[3]} ]";
                    }
                    
                   
                }
                
                 //print_r($strArr);exit;
                
            }
            $viewModel = new ViewModel(array(
                'userNames' => iterator_to_array($this->getRegistrationTable()->fetchAllUsers()),
                'name1'  => $s[0],
                'name2'  => $s[1],
                'name3'  => $s[2],
                'strArr' => $strArr ,
                'val'   => $val
            ));
            
            //$viewModel->setTemplate('/super-admin/user-reports/employees-month-ways-chart.phtml');
            return $viewModel;
                
                      
        }
        else
        {
            return $this->redirect()->toRoute('superAdmin');         
        }
    }
    
    
}
