<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class PenaltyTable extends AbstractTableGateway
{
    protected $table="tbl_penalty";
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
    public function exchangeToArray($obj)
    {
        $return= array();
        if(isset($obj->id))
            $return['id']= $obj->id;
        if(isset($obj->penaltyDate))
            $return['penalty_date']= $obj->penaltyDate;
        if(isset($obj->amount))
            $return['amount']= $obj->amount;
        if(isset($obj->dis))
            $return['dis']= $obj->dis;
        if(isset($obj->empName))
            $return['emp_name']= $obj->empName;
        
        return $return;
    }
    public function add(PenaltyModel $obj)
    {
       $sql = new Sql($this->adapter);            
       $insert = $sql->insert($this->table);                       
       $insert->values($this->exchangeToArray($obj));
       $statement = $sql->prepareStatementForSqlObject($insert);          
       $result = $statement->execute();                    
       return $result;
    }
    public function fetchAllPenalty($id)
    {
        $sql = "SELECT * FROM tbl_penalty WHERE emp_name= '$id' order by id ASC"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    public function getPenalty($id,$m,$y)
    {
        $sql = "SELECT sum(amount) as sm FROM tbl_penalty WHERE emp_name='$id' and Year(penalty_date)= '$y' and Month(penalty_date)= '$m'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute()->current(); 
        return $result['sm'];  
    }
    public function fetchPenalty($id,$month,$year)
    {
        $sql = "SELECT * FROM tbl_penalty WHERE emp_name='$id' and Year(penalty_date)= '$year' and Month(penalty_date)= '$month'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;  
    }
    public function fetchPenaltySum($id,$month,$year)
    {
        $sql = "SELECT sum(amount) as sm FROM tbl_penalty WHERE emp_name='$id' and Year(penalty_date)= '$year' and Month(penalty_date)= '$month'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute()->current(); 
        return $result['sm'];  
    }
}
