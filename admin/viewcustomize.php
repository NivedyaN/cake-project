
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();

$name=$_SESSION['email'];

?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <h1><center><b><font color="green">COSTOMIZE REPORT</b></center></h1>
                        <th>srno</th>
                        <th>username</th>
                        <th>weight</th>
                        <!--<th>item name</th>-->
                        <!--<th>price</th>-->
                        <th>quatity</th>
                        <th>discription</th>
                        <!--<th>expected price</th>-->
                        <!--<th>orderdate</th>-->
                      
                        

                    </tr>
<?php
    
    $actions=array(
       'edit'=>array('label'=>'accept','link'=>'accept.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success')),
   
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid'),

    );

    $condition="status=5;
    $join=array(
       
    ); 
     $fields=array('cid','uemail','iid','cweight','cquantity','cdiscr','eprice');

    $users=$dao->selectAsTable($fields,'customize as c',$condition,NULL,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
