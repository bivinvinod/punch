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
        $config = $this->getServiceLocator()->get('config');
        $path = $config['defaultValues']['upload_path'];
        $request = $this->getRequest();

        if ($request->isPost()) {

            $file = $this->params()->fromFiles('image');
            $file1 = $this->params()->fromFiles('id_card_image');
            $file2 = $this->params()->fromFiles('passport_image');
            $file3 = $this->params()->fromFiles('aadhar_image');
            $file4 = $this->params()->fromFiles('driver_license_image');

            $employee_code = $request->getPost('employee_code');

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
            
            $image = $_FILES["image"]["name"];
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
            $id_card = $request->getPost('id_card');
            $id_card_image = $_FILES["id_card_image"]["name"];
            $passport = $request->getPost('passport');
            $passport_image = $_FILES["passport_image"]["name"];
            $aadhar = $request->getPost('aadhar');
            $aadhar_image = $_FILES["aadhar_image"]["name"];
            $driver_license = $request->getPost('driver_license');
            $driver_license_image = $_FILES["driver_license_image"]["name"];
            $feedback = $request->getPost('feedback');

            $registration_session = new Container('registration');
            $registration_session->employee_code = $employee_code;

            $insert = new RegistrationModel();

            $insert->setRegistrationEmployeeCode($employee_code);
            $this->getRegistrationTable()->CheckAvaiability($employee_code);

            $insert->setRegistrationEmployeeName($employee_name);
            $insert->setRegistrationLastName($last_name);
            $insert->setRegistrationDOB($dob);
            $insert->setRegistrationGender($gender);
            $insert->setRegistrationEmailId($email_id);
            $insert->setRegistrationAddress($address);
            $insert->setRegistrationMobileNo1($mobile_no1);
            $insert->setRegistrationMobileNo2($mobile_no2);
            $insert->setRegistrationMobileNo3($mobile_no3);
            $insert->setRegistrationDOJ($doj);
            $insert->setRegistrationDepartment($department);
            $insert->setRegistrationDesignation($designation);
            $insert->setRegistrationMonthlySalary($monthly_salary);
            $insert->setRegistrationDailySalary($daily_salary);
            $insert->setRegistrationImage($image);
            $insert->setRegistrationDeviceCode($device_code);
            $insert->setRegistrationCompany($company);
            $insert->setRegistrationLocation($location);
            $insert->setRegistrationGrade($grade);
            $insert->setRegistrationTeam($team);
            $insert->setRegistrationInTime($intime);
            $insert->setRegistrationOutTime($outtime);
            $insert->setRegistrationCategory($category);
            $insert->setRegistrationEmploymentType($employment_type);
            $insert->setRegistrationDOC($doc);
            $insert->setRegistrationCardNumber($card_number);
            $insert->setRegistrationIdCard($id_card);
            $insert->setRegistrationIdCardImage($id_card_image);
            $insert->setRegistrationPassport($passport);
            $insert->setRegistrationPassportImage($passport_image);
            $insert->setRegistrationAadhar($aadhar);
            $insert->setRegistrationAadharImage($aadhar_image);
            $insert->setRegistrationDriverLicense($driver_license);
            $insert->setRegistrationDriverLicenseImage($driver_license_image);
            $insert->setRegistrationFeedback($feedback);
            $lastId = $this->getRegistrationTable()->saveRegistration($insert);
	   

            //Profile Image
            if ($this->params()->fromFiles('image') != '') {
                $file = $this->params()->fromFiles('image');
                $ext = explode('.', $file['name']);
                $img = $lastId . '.' . $ext[1];
                if (!empty($file['name'])) {
                    $paths = $path . '/images/upload/' . $img;
                    move_uploaded_file($_FILES['image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateProfileImage($lastId, $img);
                }
            }


            //ID Image
            if ($this->params()->fromFiles('id_card_image') != '') {
                $file1 = $this->params()->fromFiles('id_card_image');
                $ext = explode('.', $file1['name']);
                $id_img = $lastId . '_id' . '.' . $ext[1];
                if (!empty($file1['name'])) {
                    $paths = $path . '/images/upload/' . $id_img;
                    move_uploaded_file($_FILES['id_card_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateIdCardImage($lastId, $id_img);
                }
            }
            //Passport Image
            if ($this->params()->fromFiles('passport_image') != '') {
                $file2 = $this->params()->fromFiles('passport_image');
                $ext = explode('.', $file2['name']);
                $pt_img = $lastId . '_pt' . '.' . $ext[1];
                if (!empty($file2['name'])) {
                    $paths = $path . '/images/upload/' . $pt_img;
                    move_uploaded_file($_FILES['passport_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updatePassword($lastId, $pt_img);
                }
            }
            //Aadhar Image
            if ($this->params()->fromFiles('aadhar_image') != '') {
                $file3 = $this->params()->fromFiles('aadhar_image');
                $ext = explode('.', $file3['name']);
                $ad_img = $lastId . '_ad' . '.' . $ext[1];
                if (!empty($file3['name'])) {
                    $paths = $path . '/images/upload/' . $ad_img;
                    move_uploaded_file($_FILES['aadhar_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateAadharImage($lastId, $ad_img);
                }
            }
            //Aadhar Image
            if ($this->params()->fromFiles('driver_license_image') != '') {
                $file4 = $this->params()->fromFiles('driver_license_image');
                $ext = explode('.', $file4['name']);
                $dl_img = $lastId . '_dl' . '.' . $ext[1];
                if (!empty($file4['name'])) {
                    $paths = $path . '/images/upload/' . $dl_img;
                    move_uploaded_file($_FILES['driver_license_image']['tmp_name'], $paths);
                    $this->getRegistrationTable()->updateDriverLicenseImage($lastId, $dl_img);
                }
            }
        }
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




    public function editAction() {

        $this->layout('layout/superAdminDashboardLayout');

        $employee_code = (int) $this->params()->fromRoute(id);
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
            $image = $request->getPost('image');
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
            $id_card = $request->getPost('id_card');
            $id_card_image = $request->getPost('id_card_image');
            $passport = $request->getPost('passport');
            $passport_image = $request->getPost('passport_image');
            $aadhar = $request->getPost('$aadhar');
            $aadhar_image = $request->getPost('$aadhar_image');
            $driver_license = $request->getPost('$driver_license');
            $driver_license_image = $request->getPost('$driver_license_image');
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
            $update->setRegistrationImage($image);
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
            $update->setRegistrationIdCard($id_card);
            $update->setRegistrationIdCardImage($id_card_image);
            $update->setRegistrationPassport($passport);
            $update->setRegistrationPassportImage($passport_image);
            $update->setRegistrationAadhar($aadhar);
            $update->setRegistrationAadharImage($aadhar_image);
            $update->setRegistrationDriverLicense($driver_license);
            $update->setRegistrationDriverLicenseImage($driver_license_image);
            $update->setRegistrationFeedback($feedback);
            $this->getRegistrationTable()->updateView($update);

            echo"Datas Updated successfully..";
           return $this->redirect()->toRoute('superAdmin/registration/list');
        }
        return new ViewModel(array(
            'edit' => $this->getRegistrationTable()->getViewSearch($employee_code),
            'flashMessages' => $this->flashmessenger()->addMessage("Datas Updated successfully..")
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
