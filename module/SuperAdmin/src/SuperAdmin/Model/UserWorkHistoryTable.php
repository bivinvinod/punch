<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;




class UserWorkHistoryTable extends AbstractTableGateway
{ 
    protected $table = 'user_work_history';

        public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }



    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->id))
            $return['id'] = $obj->id;
        if(isset($obj->userCode))
            $return['user_code'] = $obj->userCode;
        if(isset($obj->workedDate))
            $return['worked_date'] = $obj->workedDate;
        if(isset($obj->workedHour))
            $return['worked_hour'] = $obj->workedHour;
        if(isset($obj->overTime))
            $return['over_time'] = $obj->overTime;
        if(isset($obj->underTime))
            $return['under_time'] = $obj->underTime;
        if(isset($obj->earlyBy))
            $return['early_by'] = $obj->earlyBy;
        if(isset($obj->lateBy))
            $return['late_by'] = $obj->lateBy;
        if(isset($obj->inTime))
            $return['in_time'] = $obj->inTime;
        if(isset($obj->outTime))
            $return['out_time'] = $obj->outTime;
        if(isset($obj->dutyType))
            $return['duty_type'] = $obj->dutyType;
        if(isset($obj->correctTime))
            $return['correct_time'] = $obj->correctTime;

        return $return;
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
    public function add(UserWorkHistoryModel $obj)
    {
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;     
    }
    public function fetchAllRecords($id,$d1,$d2)
    {
        if($d1 != '' && $d2 != '')
        {
            $sql= "select * from  user_work_history where user_code= $id and worked_date between '$d1' and '$d2'";
        }
        else if($d1 != '')
        {
            $sql= "select * from  user_work_history where user_code= $id and worked_date >= '$d1'";
        }
        else if($d2 != '')
        {
            $sql= "select * from  user_work_history where user_code= $id and worked_date <= '$d2'"; 
        }
        else
        {
            $sql= "select * from  user_work_history where user_code= $id";  
        }
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result; 
    }
}
