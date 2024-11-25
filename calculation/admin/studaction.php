<?php
include('connect.php');
if(isset($_GET['status']))
{
$status2=$_GET['status'];
$select=mysqli_query( $con , "select * from studenttbl where studid='$status2'");
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
$update=mysqli_query( $con , "update studenttbl set status='$status_state' where studid='$status2' ");
if($update)
{
header("Location:studentlist.php");
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