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
        if(isset($obj->punchRecords))
            $return['punch_records'] = $obj->punchRecords;

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
    public function totalTime($id,$d1,$d2)
    {
        if($d1 != '' && $d2 != '')
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(worked_hour))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from user_work_history where user_code= $id and worked_date between '$d1' and '$d2'";
        }
        else if($d1 != '')
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(worked_hour))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from user_work_history where user_code= $id and worked_date >= '$d1'";
        }
        else if($d2 != '')
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(worked_hour))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from user_work_history where user_code= $id and worked_date <= '$d2'"; 
        }
        else
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(worked_hour))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from user_work_history where user_code= $id";  
        }
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function fetchAllHours($id,$d2,$d1)
    {
        /*$sql= "select worked_hour,worked_date"
                . " from user_work_history where user_code= $id and worked_date between '$d1' and '$d2'";//exit; */
        $sql= "select registration.employee_name,user_work_history.worked_hour,user_work_history.worked_date"
                . " from user_work_history inner join registration"
                . " on user_work_history.user_code=registration.employee_code where user_work_history.user_code= $id"
                . " and user_work_history.worked_date between '$d1' and '$d2'";
        
        
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function fetchAllEmpCharts($d1,$d2)
    {
        $sql= "SELECT registration.employee_name,SEC_TO_TIME( SUM( TIME_TO_SEC( user_work_history.worked_hour ))) as totWork FROM user_work_history INNER JOIN registration ON user_work_history.user_code = registration.employee_code WHERE user_work_history.worked_date BETWEEN '$d1' AND '$d2' GROUP BY registration.employee_name";
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function fetchTotalWork($id,$d2,$d1)
    {
        $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC( user_work_history.worked_hour ))) as totWork from user_work_history where user_code= $id and worked_date between '$d1' and '$d2'";
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        $s=$result->current();
        echo $s; exit;
        return $s;
    }
    public function fetchAllEmpMonthlyWork($name,$year)
    {
        //$sql="SELECT SEC_TO_TIME( SUM( TIME_TO_SEC(worked_hour))) AS twh,MONTH(worked_date) as mw from user_work_history GROUP BY concat(user_code,mw) order by user_code ASC";\
        /*$sql="SELECT registration.employee_name, SEC_TO_TIME( SUM( TIME_TO_SEC( user_work_history.worked_hour ) ) ) AS twh, MONTH( user_work_history.worked_date ) AS mw
                    FROM user_work_history
                    INNER JOIN registration ON user_work_history.user_code = registration.employee_code
                    GROUP BY concat( user_work_history.user_code, mw )
                    ORDER BY user_work_history.user_code ASC";*/
        
        $sql="SELECT registration.employee_name, SEC_TO_TIME( SUM( TIME_TO_SEC( user_work_history.worked_hour ) ) ) AS twh, MONTH( user_work_history.worked_date ) AS mw
                FROM user_work_history
                INNER JOIN registration ON user_work_history.user_code = registration.employee_code where user_work_history.user_code='$name' and YEAR( user_work_history.worked_date )= '$year'
                GROUP BY concat( user_work_history.user_code, mw )
                ORDER BY MONTH( user_work_history.worked_date ) ASC";
    
        
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function fetchAllMonthlyWork($name1,$name2,$name3,$year)
    {
        $sql="SELECT registration.employee_name, SEC_TO_TIME( SUM( TIME_TO_SEC( user_work_history.worked_hour ) ) ) AS twh, MONTH( user_work_history.worked_date ) AS mw
                FROM user_work_history
                INNER JOIN registration ON user_work_history.user_code = registration.employee_code where user_work_history.user_code in ($name1,$name2,$name3) and YEAR( user_work_history.worked_date )= '$year'
                GROUP BY concat( user_work_history.user_code, mw )
                ORDER BY MONTH( user_work_history.worked_date ) ASC";

        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function getAvgWork($ids,$d1,$d2)
    {
        $sql="SELECT registration.employee_name, SEC_TO_TIME( SUM(AVG( TIME_TO_SEC( user_work_history.worked_hour ) ) ) ) AS twh, MONTH( user_work_history.worked_date ) AS mw
                FROM user_work_history
                INNER JOIN registration ON user_work_history.user_code = registration.employee_code where user_work_history.user_code in ($ids) and worked_date between '$d1' AND '$d2'
                GROUP BY concat( user_work_history.user_code, mw )
                ORDER BY MONTH( user_work_history.worked_date ) ASC";

        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function fetchAllUsersIncentive($n,$m,$y)
    {
        $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC( user_work_history.worked_hour ) ) ) AS twh,count(worked_hour) as cnt,DAYOFWEEK( worked_date ) AS sndy from user_work_history where user_code= $n and Year(worked_date)= '$y' and Month(worked_date)= '$m'";
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result; 
    }
    
}
