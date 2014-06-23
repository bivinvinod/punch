<?php
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class NotesModel implements InputFilterAwareInterface
{
	public $id;
	public $userId;
        public $dates;
	public $title;
	public $note;
       
 protected $inputFilter;        


    
 
	public function setId($id)
	{
		$this->id = $id;				
	}
        public function setUserId($userId)
	{
		$this->userId = $userId;				
	}
	public function setDates($dates)
	{
		$this->dates = $dates;				
	}
	public function setTitle($title)
	{
		$this->title = $title;				
	}
        public function setNote($note)
	{
		$this->note = $note;				
        }
        
        
	// Add content to this method:
        public function setInputFilter(InputFilterInterface $inputFilter){
        //  throw new \Exception("Not used");
        }
	
        public function getInputFilter(){     
   	}
}
