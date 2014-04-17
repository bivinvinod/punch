<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class LeaveModel implements InputFilterAwareInterface
{
	public $id;
	public $date;
	public $description;
        
	protected $inputFilter;        


	public function setId($id)
	{
		$this->id = $inTime;				
	}
	public function setDate($date)
	{
		$this->date = $date;				
	}

	public function setDescription($description)
	{
		$this->description = $description;				
        }
	// Add content to this method:
        public function setInputFilter(InputFilterInterface $inputFilter){
        //  throw new \Exception("Not used");
        }
	
        public function getInputFilter(){     
   	}
}