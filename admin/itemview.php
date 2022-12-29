
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <h1><center><b><u><font color="green">EDIT ITEM</u></b></center></h1>
                        
                        <th>sr no</th>
                        <th>item name</th>
                        <th>item image</th>
                       
                        <th>offerprice</th>
                        <th>sellingprice</th>
                        <th>category id</th>
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'edititem.php','params'=>array('id'=>'iid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deleteitem','params'=>array('id'=>'iid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('iid'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'iimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
    );
    $join=array(
       
    ); 
     $fields=array('iid','iname','iimage','offerprice','sellingprice','cid');

    $users=$dao->selectAsTable($fields,'item as i','status=1',NULL,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
