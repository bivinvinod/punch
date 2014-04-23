<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class UserWorkHistoryModel implements InputFilterAwareInterface
{
	public $id;
	public $userCode;
        public $workedDate;
	public $workedHour;
        public $overTime;
        public $underTime;
        public $earlyBy;
        public $lateBy;
        public $inTime;
        public $outTime;
        public $dutyType;
        public $correctTime;


        protected $inputFilter;        


	public function setId($id)
	{
            $this->id = $id;				
	}
	public function setUserCode($userCode)
	{
            $this->userCode = $userCode;				
	}

        public function setWorkedDate($workedDate)
        {
            $this->workedDate = $workedDate;				
        }

	public function setWorkedHour($workedHour)
	{
            $this->workedHour = $workedHour;				
        }
        public function setOverTime($overTime)
	{
            $this->overTime = $overTime;				
        }
        public function setUnderTime($underTime)
	{
            $this->underTime = $underTime;				
        }
        public function setEarlyBy($earlyBy)
	{
            $this->earlyBy = $earlyBy;				
        }
        public function setLateBy($lateBy)
	{
            $this->lateBy = $lateBy;				
        }
        public function setInTime($inTime)
	{
            $this->inTime = $inTime;				
        }
        public function setOutTime($outTime)
	{
            $this->outTime = $outTime;				
        }
        public function setDutyType($dutyType)
	{
            $this->dutyType = $dutyType;				
        }
        public function setCorrectTime($correctTime)
	{
            $this->correctTime = $correctTime;				
        }
	// Add content to this method:
        public function setInputFilter(InputFilterInterface $inputFilter){
        //  throw new \Exception("Not used");
        }
	
        public function getInputFilter(){     
   	}
}
