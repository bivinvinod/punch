<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class SpecialDutyModel implements InputFilterAwareInterface
{
	public $id;
	public $userId;
        public $dutyDate;
	public $dutyMatter;
        
        protected $inputFilter;        


	public function setId($id)
	{
		$this->id = $id;				
	}
        public function setUserId($userId)
	{
		$this->userId = $userId;				
	}
	public function setDutyDate($dutyDate)
	{
		$this->dutyDate = $dutyDate;				
	}
        
	public function setDutyMatter($dutyMatter)
	{
	    $this->dutyMatter = $dutyMatter;
	}
        
        
	// Add content to this method:
        public function setInputFilter(InputFilterInterface $inputFilter){
        //  throw new \Exception("Not used");
        }
	
        public function getInputFilter(){     
   	}
}
