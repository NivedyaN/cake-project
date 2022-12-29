
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();

$name=$_SESSION['email'];

?>
<?php include('afterlogin.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <h1><center> <b><font color="green">CANCEL ORDER</b></center></h1>
                        
                        <th>srno</th>
                        <th>user email</th>
                        <th>item id</th>
                        <th>item name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>totalprice</th>
                        <th>bookingdate</th>
                        <th>orderdate</th>
                        <th>cancel</th>
                        

                    </tr>
<?php
    
    $actions=array(
        'edit'=>array('label'=>'cancel','link'=>'cancel.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success')),
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid'),

    );

    $condition="uemail='".$name."' and status=2";
    $join=array(
       
    ); 
     $fields=array('bid','uemail','iid','iname','price','quantity','totalprice','bookingdate','orderdate');

    $users=$dao->selectAsTable($fields,'booking as b',$condition,NULL,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
