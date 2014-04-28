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
	public $employeeName;
	public $leaveType;
	public $leaveMatter;
        public $status;
        public $leaveType;


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
        public function setEmployeeName($employeeName) 
        {
        $this->employeeName = $employeeName;
        }
	public function setLeaveType($leaveType)
	{
	    $this->leaveType = $leaveType;
	}

	public function setLeaveMatter($leaveMatter)
	{
		$this->leaveMatter = $leaveMatter;				
        }
        public function setStatus($status)
	{
		$this->status = $status;				
        }
        public function setLeaveType($leaveType)
	{
		$this->leaveType = $leaveType;				
        }
	// Add content to this method:
        public function setInputFilter(InputFilterInterface $inputFilter){
        //  throw new \Exception("Not used");
        }
	
        public function getInputFilter(){     
   	}
}
