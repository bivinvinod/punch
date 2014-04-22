<?php

namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class RegistrationTable extends AbstractTableGateway {

    protected $table = 'registration';

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }

    public function exchangeToArray(RegistrationModel $obj) {
        $return = array();
        if (isset($obj->employee_code)) {
            $return['employee_code'] = $obj->employee_code;
        }

        if (isset($obj->employee_name)) {
            $return['employee_name'] = $obj->employee_name;
        }
        if (isset($obj->last_name)) {
            $return['last_name'] = $obj->last_name;
        }
        if (isset($obj->dob)) {
            $return['dob'] = $obj->dob;
        }
        if (isset($obj->gender)) {
            $return['gender'] = $obj->gender;
        }
        if (isset($obj->email_id)) {
            $return['email_id'] = $obj->email_id;
        }

        if (isset($obj->address)) {
            $return['address'] = $obj->address;
        }

        if (isset($obj->mobile_no1)) {
            $return['mobile_no1'] = $obj->mobile_no1;
        }

        if (isset($obj->mobile_no2)) {
            $return['mobile_no2'] = $obj->mobile_no2;
        }

        if (isset($obj->mobile_no3)) {
            $return['mobile_no3'] = $obj->mobile_no3;
        }

        if (isset($obj->doj)) {
            $return['doj'] = $obj->doj;
        }

        if (isset($obj->department)) {
            $return['department'] = $obj->department;
        }

        if (isset($obj->designation)) {
            $return['designation'] = $obj->designation;
        }

        if (isset($obj->monthly_salary)) {
            $return['monthly_salary'] = $obj->monthly_salary;
        }

        if (isset($obj->daily_salary)) {
            $return['daily_salary'] = $obj->daily_salary;
        }

        if (isset($obj->image)) {
            $return['image'] = $obj->image;
        }

        if (isset($obj->device_code)) {
            $return['device_code'] = $obj->device_code;
        }

        if (isset($obj->company)) {
            $return['company'] = $obj->company;
        }

        if (isset($obj->location)) {
            $return['location'] = $obj->location;
        }

        if (isset($obj->grade)) {
            $return['grade'] = $obj->grade;
        }

        if (isset($obj->team)) {
            $return['team'] = $obj->team;
        }
        if (isset($obj->intime)) {
            $return['shift_in_time'] = $obj->intime;
        }
        if (isset($obj->outtime)) {
            $return['shift_out_time'] = $obj->outtime;
        }

        if (isset($obj->category)) {
            $return['category'] = $obj->category;
        }

        if (isset($obj->employment_type)) {
            $return['employment_type'] = $obj->employment_type;
        }

        if (isset($obj->doc)) {
            $return['doc'] = $obj->doc;
        }

        if (isset($obj->card_number)) {
            $return['card_number'] = $obj->card_number;
        }

        if (isset($obj->id_card)) {
            $return['id_card'] = $obj->id_card;
        }

        if (isset($obj->id_card_image)) {
            $return['id_card_image'] = $obj->id_card_image;
        }

        if (isset($obj->passport)) {
            $return['passport'] = $obj->passport;
        }

        if (isset($obj->passport_image)) {
            $return['passport_image'] = $obj->passport_image;
        }


        if (isset($obj->aadhar)) {
            $return['aadhar'] = $obj->aadhar;
        }

        if (isset($obj->aadhar_image)) {
            $return['aadhar_image'] = $obj->aadhar_image;
        }

        if (isset($obj->driver_license)) {
            $return['driver_license'] = $obj->driver_license;
        }

        if (isset($obj->driver_license_image)) {
            $return['driver_license_image'] = $obj->driver_license;
        }

        if (isset($obj->feedback)) {
            $return['feedback'] = $obj->feedback;
        }
        return $return;
    }

    public function saveRegistration(RegistrationModel $obj)
    {
        $sql = new Sql($this->adapter);
        $insert = $sql->insert($this->table);
        $insert->values($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();
        return $result;
    }
    public function fetchAllUsers()
    {
        $sql = "SELECT * FROM registration WHERE status= 1";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    public function fetchAll()
    {
        $sql="SELECT * FROM registration";                              
        $statement = $this->adapter->query($sql);  
        $result    = $statement->execute(); 
        return $result; 
    }

    public function findUser($id) {
        $sql = "SELECT count(employee_code) as employee_code FROM registration WHERE employee_code = '$id'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        $s = $result->current();
        if ($s['employee_code']) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateProfileImage($lastId, $img) {
        $sql = "update registration set image='$img' where id= '$lastId'";
        //echo($sql);exit;
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }

    public function updateIdCardImage($lastId, $id_img) {
        $sql = "update registration set id_card_image='$id_img' where id= '$lastId'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }

    public function updatePassword($lastId, $pt_img) {
        $sql = "update registration set passport_image='$pt_img' where id= '$lastId'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }

    public function updateAadharImage($lastId, $ad_img) {
        $sql = "update registration set aadhar_image='$ad_img' where id= '$lastId'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }

    public function updateDriverLicenseImage($lastId, $dl_img) {
        $sql = "update registration set driver_license_image='$dl_img' where id= '$lastId'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }

    public function checkAvaiability($employeeCode) {

        //echo"haii";exit;
        $sql = "SELECT count(employee_code) as employee_code FROM registration WHERE employee_code = '$employeeCode'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        $s = $result->current();
        if ($s['employee_code']) {
            return 1;
        } else {
            return 0;
        }
    }

    public function listEmployeeName() {
        $sql = "SELECT  employee_name FROM registration";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
        print_r($result);
        exit;
    }

      public function getViewSearch($employee_code) 
    { 
        //$uname = $login_session->username;     
         //echo "SELECT * FROM registration WHERE employee_code='$employee_code'";exit;
                $sql="SELECT * FROM registration WHERE employee_code='$employee_code'";                              
                $statement = $this->adapter->query($sql);  
                $result    = $statement->execute(); 
                //$row = $result->current();
                return $result;
   
              }
    public function updateView(RegistrationModel $obj){
     
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);  
        $update->set ($this->exchangeToArray($obj));
        //print_r($this->exchangeToArray($obj));
        $update->where(array('employee_code' => $obj->employee_code));
        $statement = $sql->prepareStatementForSqlObject($update);
      // print_r($this->exchangeToArray($obj));
        $statement->execute();        
    } 
          public function getDeleted($employee_code) 
    { 
        //$uname = $login_session->username;     
         
                $sql="DELETE FROM registration WHERE employee_code='$employee_code'";                              
                $statement = $this->adapter->query($sql);  
                $result    = $statement->execute(); 
                //$row = $result->current();
                return $result;
   
              }
}
