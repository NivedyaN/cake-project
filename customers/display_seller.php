<?php require('../config/autoload.php'); ?>
 <?php // include('header.php');?>
 <?php
$dao=new DataAccess();?>




<?php
if(isset($_SESSION['email']))
{
    $name=$_SESSION['email'];
    include("afterlogin.php");
}
else 
{ 
    include("header.php");
}
?>





 
 <div class="product-category-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                    <?php
			$cid=$_GET['id']; 
			 $q="select * from item where cid=".$cid;

$info=$dao->query($q);

			$i=0;          
			 while($i<count($info))
			
{ $s=$info[$i]["iimage"];
		?>	

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src=<?php echo BASE_URL."uploads/".$info[$i]["iimage"]; ?> class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <!--<ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>-->
                                                        <a class="cart"href="singleitem.php?id=<?= $info[$i]["iid"]?>">ORDER NOW</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h2><b><?php echo $info[$i]["iname"]?></b></h2>
                                                    <h4>OFFER PRICE</h4>
                              <h4> <?php echo $info[$i]["offerprice"]?></h4>
                              <h4>SELLING PRICE</h4>
                              <h4> <?php echo $info[$i]["sellingprice"]?></h4>
							 
                             
                                                </div>
                                            </div>
                                    </div> 
                                    
                                    <?php 
				$i++;
				} ?>
                                        
                                    </div>
                                </div>
                                
                                    
                                
                            </div>
                       
                                
				
                
            
        
    </div>