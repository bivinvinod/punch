<?php
namespace SuperAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container; // We need this when using sessions
use Zend\Validator\File\Size;

use SuperAdmin\Model\RegistrationModel;
use SuperAdmin\Model\RegistrationTable;


class RegistrationController extends AbstractActionController {

    protected $registration;
    protected $profile;

    public function getAuthService()
    {
        if (! $this->authservice)
        {
            $this->authservice = $this->getServiceLocator()->get('AdminAuth');
        }        
        return $this->authservice;
    }

    public function getRegistrationTable()
    {
        if (!$this->registration)
        {
            $ser = $this->getServiceLocator();
            $this->registration = $ser->get('SuperAdmin\Model\RegistrationTable');
        }
        return $this->registration;
    }
    
    public function indexAction()
    {
        $this->layout('layout/superAdminDashboardLayout');

        $viewModel = new ViewModel(array(
            'datas' => $this->getRegistrationTable()->fetchAll(),
               
        ));
        return $viewModel;
        return $this->redirect()->toRoute('superAdmin/registration/list');
    }



    public function listAction()
    {
        if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');

            $viewModel = new ViewModel(array(
                'datas' => $this->getRegistrationTable()->fetchAll(),

            ));
            return $viewModel;
            return $this->redirect()->toRoute('superAdmin/registration/list');
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
    }

    public function profileAction()
    {
	if ($this->getAuthService()->hasIdentity())
        {
            $this->layout('layout/superAdminDashboardLayout');
            $employeeCode = (int) $this->params()->fromRoute(id);
            $viewModel = new ViewModel(array(
                'profile' => $this->getRegistrationTable()->viewProfile($employeeCode),

            ));
            return $viewModel;
            return $this->redirect()->toRoute('superAdmin/registration/profile');
        }
        else
        {
            $this->flashMessenger()->addMessage("Please Login");
            return $this->redirect()->toRoute("superAdmin");
        }
	
    }


    public function editAction() {

        $this->layout('layout/superAdminDashboardLayout');
        $employee_code = (int) $this->params()->fromRoute(id);
        $config = $this->getServiceLocator()->get('config');
        $path = $config['defaultValues']['upload_path'];
        $request = $this->getRequest();
        if ($request->isPost()) {

            $employee_name = $request->getPost('employee_name');
            $last_name = $request->getPost('last_name');
            $dob = $request->getPost('dob');
            $gender = $request->getPost('gender');
            $email_id = $request->getPost('email_id');
            $address = $request->getPost('address');
            $mobile_no1 = $request->getPost('mobile_no1');
            $mobile_no2 = $request->getPost('mobile_no2');
            $mobile_no3 = $request->getPost('mobile_no3');
            $doj = $request->getPost('doj');
            $department = $request->getPost('department');
            $designation = $request->getPost('designation');
            $monthly_salary = $request->getPost('monthly_salary');
            $daily_salary = $monthly_salary/30;
            $device_code = $request->getPost('device_code');
            $company = $request->getPost('company');
            $location = $request->getPost('location');
            $grade = $request->getPost('grade');
            $team = $request->getPost('team');
            $intime = $request->getPost('intime');
            $outtime = $request->getPost('outtime');
            $category = $request->getPost('category');
            $employment_type = $request->getPost('employment_type');
            $doc = $request->getPost('doc');
            $card_number = $request->getPost('card_number');
            $feedback = $request->getPost('feedback');


            $update = new RegistrationModel();
           
            $update->setRegistrationEmployeeCode($employee_code);
            $update->setRegistrationEmployeeName($employee_name);
            $update->setRegistrationLastName($last_name);
            $update->setRegistrationDOB($dob);
            $update->setRegistrationGender($gender);
            $update->setRegistrationEmailId($email_id);
            $update->setRegistrationAddress($address);
            $update->setRegistrationMobileNo1($mobile_no1);
            $update->setRegistrationMobileNo2($mobile_no2);
            $update->setRegistrationMobileNo3($mobile_no3);
            $update->setRegistrationDOJ($doj);
            $update->setRegistrationDepartment($department);
            $update->setRegistrationDesignation($designation);
            $update->setRegistrationMonthlySalary($monthly_salary);
            $update->setRegistrationDailySalary($daily_salary);
            $update->setRegistrationDeviceCode($device_code);
            $update->setRegistrationCompany($company);
            $update->setRegistrationLocation($location);
            $update->setRegistrationGrade($grade);
            $update->setRegistrationTeam($team);
            $update->setRegistrationInTime($intime);
            $update->setRegistrationOutTime($outtime);
            $update->setRegistrationCategory($category);
            $update->setRegistrationEmploymentType($employment_type);
            $update->setRegistrationDOC($doc);
            $update->setRegistrationCardNumber($card_number);
            
            
           
            
            $update->setRegistrationFeedback($feedback);
            $this->getRegistrationTable()->updateView($update);
            
            
            
            //Profile Image
            if ($this->params()->fromFiles('dp') != '') {
                $file = $this->params()->fromFiles('dp');
                $ext = explode('.', $file['dp']);
                $img = $employee_name.'.'.$ext[1];
                if (!empty($file['name'])) {
                    $paths = $path.'/images/upload/'.$img;
                    move_uploaded_file($_FILES['dp']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateProfileImage($employeeCode, $img);
                }
            }
            
            
            
            //ID Image
            if ($this->params()->fromFiles('id_card_image') != '') {
                $file1 = $this->params()->fromFiles('id_card_image');
                $ext = explode('.', $file1['name']);
                $id_img = $employee_name.'_id'.'.'.$ext[1];
                if (!empty($file1['name'])) {
                    $paths = $path.'/images/upload/'.$id_img;
                    move_uploaded_file($_FILES['id_card_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateIdCardImage($employeeCode, $id_img);
                }
            }
            
            //Passport Image
            if ($this->params()->fromFiles('passport_image') != '') {
                $file2 = $this->params()->fromFiles('passport_image');
                $ext = explode('.', $file2['name']);
                $pt_img = $employee_name.'_pt'.'.'.$ext[1];
                if (!empty($file2['name'])) {
                    $paths = $path.'/images/upload/'.$pt_img;
                    move_uploaded_file($_FILES['passport_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updatePassport($employeeCode, $pt_img);
                }
            }
            
            //Aadhar Image
            if ($this->params()->fromFiles('aadhar_image') != '') {
                $file3 = $this->params()->fromFiles('aadhar_image');
                $ext = explode('.', $file3['name']);
                $ad_img = $employee_name.'_ad'.'.'.$ext[1];
                if (!empty($file3['name'])) {
                    $paths = $path.'/images/upload/'.$ad_img;
                    move_uploaded_file($_FILES['aadhar_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateAadharImage($employeeCode, $ad_img);
                }
            }
            
            
            //driver license Image
            if ($this->params()->fromFiles('driver_license_image') != '') {
                $file4 = $this->params()->fromFiles('driver_license_image');
                $ext = explode('.', $file4['name']);
                $dl_img = $employee_name.'_dl'.'.'.$ext[1];
                if (!empty($file4['name'])) {
                    $paths = $path.'/images/upload/'.$dl_img;
                    move_uploaded_file($_FILES['driver_license_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateDriverLicenseImage($employeeCode, $dl_img);
                }
            }
        
           
        return $this->redirect()->toRoute('superAdmin/registration');
        }
        return new ViewModel(array(
            'edit' => $this->getRegistrationTable()->getViewSearch($employee_code)
        ));
    }

    public function deleteAction() {
    $this->layout('layout/superAdminDashboardLayout');
    $employee_code = (int) $this->params()->fromRoute(id);
    if ($this->getRegistrationTable()->getDeleted($employee_code)) {
           echo "Data deleted SuccessFully....";
     }
    return $this->redirect()->toRoute('superAdmin/registration/list');
    }

}
