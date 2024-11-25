<?php
include('connect.php');
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=mysqli_query($con, "select * from departmenttbl where deptid='$status1'");
while($row=mysqli_fetch_array($select))
{
$status_var=$row['status'];
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=mysqli_query($con, "update departmenttbl set status='$status_state' where deptid='$status1' ");
if($update)
{
header("Location:departmentlist.php");
}
else
{
echo mysqli_error();
}
}
?>
<?php
}
?>