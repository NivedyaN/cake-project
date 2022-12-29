

<?php	
include("dbcon.php");
$cid = $_GET['id'];
echo $cid;
$sql = "update category set status=2 where cid=".$cid;

$conn->query($sql);

 header('location:categoryview.php');



?>

