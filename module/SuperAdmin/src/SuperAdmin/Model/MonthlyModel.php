<?php 
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;




class MonthlyModel implements InputFilterAwareInterface
{

	public $date;
	public $employeeCode;
	public $employeeName;
	public $company;
	public $department;
	public $category;
	public $degination;
	public $grade;
	public $team;
	public $shift;
	public $inTime;
	public $outTime;
	public $duration;
	public $lateBy;
	public $earlyBy;
	public $status;
	public $punchRecords;
        public $totalInTime;
        public $totalOutTime;
        public $overTime;


        protected $inputFilter;                   


	public function setDate($date)
	{
		$this->date = $date;				
	}
	public function setEmployeeCode($employeeCode)
	{
		$this->employeeCode = $employeeCode;				
	}
	public function setEmployeeName($employeeName)
	{
		$this->employeeName = $employeeName;				
	}
	public function setCompany($company)
	{
		$this->company = $company;				
	}
	public function setDepartment($department)
	{
		$this->department = $department;				
	}
	public function setCategory($category)
	{
		$this->category = $category;				
	}
	public function setDegination($degination)
	{
		$this->degination = $degination;				
	}
	public function setGrade($grade)
	{
		$this->grade = $grade;				
	}
	public function setTeam($team)
	{
		$this->team = $team;				
	}
	public function setShift($shift)
	{
		$this->shift= $shift;
	}
	public function setInTime($inTime)
	{
		$this->inTime= $inTime;
	}
	public function setOutTime($outTime)
	{
		$this->outTime= $outTime;
	}

	public function setDuration($duration)
	{
		$this->duration= $duration;
	}


	public function setLateBy($lateBy)
	{
		$this->lateBy= $lateBy;
	}
	public function setEarlyBy($earlyBy)
	{
		$this->earlyBy= $earlyBy;
	}
	public function setStatus($status)
	{
		$this->status= $status;
	}
	public function setPunchRecords($punchRecords)
	{
		$this->punchRecords= $punchRecords;
	}
        
                  public function setTotalIn($totalInTime)
	{
		$this->totalInTime= $totalInTime;
	}
        
        public function setTotalOut($totalOutTime)
	{
		$this->totalOutTime= totalOutTime;
	}
        public function setOverTime($overTime)
	{
		$this->overTime= $overTime;
	}
        public function setUnderTime($underTime)
	{
		$this->underTime= $underTime;
	}











	// Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter){
      //  throw new \Exception("Not used");
    }

	public function getInputFilter(){     
   }


}