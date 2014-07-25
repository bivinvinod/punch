<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;


class SkillTable extends AbstractTableGateway
{
    protected $table = 'skill_table';
   	
  	public function __construct(Adapter $adapter)
  	{
            $this->adapter = $adapter;
        }
        
        
    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->id))
            $return['id'] = $obj->id;
        
        if(isset($obj->skill))
            $return['skill'] = $obj->skill;
        
        return $return;
    }
    
    
    
    public function insertData(SkillModel $obj)
    {         
        
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
    }
    
   public function fetchAllData()
   {
        $sql = "SELECT * FROM skill_table ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
   }
   
   public function deleteData($id)
   {
        $sql = "DELETE FROM skill_table where id = '$id'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
   }
   
   public function editData(SkillModel $obj)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
    }
    
   public function fetchSpecificSkillData($id)
   {
        $sql = "SELECT * FROM skill_table where id = '$id'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
   }    
}