
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php  
 //session_start();
include("dbcon.php");
require('../config/autoload.php');
$dao=new DataAccess();
?>
<title>printbill</title>
<div class="row">
 <div class="col-md-12">
 <div class="table-responsive">
                                <table border="1"  id="printTable" style="width:100%" >
                                    <thead>
                          <center> CAKE SHOP</center>
                           <center> KANNUR</center>
                            <tr>
                             <th style="text-align:left">BillNo.1</th>
                               <th colspan="2" style="text-align:left"></th>
                              <th style="text-align:left" >Date:<?php echo  date("Y/m/d"); ?></th>
                            </tr>
                           <tr>
                        <th>Username</th>
                        <th>Item name</th>
                        
			            <th>Quantity </th>
                        <th>Total price</th>
</tr>
                      
                                    </thead>
                                    <tbody>
                                   
 <?php
  
    
$name=$_SESSION['email'] ;

 

$sql = "SELECT * FROM booking WHERE status=2 and uemail='$name'";
$result = $conn->query($sql);


	
	
	
	


if ($result->num_rows > 0) {


 // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
      echo "<tr> <td> "  . $row["uemail"]. "</td> <td>"  . $row["iname"]. "</td> <td>" . $row["quantity"]. "</td>  <td>" . $row["totalprice"]. "</td>   
      <td>" ."</td>  </tr>";
	  
	    
}
}


 ?>




</table>



<?php


$sql11 =" UPDATE booking SET status=2 WHERE status=1 and uemail='$name'" ;

if ($conn->query($sql11) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
	 
	
	 }
	 ?>
     <br /><br />

<input type="button" onclick="printData();" value="PRINT"  />

<a href="category_seller.php">HOME</a>
</div>
</div>
</div>

</form>




