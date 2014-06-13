<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;




class LeaveTable extends AbstractTableGateway
{ 
    protected $table = 'leave_table';

        public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }



    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->id))
            $return['id'] = $obj->id;
        
        if(isset($obj->date))
            $return['leave_date'] = $obj->date;
        
        if(isset($obj->status))
            $return['status'] = $obj->status;


        if(isset($obj->description))
            $return['desc'] = $obj->description;
        
        if(isset($obj->fromTime))
            $return['from_time'] = $obj->fromTime;
        
        if(isset($obj->toTime))
            $return['to_time'] = $obj->toTime;
        
        if(isset($obj->type))
            $return['type'] = $obj->type;



        return $return;
    }


     public function insertLeave(LeaveModel $obj){
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;             
       
    }
    
        public function updateLeave(LeaveModel $obj)
        {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
        }
     
                
                
                   public function fetchAllData()
                   {
                        $sql = "SELECT * FROM leave_table";
                        $statement = $this->adapter->query($sql);           
                        $result = $statement->execute();
                        return $result; 
                   }
     
                   
                   
        public function updateLeaveStatusOff($id)
        {  
                $sql = "update leave_table set status='0' where id= $id"; 
                $statement = $this->adapter->query($sql);           
                $result = $statement->execute(); 
                return $result;   
        }
        
        public function updateLeaveStatusOn($id)
        {  
                $sql = "update leave_table set status='1' where id= $id"; 
                $statement = $this->adapter->query($sql);           
                $result = $statement->execute(); 
                return $result;   
        }
        
        
        public function fetchSpecificData($id)
        {
        $sql = "SELECT * FROM leave_table where id='$id' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
        }
    
    public function holyDays($m,$y)
    {
        $sql = "SELECT count(leave_date),type FROM leave_table where Year(leave_date)= '$y' and Month(leave_date)= '$m'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
}
