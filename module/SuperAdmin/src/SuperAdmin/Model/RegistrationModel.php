<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;     
use Zend\InputFilter\InputFilter;                 
use Zend\InputFilter\InputFilterAwareInterface;   
use Zend\InputFilter\InputFilterInterface;       

class RegistrationModel implements InputFilterAwareInterface
{

    public $employee_code;
    public $employee_name;
    public $last_name;
    public $dob;
    public $gender;
    public $email_id;
    public $address;
    public $mobile_no1;
    public $mobile_no2;
    public $mobile_no3;
    public $doj; 
    public $department;
    public $designation;
    public $monthly_salary;
    public $image;
    public $device_code;
    public $company;
    public $location; 
    public $grade;
    public $team;
    public $category;
    public $employment_type;
    public $doc;
    public $card_number;
    public $id_card;
    public $id_card_image;
    public $passport;
    public $passport_image;
    public $aadhar;
    public $aadhar_image;
    public $driver_license;
    public $driver_license_image;
    public $feedback;
    public $status;


    protected $inputFilter; 
   
   
	public function setRegistrationEmployeeCode($employee_code){
		$this->employee_code = $employee_code;
            //  echo $employee_code;
	}
	
	public function setRegistrationEmployeeName($employee_name){
		$this->employee_name = $employee_name;				
	}
        public function setRegistrationLastName($last_name){
		$this->last_name = $last_name;				
	}
        public function setRegistrationDOB($dob){
		$this->dob = $dob;				
	}
        public function setRegistrationGender($gender){
		$this->gender = $gender;				
	}
        public function setRegistrationEmailId($email_id){
		$this->email_id = $email_id;				
	}
        public function setRegistrationAddress($address){
		$this->address = $address;	
        }
        public function setRegistrationMobileNo1($mobile_no1){
		$this->mobile_no1 = $mobile_no1;	
        }
        public function setRegistrationMobileNo2($mobile_no2){
		$this->mobile_no2 = $mobile_no2;	
        }
        public function setRegistrationMobileNo3($mobile_no3){
		$this->mobile_no3 = $mobile_no3;	
        }
        public function setRegistrationDOJ($doj){
		$this->doj = $doj;	
        }
        public function setRegistrationDepartment($department){
		$this->department = $department;	
        }
        public function setRegistrationDesignation($designation){
		$this->designation = $designation;	
        }
        public function setRegistrationMonthlySalary($monthly_salary){
		$this->monthly_salary = $monthly_salary;	
        }
        public function setRegistrationImage($image){
		$this->image = $image;	
        }
        public function setRegistrationDeviceCode($device_code){
		$this->device_code = $device_code;	
        }
        public function setRegistrationCompany($company){
		$this->company = $company;	
        }
        public function setRegistrationLocation($location){
		$this->location = $location;	
        }
        public function setRegistrationGrade($grade){
		$this->grade = $grade;	
        }
        public function setRegistrationTeam($team){
		$this->team = $team;	
        }
       public function setRegistrationCategory($category){
		$this->category = $category;	
        }
        public function setRegistrationEmploymentType($employment_type){
		$this->employment_type = $employment_type;	
        }
        public function setRegistrationDOC($doc){
		$this->doc = $doc;	
        }
        public function setRegistrationCardNumber($card_number){
		$this->card_number = $card_number;	
        }
      
        public function setRegistrationIdCard($id_card){
		$this->id_card = $id_card;	
        }
         public function setRegistrationIdCardImage($id_card_image){
		$this->id_card_image = $id_card_image;	
        }
        public function setRegistrationPassport($passport){
		$this->passport = $passport;	
        }
        public function setRegistrationPassportImage($passport_image){
		$this->passport_image = $passport_image;	
        }
        public function setRegistrationAadhar($aadhar){
		$this->aadhar = $aadhar;	
        }
        public function setRegistrationAadharImage($aadhar_image){
		$this->aadhar_image = $aadhar_image;	
        }
        public function setRegistrationDriverLicense($driver_license){
		$this->driver_license = $driver_license;	
        }
        public function setRegistrationDriverLicenseImage($driver_license_image){
		$this->driver_license_image = $driver_license_image;	
        }
        public function setRegistrationFeedback($feedback){
		$this->feedback = $feedback;	
        }
        public function setStatus($status){
		$this->status = $status;	
        }
       

        public function setInputFilter(InputFilterInterface $inputFilter){
          }	
    
    
        public function getInputFilter(){

       }

}