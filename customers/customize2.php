 <?php 

 require('../config/autoload.php'); 
 include('afterlogin.php');

$file=new FileUpload();
$elements=array(
           "uemail"=>"", "cid"=>"", "cweight"=>"","cquantity"=>"","cdiscr"=>"","amount"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("uemail"=>"username","cid"=>"Category Name","cweight"=>"weight","cquantity"=>"quantity","cdiscr"=>"discription","amt"=>"amount", );

$rules=array(

      "cid"=>array("required"=>true),
    "cweight"=>array("required"=>true,"minlength"=>1,"maxlength"=>30,"integeronly"=>true),
   // "iimage"=> array('filerequired'=>true),
    
    "cquantity"=>array("required"=>true,"minlength"=>1,"maxlength"=>5,"integeronly"=>true),
    "cdiscr"=>array("required"=>true),
    //"eprice"=>array("required"=>true),
  
);
    
    
$validator = new FormValidator($rules,$labels);

//if(isset($_POST["btn_insert"]))
{

//if($validator->validate($_POST))
{
	
//if($fileName=$file->doUploadRandom($_FILES['iimage'],array('.jpg','.png','.jpeg'),100000,2,'../uploads'))
		{

          //$data=array(
        // 'cid'=>$_POST['cid'],
       // 'cweight'=>$_POST['cweight'],
       // 'iimage'=>$fileName,
        
       // 'cquantity'=>$_POST['cquantity'],
         // 'cdiscr'=>$_POST['cdiscr'],
		//  'eprice'=>$_POST['eprice'],
          
        
         


            // );


//$sql = "INSERT INTO customize(uemail,cname,cweight,cquantity,cdiscr,amt) 
    //VALUES ('$uemail','$cname','$cweight','$cquantity','$cdiscr','$eprice')";
              // echo $sql;                    
  //$conn->query($sql);





  
    if($dao->insert($data,"customize"))
    {
        echo "<script> alert('order successfully submitted.wait for confirmation');</script> ";
    //header('location:studentdetails1.php');
    }
    else
        {echo "<script> alert(' failed ');</script> "
            ;} ?>

<!--<span style="color:red;"><?php  ?></span>-->

<?php
    
}
//else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
<!--<div class="row">
                    <div class="col-md-6">
                        <h1><center><b><font color="green"> ITEM DETAILS</b></center></h1>
Item Name:

<?= $form->textBox('iname',array('class'=>'form-control')); ?>
<?= $validator->error('iname'); ?>

</div>
</div>-->

<div class="row">
                    <div class="col-md-6">
Category name:

<?php
                    $options = $dao->createOptions('cname','cid',"category");
                    echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?><span style="color:red;">
<?= $validator->error('cid'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
                  
weight:

<?= $form->textBox('cweight',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cweight'); ?></span>

</div>
</div>



<div class="row">

                    <div class="col-md-6">
quantity:

<?= $form->textBox('cquantity',array('class'=>'form-control')); ?>
<span style="color:red;">
<?= $validator->error('cquantity'); ?>
</div>
</div>

<div class="row">

                    <div class="col-md-6">

discription :

<?= $form->textBox('cdiscr',array('class'=>'form-control')); ?>
<span style="color:red;">
<?= $validator->error('cdiscr'); ?>

</div>
</div>




<!--<div class="row">

                    <div class="col-md-6">

expected price between  :

<?= $form->textBox('cdiscr',array('class'=>'form-control')); ?>
<span style="color:red;">
<?= $validator->error('cdiscr'); ?>

</div>
</div>-->

<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


