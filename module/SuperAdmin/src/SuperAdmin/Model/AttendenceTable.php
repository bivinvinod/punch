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
        if(isset($obj->status))
            $return['status'] = $obj->status;

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
     
     
     
     
}