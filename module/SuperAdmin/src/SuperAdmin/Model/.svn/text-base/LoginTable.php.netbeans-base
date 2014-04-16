<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class LoginTable extends AbstractTableGateway
{
    protected $table = 'login';
   	
  	public function __construct(Adapter $adapter)
  	{
        $this->adapter = $adapter;
    }


    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->username))
            $return['username'] = $obj->username;

        if(isset($obj->password))
            $return['password'] = $obj->password;
        
        if(isset($obj->userType))
            $return['user_type'] = $obj->userType;

        if(isset($obj->status))
            $return['status'] = $obj->status;

        if(isset($obj->createdOn))
            $return['createdOn'] = $obj->createdOn;

        if(isset($obj->updatedOn))
            $return['updatedOn'] = $obj->updatedOn;

        return $return;
    }
	 
    public function getUserDetails($username, $password)
    {  
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from($this->table);   
        $select->where(array('username' => $username, 'password' => md5($password)));      
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        return $result;
    }

    public function updateUserLogin($userid,$ip)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set (array('last_login' => date("Y-m-d H:i:s"),'ip_address' => $ip));
        $update->where(array('id' => $userid));
        $statement = $sql->prepareStatementForSqlObject($update);
        $result = $statement->execute();
        return $result;  
    }
    public function inserts(LoginModel $obj)
    {
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                    
        return $result;
    }
    public function listAllUserData()
    {
        $sql= "select * from login";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;
    }
    public function editData($id)
    {
        $sql= "select * from login where id= $id";
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;  
    }
    public function updateData(LoginModel $obj)
    {
        $sql = new Sql($this->adapter);         
        $update = $sql->update($this->table);   
        $update->set ($this->exchangeToArray($obj));
        $update->where(array('id' => $obj->id));
        $statement = $sql->prepareStatementForSqlObject($update);
        $statement->execute();        
    }
    public function updateUserStatusOff($id)
    {  
        $sql = "update login set status='0' where id= $id"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    public function updateUserStatusOn($id)
    {  
        $sql = "update login set status='1' where id= $id"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
}