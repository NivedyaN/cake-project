

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
echo $cart_id;
$sql = "delete from car where cid=".$cart_id;

$conn->query($sql);

 header('location:viewcar.php');



?>

