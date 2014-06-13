<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class SpecialDutyTable extends AbstractTableGateway
{ 
    protected $table = 'tbl_special_duty';

        public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }



    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->userId))
            $return['user_id'] = $obj->userId;
        if(isset($obj->dutyDate))
            $return['duty_date'] = $obj->dutyDate;
        if(isset($obj->dutyMatter))
            $return['discription'] = $obj->dutyMatter;
        
        return $return;
    }
    
    public function inserts(SpecialDutyModel $obj)
    {
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;    
    }
    public function getSpecialDuty($id,$m,$y)
    {
        $sql= "select count(user_id) from tbl_special_duty where user_id= $id and Year(duty_date)= '$y' and Month(duty_date)= '$m'";
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    
}
