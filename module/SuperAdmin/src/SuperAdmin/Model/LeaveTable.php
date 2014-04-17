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

        return $return;
    }


     public function insertleave(LeaveModel $obj){
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;             
       
    }
     
     
     
     
}
