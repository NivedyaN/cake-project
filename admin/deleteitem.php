

<?php	
include("dbcon.php");
$cart_id = $_GET['id'];
//$iid = $_GET['id']//
echo $cart_id;
//echo $iid//
$sql = "update item set status=2 where iid=".$cart_id;

$conn->query($sql);

 header('location:itemview.php');



?>

