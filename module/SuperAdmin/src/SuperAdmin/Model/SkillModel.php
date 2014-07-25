<?php

namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class SkillModel implements InputFilterAwareInterface {  

    public $id;
    public $skill;
 
 
    protected $inputFilter;
    

    public function setId($id) {
        $this->id = $id;
    }

    public function setSkill($skill) {
        $this->skill = $skill;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }

    public function getInputFilter() {
        
    }

}
