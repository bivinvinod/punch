<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class AttendenceModel implements InputFilterAwareInterface
{
	public $id;
	public $userId;
        public $leaveDate;
	public $leaveType;
	public $leaveMatter;
        public $fromTime;
        public $toTime;
        public $status;
        


        protected $inputFilter;        


	public function setId($id)
	{
		$this->id = $id;				
	}
        public function setUserId($userId)
	{
		$this->userId = $userId;				
	}
	public function setLeaveDate($leaveDate)
	{
		$this->leaveDate = $leaveDate;				
	}
        
	public function setLeaveType($leaveType)
	{
	    $this->leaveType = $leaveType;
	}
        
        public function setFrom($fromTime)
	{
	    $this->fromTime = $fromTime;
	}
        
        public function setTo($toTime)
	{
	    $this->toTime = $toTime;
	}

	public function setLeaveMatter($leaveMatter)
	{
		$this->leaveMatter = $leaveMatter;				
        }
        public function setStatus($status)
	{
		$this->status = $status;				
        }
        
	// Add content to this method:
        public function setInputFilter(InputFilterInterface $inputFilter){
        //  throw new \Exception("Not used");
        }
	
        public function getInputFilter(){     
   	}
}
