<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;


class SalaryAdvanceTable extends AbstractTableGateway
{
    protected $table = 'salary_advance_table';
   	
  	public function __construct(Adapter $adapter)
  	{
            $this->adapter = $adapter;
        }
        
    public function exchangeToArray($obj)
    {
        
        $return = array();

        if(isset($obj->id))
            $return['id'] = $obj->id;
        
        if(isset($obj->employeeCode))
            $return['employee_code'] = $obj->employeeCode;
        
        if(isset($obj->month))
            $return['month'] = $obj->month;
        
        if(isset($obj->amount))
            $return['amount'] = $obj->amount;
        
        return $return;
    }  
    
    
    
    public function fetchAllData()
    {
        $sql = "SELECT salary_advance_table.*, registration.employee_name FROM salary_advance_table INNER JOIN registration ON salary_advance_table.employee_code = registration.employee_code ORDER BY salary_advance_table.month LIMIT 25";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result;
    }
    
    public function insertData(SalaryAdvanceModel $obj)
    {   
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
    }
    
    public function fetchSpecificData($id) {
        $sql = "SELECT * from salary_advance_table WHERE id= '$id'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result;
    }
    
    public function updateData(SalaryAdvanceModel $obj)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set ($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
    }
    
   public function deleteData($id)
   {
        $sql = "DELETE FROM salary_advance_table where id = '$id'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
   }
    
        
}