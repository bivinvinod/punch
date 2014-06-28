<?php

namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class SalaryAdvanceModel implements InputFilterAwareInterface {  

    public $id;
    public $employeeCode;
    public $month;
    public $amount;

 
    protected $inputFilter;
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setEmployeeCode($employeeCode) {
        $this->employeeCode = $employeeCode;
    }

    public function setMonth($month) {
        $this->month = $month;
    }
    
    public function setamount($amount) {
        $this->amount = $amount;
    }
 
    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }

    public function getInputFilter() {
        
    }
    
    
    
    
}
