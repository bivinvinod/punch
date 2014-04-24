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

use SuperAdmin\Model\MonthlyInOutModel;
use SuperAdmin\Model\MonthlyInOutTable;

use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;

use SuperAdmin\Model\UserWorkHistoryModel;
use SuperAdmin\Model\UserWorkHistoryTable;


class UploadController extends AbstractActionController
{
    protected $monthlyTable;
    protected $monthlyInOutTables;
    protected $registrationTable;
    protected $userWorkHistoryTable;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
    }
    
    public function setMonthlyTable()
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
    public function getUserWorkHistoryTable()
    {
        if(!$this->userWorkHistoryTable)
        {	
            $sm = $this->getServiceLocator();
            $this->userWorkHistoryTable = $sm->get('SuperAdmin\Model\UserWorkHistoryTable'); 
        }
        return $this->userWorkHistoryTable;
    }

    //Actions
    public function indexAction()
    {	
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $config = $this->getServiceLocator()->get('config'); 
            $request=$this->getRequest();
            $path=$config['defaultValues']['upload_path'];
        
            if($request->isPost())
            {
                $file  = $this->params()->fromFiles('uploaded');
                $ext= explode('.', $file[name]);
                $monthlyTableData = new MonthlyModel();
                $workHistory = new UserWorkHistoryModel();
                if($ext[1]=="csv")
                {
                    $tot=0;
                    $handle = fopen($_FILES['uploaded']['tmp_name'], "r");
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
                    {	
                        for ($c=0; $c < 1; $c++) 
                        {
                            if($tot==0)
                            continue;
                            $input_date= mysql_real_escape_string($data[0]);
                            $month = substr($input_date,3,2);
                            $day = substr($input_date,0,2);
                            $year = '20' . substr($input_date,6,2);                            
                            $newDate = $year.'-'.$month.'-'.$day;
                            
                            //Over time calculation Based on registration
                            $shiftOut= $this->getRegistrationTable()->getShiftTime(mysql_real_escape_string($data[1]));
                            //print_r($shiftOut); echo $shiftOut['shift_in_time'];exit;
                            
                            $monthlyTableData->setDate($newDate);
                            $monthlyTableData->setEmployeeCode(mysql_real_escape_string($data[1]));
                            $monthlyTableData->setEmployeeName(mysql_real_escape_string($data[2]));
                            $monthlyTableData->setCompany(mysql_real_escape_string($data[3]));
                            $monthlyTableData->setDepartment(mysql_real_escape_string($data[4]));
                            $monthlyTableData->setCategory(mysql_real_escape_string($data[5]));
                            $monthlyTableData->setDegination(mysql_real_escape_string($data[6]));
                            $monthlyTableData->setGrade(mysql_real_escape_string($data[7]));
                            $monthlyTableData->setTeam(mysql_real_escape_string($data[8]));
                            $monthlyTableData->setShift(mysql_real_escape_string($data[9]));
                            $monthlyTableData->setInTime(mysql_real_escape_string($data[10]));
                            $monthlyTableData->setOutTime(mysql_real_escape_string($data[11]));
                            $monthlyTableData->setDuration(mysql_real_escape_string($data[12]));
                            $monthlyTableData->setLateBy(mysql_real_escape_string($data[13]));
                            $monthlyTableData->setEarlyBy(mysql_real_escape_string($data[14]));
                            $monthlyTableData->setStatus(mysql_real_escape_string($data[15]));
                            $monthlyTableData->setPunchRecords(mysql_real_escape_string($data[16]));
                            $monthlyTableData->setOverTime(mysql_real_escape_string($data[17]));
                            $monthlyTableId = $this->setMonthlyTable()->uploadData($monthlyTableData);
                            
                            $countUsers= $this->getRegistrationTable()->findUser(mysql_real_escape_string($data[1]));
                            if($countUsers == 0)
                            {
                                //To Registration Table

                                $registration= new RegistrationModel();
                                $registration->setRegistrationEmployeeCode(mysql_real_escape_string($data[1]));
                                $registration->setRegistrationEmployeeName(mysql_real_escape_string($data[2]));
                                
                                $this->getRegistrationTable()->saveRegistration($registration);
                            }

                            $str = preg_replace("/\([^)]+\)/", "", $data[16]);
                            $strArr = explode(' ', $str);
                            //print_r($strArr);
                            $timeSchedule = array(); $totInTimePerDay = 0;
                            foreach($strArr as $time)
                            {	
                                if(empty($time)) continue;
                                $monthlyInOutTableData = new MonthlyInOutModel();
                                $timeSchedule [] = substr($time, 0, 5);
                                //print_r($timeSchedule);
                                if(trim(substr($time, 6, strlen($time))) == 'in' )
                                {
                                    
                                    $monthlyInOutTableData->setInTime(substr($time, 0, 5));
                                    //$monthlyInOutTableData->setOutTime(substr($time, 0, 5));
                                }
                                else if(trim(substr($time, 6, strlen($time))) == 'out')
                                {
                                    $monthlyInOutTableData->setOutTime(substr($time, 0, 5));
                                }
                                $monthlyInOutTableData->setMonthlyTableId($monthlyTableId);
                                $monthlyInOutTableData->setUserId(mysql_real_escape_string($data[1]));
                                $monthlyInOutTableData->setPunchDate($newDate);
                                $this->setMonthlyInOutTable()->insertMonthlyInOut($monthlyInOutTableData);
                            }

                            $diff = 0;                                                                                        
                            $timeSchedule = array_reverse($timeSchedule);
                            
                            for($index = 0 ; $index < count($timeSchedule)  ;  )
                            {
                                if(! isset($timeSchedule[$index + 1])) break;                                                                                        
                                $val = strtotime($timeSchedule[$index]);
                                $nxtVal = strtotime($timeSchedule[$index + 1]);
                                $diff += abs($val - $nxtVal);                                                                                       
                                $index += 2;
                            }
                            $out = 0;
                            for($index = 0 ; $index < count($timeSchedule)  ;  )
                            {
                                if(! isset($timeSchedule[$index + 2])) break;                                                                                        
                                $val = strtotime($timeSchedule[$index + 2]);
                                $nxtVal = strtotime($timeSchedule[$index + 1]);
                                $out += abs($val - $nxtVal);                                                                                       
                                $index += 2;
                            }

                            $monthlyTableData = new MonthlyModel();                                                                              
                            $this->setMonthlyTable()->updateMonthlyTable($monthlyTableId,  gmdate("H:i", $diff),  gmdate("H:i",  $out));
                            if(mysql_real_escape_string($data[10]) != '')
                            {
                                $countUser= $this->getRegistrationTable()->getShiftTime(mysql_real_escape_string($data[1]));
                                $inShift= $countUser['shift_in_time'];
                                $outShift= $countUser['shift_out_time'];

                                $totWork= gmdate("H:i:s", $diff);
                                $fixedHours= "08:00:00";

                                $workHistory->setUserCode(mysql_real_escape_string($data[1]));
                                $workHistory->setWorkedDate($newDate);
                                $workHistory->setWorkedHour($totWork);
                                
                                //$workSetDiff= abs(strtotime($countUser['shift_out_time'])-strtotime('shift_out_time'))
                                if($totWork > '08:00:00')
                                {
                                    $overTime= gmdate("H:i:s", abs(strtotime($fixedHours) -strtotime($totWork)));
                                    $workHistory->setOverTime($overTime);
                                    $workHistory->setUnderTime('00:00:00');
                                    $workHistory->setDutyType('OT');

                                }
                                elseif($totWork < '08:00:00')
                                {
                                    $underTime= gmdate("H:i:s", abs(strtotime($totWork)- strtotime($fixedHours)));
                                    $workHistory->setUnderTime($underTime); 
                                    $workHistory->setOverTime('00:00:00');
                                    $workHistory->setDutyType('UT');
                                }
                                else
                                {
                                   $workHistory->setDutyType('Normal');                            
                                }

                                $s=date("H:i:s", abs(strtotime(mysql_real_escape_string($data[10]))));
                                if($inShift > date("H:i:s", abs(strtotime(mysql_real_escape_string($data[10])))))
                                {
                                    $earlByTime= gmdate("H:i:s", abs(strtotime($s)- strtotime($inShift)));
                                    $workHistory->setEarlyBy($earlByTime); 
                                    $workHistory->setLateBy('00:00:00');
                                    $workHistory->setCorrectTime('Earlyby');
                                }
                                elseif($inShift < date("H:i:s", abs(strtotime(mysql_real_escape_string($data[10])))))
                                {

                                    $lateByTime= gmdate("H:i:s", abs(strtotime($inShift)- strtotime($s)));
                                    $workHistory->setLateBy($lateByTime); 
                                    $workHistory->setEarlyBy('00:00:00');
                                    $workHistory->setCorrectTime('LateBy');
                                }
                                else
                                {
                                    $workHistory->setCorrectTime('Ontime');
                                }

                                $workHistory->setInTime(mysql_real_escape_string($data[10]));
                                $workHistory->setOutTime(mysql_real_escape_string($data[11]));

                                $this->getUserWorkHistoryTable()->add($workHistory);
                            }
                            
                        }
                        $tot++;
                    }
                }

            }
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
}
