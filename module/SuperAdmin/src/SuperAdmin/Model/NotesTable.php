<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;




class NotesTable extends AbstractTableGateway
{ 
    protected $table = 'notes';

        public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
	
    }



    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->userId))
            $return['user_id'] = $obj->userId;
        if(isset($obj->dates))
            $return['notes_date'] = $obj->dates;
	if(isset($obj->title))
            $return['title'] = $obj->title;
        if(isset($obj->note))
            $return['note'] = $obj->note;
        
        return $return;
	
	
    }
    
      public function inserts(NotesModel $obj)
    {
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
         
       
    }
    
       
    
    
    
    public function deleteData($id)
   {
        $sql = "DELETE FROM notes where id = '$id'";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
   }
    
     
    
    
    public function fetchAllData()
    {  
        $sql = "SELECT * FROM notes"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    
   public function editData(NotesModel $obj,$idt)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set($this->exchangeToArray($obj));
        $update->where(array('id' => $idt));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
    } 
    
    
  public function fetchspecificData($id)
    {
        $sql = "SELECT * FROM notes where user_id = '$id' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    
    
    
    public function fetchEditData($id)
    {
        $sql = "SELECT * FROM notes where id = '$id' ";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    
    
    
    
    
    
    public function getNames() {
        $sql = "SELECT notes.*, registration.employee_name FROM notes INNER JOIN registration ON  notes.user_id = registration.employee_code"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute();
        return $result; 
    }
    
}




