<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class MonthlyInOutModel implements InputFilterAwareInterface
{
	public $inTime;
	public $outTime;
	public $monthlyTableId;
        public $userId;
        public $punchDate;
        public $id;
	
	protected $inputFilter;        


	public function setInTime($inTime)
	{
		$this->inTime = $inTime;				
	}
        
        public function setId($id)
	{
		$this->id = $id;				
	}


	public function setOutTime($outTime)
	{
		$this->outTime = $outTime;				
	}

	public function setMonthlyTableId($monthlyTableId)
	{
		$this->monthlyTableId = $monthlyTableId;				
	}
        public function setUserId($userId)
	{
		$this->userId = $userId;				
	}
        public function setPunchDate($punchDate)
	{
		$this->punchDate = $punchDate;				
	}



	// Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter){
      //  throw new \Exception("Not used");
    }
	
    public function getInputFilter(){     
   	}

}