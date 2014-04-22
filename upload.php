<?php
include 'dbconnect.php';

/*$str = "09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access)";
       $str = preg_replace("/\([^)]+\)/", "", $str);
       $strArr = explode(' ', $str);
       foreach($strArr as $time) {
           echo substr($time, 0, 5);
           echo substr($time, 6, strlen($time)).'<br>';
       }
       print_r($strArr);
       exit; */




function get_file_extension($file_name) {
	return end(explode('.',$file_name));
}



function errors($error){
	if (!empty($error))
	{
			$i = 0;
			while ($i < count($error)){
			$showError.= '<div class="msg-error">'.$error[$i].'</div>';
			$i ++;}
			return $showError;
	}// close if empty errors
} // close function



if (isset($_POST['upfile']))

{
		/*$year=$_POST['Year'];
		$month=$_POST['Month'];*/

		if(get_file_extension($_FILES["uploaded"]["name"])!= 'csv')
		{
		$error[] = 'Only CSV files accepted!';
		}

	if (!$error){
	$tot = 0;
	$handle = fopen($_FILES["uploaded"]["tmp_name"], "r");
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	for ($c=0; $c < 1; $c++) {
		
			//print_r($data);continue;
		
		
     //echo "here";
        //only run if the first column if not equal to firstname
       
				mysql_query("INSERT INTO MonthlyTable(
				Date,
				EmployeeCode,
				EmployeeName,
				Company,
				Department,
				Category,
				Degination,
				Grade,
				Team,
				Shift,
				InTime ,
				OutTime ,
				Duration,
				LateBy ,
				EarlyBy ,
				Status,
				PunchRecords
				)VALUES(
					'".mysql_real_escape_string($data[0])."',
					'".mysql_real_escape_string($data[1])."',
					'".mysql_real_escape_string($data[2])."',
					'".mysql_real_escape_string($data[3])."',
					'".mysql_real_escape_string($data[4])."',
					'".mysql_real_escape_string($data[5])."',
					'".mysql_real_escape_string($data[6])."',
					'".mysql_real_escape_string($data[7])."',
					'".mysql_real_escape_string($data[8])."',
					'".mysql_real_escape_string($data[9])."',
					'".mysql_real_escape_string($data[10])."',
					'".mysql_real_escape_string($data[11])."',
					'".mysql_real_escape_string($data[12])."',
					'".mysql_real_escape_string($data[13])."',
					'".mysql_real_escape_string($data[14])."',
					'".mysql_real_escape_string($data[15])."',
					'".mysql_real_escape_string($data[16])."'
					)")or die(mysql_error());
			//mysql_insert_id()
				
			    if($tot != 0) {	
			    	$monthlyTableId = mysql_insert_id();		    	
			    	   $str = preg_replace("/\([^)]+\)/", "", $data[16]);
				       $strArr = explode(' ', $str);
				       print_r($strArr);exit;
				       foreach($strArr as $time) {	
				       	   if(empty($time)) continue;
				       	   $var = array();
				           $var[] = (trim(substr($time, 6, strlen($time))) == 'in') ? 'in_time' : 'out_time';
				           $var [] = 'monthly_table_id';
				           /*echo "INSERT INTO 
				           	MonthlyInOutTable(".implode(',', $var).")
				           	VALUES('".substr($time, 0, 5)."', ".mysql_insert_id().")";
				           	echo "<br>";*/

				           mysql_query("INSERT INTO 
				           	MonthlyInOutTable(".implode(',', $var).")
				           	VALUES('".substr($time, 0, 5)."', $monthlyTableId)");	

		   				}
			    }
			   

         }

	$tot++;}
}
fclose($handle);
$content.= "<div class='success' id='message'> CSV File Imported, $tot records added </div>";

}// end no error
//}//close if isset upfile

$er = errors($error);
$content.= <<<EOF

<h3>Import CSV Data</h3>
$er
<form enctype="multipart/form-data" action="" method="post">


 <!--   <select name = "Month">

  <option selected value="January">January</option>
  <option value="February">February</option>
  <option value="March">March</option>
  <option value="April">April</option>
  <option value="May">May</option>
  <option value="June">June</option>
  <option value="July">July</option>
  <option value="August">August</option>
  <option value="September">September</option>
  <option value="October">October</option>
  <optioN value="November">November</option>
  <option value="December">December</option>

</select>



<select name="Year">
  
  <option selected value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
</select>
</br>
-->

	File:<input name="uploaded" type="file" /><input type="submit" name="upfile" value="Upload File">
</form>
EOF;
echo $content;






?>