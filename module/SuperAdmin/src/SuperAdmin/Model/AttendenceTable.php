<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;




class AttendenceTable extends AbstractTableGateway
{ 
    protected $table = 'tbl_attendence';

        public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }



    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->userId))
            $return['user_id'] = $obj->userId;
        if(isset($obj->leaveDate))
            $return['leave_dates'] = $obj->leaveDate;
        if(isset($obj->leaveMatter))
            $return['leave_matter'] = $obj->leaveMatter;
        if(isset($obj->fromTime))
            $return['from_time'] = $obj->fromTime;
        if(isset($obj->toTime))
            $return['to_time'] = $obj->toTime;
        if(isset($obj->status))
            $return['status'] = $obj->status;
        if(isset($obj->leaveType))
            $return['leave_type'] = $obj->leaveType;

        return $return;
    }
    
      public function inserts(AttendenceModel $obj)
    {
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
         
       
    }
    
        public function updateEmployeeLeave(AttendenceModel $obj)
        {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
        }
    
    
    
    
    
     
    public function updateEmployeeLeaveStatusOff($id)
    {  
	
        $sql = "update tbl_attendence set status='0' where id= '$id'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
        
    public function updateEmployeeLeaveStatusOn($id)
    {  
        $sql = "update tbl_attendence set status='1' where id= '$id'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }   
     

    
    public function fetchAllData()
    {  
        $sql = "SELECT * FROM tbl_attendence"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    
    
    public function getNoOfLeaves($id,$d1,$d2) 
    { 
        $sql="SELECT * FROM tbl_attendence WHERE user_id = '$id' AND leave_dates between '$d1' and '$d2' AND status= '1' ";                              
        $statement = $this->adapter->query($sql);  
        $result    = $statement->execute(); 
        return $result;
    }
  
    
    public function fetchspecificData($id)
    {
        $sql = "SELECT * FROM tbl_attendence where id = '$id' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    
    
    public function getNames() {
        $sql = "SELECT tbl_attendence.*, registration.employee_name FROM tbl_attendence INNER JOIN registration ON  tbl_attendence.user_id = registration.employee_code"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    
}
