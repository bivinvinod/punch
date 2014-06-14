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


class RecordDetailsController extends AbstractActionController
{
    protected $monthlyTable;
    protected $monthlyInOutTables;
    protected $registrationTable;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('SuperAdminAuth');
        }        
        return $this->authservice;
    }
    
    public function getMonthlyTable()
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

    //Actions
    public function indexAction()
    {	
        if($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $viewModel= new ViewModel(array(
                'userNames' => $this->getRegistrationTable()->fetchAllUsers()
            ));
            return $viewModel;
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    public function ajaxListAction()
    {	
        if($this->getAuthService()->hasIdentity())
        {
            //  echo "haiii";
            $name= $_POST['name'];
            $d1= $_POST['date1'];
            $d2= $_POST['date2'];
            echo $name."<br>";
            echo $d1."<br>";
            echo $d2;exit;
            $viewModel= new ViewModel(array(
                'records' => $this->getMonthlyTable()->fetchAllRecords(2)
            ));
            $viewModel->setTerminal(true);
            return $viewModel;
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
    public function userDetailsAction()
    {
        $config=$this->getServiceLocator()->get('config');
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $request= $this->getRequest();
            if($request->isPost())
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
                                
                $records = iterator_to_array($this->getMonthlyTable()->fetchAllRecords($request->getPost('name'),$d1,$d2));
                $totTime = iterator_to_array($this->getMonthlyTable()->totalTime($request->getPost('name'),$d1,$d2));
                
                foreach($totTime as $v)
                {
                   $totTime= $v['total_time'];
                   $ot= $v['ot'];
                }
                                             
                     
                $viewModel= new ViewModel(array(
                    'records'=> $records,
                    'totWork'=> $totTime,
                    'ot'=> $ot,
                    'userNames' => $this->getRegistrationTable()->fetchAllUsers()
                ));
                $viewModel->setTemplate('/super-admin/record-details/index.phtml');
                return $viewModel;
            }
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }
}
