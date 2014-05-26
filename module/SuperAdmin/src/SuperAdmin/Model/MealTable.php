<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;


class MealTable extends AbstractTableGateway
{
    protected $table = 'meal_policy_table';
   	
  	public function __construct(Adapter $adapter)
  	{
        $this->adapter = $adapter;
        }
        
        
    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->id))
            $return['id'] = $obj->id;
        
        if(isset($obj->mealType))
            $return['meal_type'] = $obj->mealType;
        
        if(isset($obj->startTime))
            $return['start_time'] = $obj->startTime;
        
        if(isset($obj->stopTime))
            $return['stop_time'] = $obj->stopTime;
        
        if(isset($obj->status))
            $return['status'] = $obj->status;
        
        
        return $return;
        
        
    }
    
    
    
    
    public function insertData(MealModel $obj)
    {   
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
    }
    
    
    public function updateData(MealModel $obj)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set ($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
    }
    
    
    
    public function fetchAllData()
    {
        $sql= "select * from meal_policy_table";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;
    }
    
    
    public function updateMealStatusOff($id)
    {  
	
        $sql = "update meal_policy_table set status='0' where id= '$id'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
        
    public function updateMealStatusOn($id)
    {  
        $sql = "update meal_policy_table set status='1' where id= '$id'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    } 
    
    public function fetchSpecificData($id)
    {
        $sql = "SELECT * FROM meal_policy_table where id='$id' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    
    public function updateMealData(MealModel $obj)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
    }
        
}