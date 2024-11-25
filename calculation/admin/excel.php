<?php
  include("connect.php");
	header("Content-Type: application/xls");    
  	// header("Content-Disposition: attachment; filename=students.xls");
	 $fileName = "students-data_" . date('Y-m-d') . ".xls"; 
	 header("Content-Disposition: attachment; filename=$fileName");	 
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
 
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					      <th>#</th>               
                  <th>FIRST NAME</th>
                  <th>LAST NAME</th>
                  <th>EMAIL</th>
                  <th>GENDER</th>
                  <th>CELL</th>
                  <th>DOB</th>
                  <th>ADDRESS</th>
                  <th>DEPARTMENT</th>
                  <th>LEVEL</th>
                  <th>STATUS</th>
				</tr>
			<tbody>
	";
 $cnt=0;
	$query = $con->query("SELECT * FROM `studenttbl`") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
 $cnt++;
	$output .= "
				<tr>
					<td>".$cnt."</td>
 
        
					<td>".$fetch['fname']."</td>
					<td>".$fetch['lname']."</td>
					<td>"."$ ".$fetch['email']."</td>
					<td>".$fetch['gender']."</td>
					<td>".$fetch['phone']."</td>
					<td>".$fetch['dob']."</td>
					<td>".$fetch['address']."</td>
					<td>".$fetch['deptname']."</td>
					<td>".$fetch['catname']."</td>
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