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
        public $status;
        public $fromTime;
        public $toTime;
        public $type;
        public $description;
        
	protected $inputFilter;        


	public function setId($id)
	{
		$this->id = $id;				
	}
	public function setDate($date)
	{
		$this->date = $date;				
	}
        
        public function setFrom($fromTime)
	{
		$this->fromTime = $fromTime;				
	}
        
        public function setTo($toTime)
	{
		$this->toTime = $toTime;				
	}

        public function setStatus($status)
        {
            $this->status = $status;				
        }
        
        public function setType($type)
        {
            $this->type = $type;				
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
