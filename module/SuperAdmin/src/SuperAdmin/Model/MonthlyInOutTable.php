<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;




class MonthlyInOutTable extends AbstractTableGateway
{ 
    protected $table = 'monthly_in_out_tables';

        public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }



    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->inTime))
            $return['in_time'] = $obj->inTime;


        if(isset($obj->outTime))
            $return['out_time'] = $obj->outTime;


        if(isset($obj->monthlyTableId))
            $return['monthly_table_id'] = $obj->monthlyTableId;
        
        if(isset($obj->userId))
            $return['user_id'] = $obj->userId;
        
        if(isset($obj->punchDate))
            $return['punch_date'] = $obj->punchDate;

        if(isset($obj->id))
            $return['id'] = $obj->id;

        return $return;
    }




     public function insertMonthlyInOut(MonthlyInOutModel $obj){

        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();
        return $result;             
       
     }
     
     
     public function selectMonthlyInOutTable($id) {
        $sql = "SELECT * FROM monthly_in_out_tables  where monthly_table_id = '$id'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
              
     }
     
     
     public function searchMonthlyInOutTable($from, $to, $name)
     {
          $sql = "SELECT * FROM monthly_in_out_tables  WHERE  date > '$from'  AND date < '$to' and employee_name= '$name'"; 
          $statement = $this->adapter->query($sql);           
          $result = $statement->execute(); 
          return $result;   
        
     }
     public function addRecords($employeeCode, $dates) {
        $sql = "SELECT monthly_in_out_tables.* , monthly_table.employee_name
                FROM monthly_in_out_tables  
                INNER JOIN monthly_table 
                ON monthly_in_out_tables.monthly_table_id = monthly_table.id 
                WHERE  monthly_table.dates = '$dates' AND monthly_table.employee_code = '$employeeCode' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
     }
     
     public function editRecords($employeeCode, $dates) {
        $sql = "SELECT monthly_in_out_tables.* , monthly_table.employee_name
                FROM monthly_in_out_tables  
                INNER JOIN monthly_table 
                ON monthly_in_out_tables.monthly_table_id = monthly_table.id 
                WHERE  monthly_table.dates = '$dates' AND monthly_table.employee_code = '$employeeCode' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
     }
     
    public function updateInOutTime(MonthlyInOutModel $obj)
    {        
        $sql = new Sql($this->adapter);   
        $update = $sql->update($this->table);
        $update->set($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();
    }
     
}