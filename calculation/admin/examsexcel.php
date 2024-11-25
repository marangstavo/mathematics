<?php
  include("connect.php");
	header("Content-Type: application/xls");    
  	// header("Content-Disposition: attachment; filename=students.xls");
	 $fileName = "exams-data_" . date('Y-m-d') . ".xls"; 
	 header("Content-Disposition: attachment; filename=$fileName");	 
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
 
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					      <th>#</th>               
              
                  <th>EXAM NAME</th>
                  <th>DURATION</th>
                  <th>EXAM TOPIC</th>
                  <th>DEPT</th>
                  <th>LEVEL</th>
                  <th>INSTRUCTIONS</th>
                  <th>STATUS</th>
				</tr>
			<tbody>
	";
 $cnt=0;
	$query = $con->query("SELECT * FROM `examtbl`") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
 $cnt++;
	$output .= "
				<tr>
					<td>".$cnt."</td>
 
        
					<td>".$fetch['examname']."</td>
					<td>".$fetch['duration'].' mins'."</td>
					<td>"."$ ".$fetch['subname']."</td>
					<td>".$fetch['deptname']."</td>
					<td>".$fetch['catname']."</td>
					<td>".$fetch['instruction']."</td>
					<td>".$fetch['status']."</td>
	 
				</tr>
	";
	}
 
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>