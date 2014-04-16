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



        return $return;
    }




     public function insertMonthlyInOut(MonthlyInOutModel $obj){

        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        //$lastId=$this->adapter->getDriver()->getConnection()->getLastGeneratedValue();
        return $result;             
       
     }
     
     
     public function selectMonthlyInOutTable($id) {
        $sql = "SELECT * FROM monthly_in_out_table  where monthly_table_id = $id   "; 
        //echo $sql;exit;
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
              
     }
     
     
       public function searchMonthlyInOutTable($from, $to, $name)
     {
          $sql = "SELECT * FROM monthly_in_out_table  WHERE  date > '$from'  AND date < '$to' and employee_name= '$name'"; 
        //  print_r($sql); 
          $statement = $this->adapter->query($sql);           
          $result = $statement->execute(); 
          return $result;   
        
     }
     
     
}