<?php
namespace SuperAdmin\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

class MonthlyTable extends AbstractTableGateway
{
    protected $table = 'monthly_table';
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function exchangeToArray($obj)
    {
        $return = array();

        if(isset($obj->date))
            $return['dates'] = $obj->date;

        if(isset($obj->employeeCode))
            $return['employee_code'] = $obj->employeeCode;

        if(isset($obj->employeeName))
            $return['employee_name'] = $obj->employeeName;

        if(isset($obj->company))
            $return['company'] = $obj->company;

        if(isset($obj->department))
            $return['department'] = $obj->department;

        if(isset($obj->category))
            $return['category'] = $obj->category;

        if(isset($obj->degination))
            $return['degination'] = $obj->degination;

        if(isset($obj->grade))
            $return['grade'] = $obj->grade;

        if(isset($obj->team))
            $return['team'] = $obj->team;

        if(isset($obj->shift))
            $return['shift'] = $obj->shift;

        if(isset($obj->inTime))
            $return['in_time'] = $obj->inTime;

        if(isset($obj->outTime))
            $return['out_time'] = $obj->outTime;

        if(isset($obj->duration))
            $return['duration'] = $obj->duration;

        if(isset($obj->lateBy))
            $return['late_by'] = $obj->lateBy;

        if(isset($obj->earlyBy))
            $return['early_by'] = $obj->earlyBy;

        if(isset($obj->status))
            $return['status'] = $obj->status;

        if(isset($obj->punchRecords))
            $return['punch_records'] = $obj->punchRecords;
        
        if(isset($obj->totalInTime))
            $return['total_in'] = $obj->totalInTime;
         
        if(isset($obj->totalOutTime))
            $return['total_out'] = $obj->totalOutTime;
        
        if(isset($obj->overTime))
            $return['over_time'] = $obj->overTime;
        if(isset($obj->underTime))
            $return['under_time'] = $obj->underTime;
        
        return $return;
    }

    public function uploadData(MonthlyModel $obj)
    {  
        $sql = new Sql($this->adapter);            
        $insert = $sql->insert($this->table);                       
        $insert->values ($this->exchangeToArray($obj));
        $statement = $sql->prepareStatementForSqlObject($insert);          
        $result = $statement->execute();                            
        return $this->adapter->getDriver()->getConnection()->getLastGeneratedValue();        
    }

    
    
    public function listMonthlyTable()
    {
        $sql = "SELECT MT.* FROM monthly_table AS MT 
            INNER JOIN monthly_in_out_table AS MIOT ON MIOT.monthly_table_id = MT.id 
            WHERE MIOT.monthly_table_id IS NOT NULL"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result; 
    }
    public function updateMonthlyTable($id, $totin, $totout)
    {
        $sql = "UPDATE monthly_table SET total_in = '$totin',  total_out = '$totout'  WHERE  id= $id"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    public function searchMonthlyTable($from, $to, $name)
    {
        $sql = "SELECT * FROM monthly_table  WHERE  date > '$from'  AND date < '$to' and employee_name= '$name'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    public function fetchAll()
    {
        $sql = "SELECT * FROM monthly_table"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;  
    }
    public function searchIdMonthlyTable($from, $to, $name)
    {
        $sql = "SELECT  FROM monthly_table  WHERE  date > '$from'  AND date < '$to' and employee_name= '$name'"; 
        $statement = $this->adapter->query($sql);           
        $result = $statement->execute(); 
        return $result;   
    }
    public function fetchAllRecords($id,$d1,$d2)
    {
        if($d1 != '' && $d2 != '')
        {
            $sql= "select * from monthly_table where employee_code= $id and dates between '$d1' and '$d2'";
        }
        else if($d1 != '')
        {
            $sql= "select * from monthly_table where employee_code= $id and dates >= '$d1'";
        }
        else if($d2 != '')
        {
            $sql= "select * from monthly_table where employee_code= $id and dates <= '$d2'"; 
        }
        else
        {
            $sql= "select * from monthly_table where employee_code= $id";  
        }
        
        $statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result; 
    }
    public function totalTime($id,$d1,$d2)
    {
        if($d1 != '' && $d2 != '')
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(total_in))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from monthly_table where employee_code= $id and dates between '$d1' and '$d2'";
        }
        else if($d1 != '')
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(total_in))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from monthly_table where employee_code= $id and dates >= '$d1'";
        }
        else if($d2 != '')
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(total_in))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from monthly_table where employee_code= $id and dates <= '$d2'"; 
        }
        else
        {
            $sql= "select SEC_TO_TIME( SUM( TIME_TO_SEC(total_in))) AS total_time,"
                . "SEC_TO_TIME( SUM( TIME_TO_SEC(over_time))) AS ot"
                . " from monthly_table where employee_code= $id";  
        }
        $statement=$statement = $this->adapter->query($sql);
        $result = $statement->execute();
        return $result;
    }
    public function fetchNames($id)
    {
        $statement = $this->adapter->query("select employee_name from monthly_table where employee_code= $id");
        $result = $statement->execute();
        $s=$result->current();
        if($s['employee_name']){return 1; } else { return 0;} 
    }


    /*DELIMITER $$
create procedure fetchAllRecords(IN rid INT)
begin
SELECT sum(total_in) as totalIn, sum(total_out) as totalOut FROM monthly_table wher id=rid;
end $$ */
	
}