<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SuperAdmin\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PenaltyModel implements InputFilterAwareInterface
{
    protected $inputFilter;
    public $id;
    public $penaltyDate;
    public $amount;
    public $dis;
    public $empName;
    public function setId($id)
    {
        $this->id= $id;        
    }
    public function setPenaltyDate($penaltyDate)
    {
        $this->penaltyDate= $penaltyDate;
    }
    public function setAmount($amount)
    {
        $this->amount= $amount;
    }
    public function setDis($dis)
    {
        $this->dis= $dis;
    }
    public function setEmpName($empName)
    {
        $this->empName= $empName;
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        
    }
    public function getInputFilter()
    {
        
    }
}
