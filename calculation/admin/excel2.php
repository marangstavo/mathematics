<?php
  include("connect.php");
	header("Content-Type: application/xls");    
  	// header("Content-Disposition: attachment; filename=students.xls");
	 $fileName = "results-data_" . date('Y-m-d') . ".xls"; 
	 header("Content-Disposition: attachment; filename=$fileName");	 
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
 
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					      <th>#</th>               
                  <th>STUDENT ID</th>
                  <th>STUDENT NAME</th>
                  <th>EXAM NAME</th>
                  <th>SCORE</th>
                  <th>STATUS</th>
                  <th>DATE</th>
                
				</tr>
			<tbody>
	";
 $cnt=0;
	$query = $con->query("SELECT * FROM `assesmenttbl`") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
 $cnt++;
	$output .= "
				<tr>
					<td>".$cnt."</td>
 
					<td>".$fetch['studid']."</td>
					<td>".$fetch['studname']."</td>
					<td>"."".$fetch['examname']."</td>
					<td>".$fetch['score']."</td>
					<td>".$fetch['status']."</td>
					<td>".$fetch['date']."</td>
					 
				 
				</tr>
	";
	}
 
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>