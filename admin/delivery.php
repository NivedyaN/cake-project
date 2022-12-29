

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
echo $cart_id;
$sql = "update booking set status=4 where bid=".$cart_id;

$conn->query($sql);

 header('location:viewdelivery.php');



?>

