<?php

namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class MealModel implements InputFilterAwareInterface
{
    public $id;
    public $mealType;
    public $startTime;
    public $stopTime;
    public $status;
    
    protected $inputFilter;    
    
    
    public function setId($id){
        $this->id = $id;				
    }
    
    public function setMealType($mealType){
        $this->mealType = $mealType;				
    }
    
    public function setStartTime($startTime){
        $this->startTime = $startTime;				
    }
    
    public function setStopTime($stopTime){
        $this->stopTime = $stopTime;				
    }
    
    public function setStatus($status){
        $this->status = $status;				
    }





    public function getInputFilter() {
        
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }

}