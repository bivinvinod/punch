<?php

namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class RatingModel implements InputFilterAwareInterface {  

    public $id;
    public $employeeCode;
    public $skill;
    public $rating;

 
    protected $inputFilter;
    

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmployeeCode($employeeCode) {
        $this->employeeCode = $employeeCode;
    }

    public function setSkill($skill) {
        $this->skill = $skill;
    }
    
    public function setRating($rating) {
        $this->rating = $rating;
    }
 
    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }

    public function getInputFilter() {
        
    }

}
