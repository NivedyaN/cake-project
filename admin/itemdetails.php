<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
            "iname"=>"","iimage"=>"","offerprice"=>"","sellingprice"=>"","cid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('iname'=>"Item Name","iimage"=>"Item Image","iweight"=>"Item weight","offerprice"=>"offer Price","sellingprice"=>"selling Price","cid"=>"Category Name", );

$rules=array(
    "iname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"unique"=>array("field"=>"iname","table"=>"item")),
    "iimage"=> array('filerequired'=>true),
    
    "offerprice"=>array("required"=>true,"minlength"=>2,"maxlength"=>5,"integeronly"=>true),
    "sellingprice"=>array("required"=>true,"integeronly"=>true),
    "cid"=>array("required"=>true),
 
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
if($fileName=$file->doUploadRandom($_FILES['iimage'],array('.jpg','.png','.jpeg'),100000,2,'../uploads'))
		{

$data=array(

        'iname'=>$_POST['iname'],
        'iimage'=>$fileName,
        
        'offerprice'=>$_POST['offerprice'],
          'sellingprice'=>$_POST['sellingprice'],
		  'cid'=>$_POST['cid'],
          
        
         

    );
  
    if($dao->insert($data,"item"))
    {
        echo "<script> alert('New item created successfully');</script> ";
    //header('location:studentdetails1.php');
    }
    else
        {echo "<script> alert(' failed to create ');</script> "
            ;} ?>

<!--<span style="color:red;"><?php  ?></span>-->

<?php
    
}
else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 
<div class="row">
                    <div class="col-md-6">
                        <h1><center><b><font color="green"> ITEM DETAILS</b></center></h1>
Item Name:

<?= $form->textBox('iname',array('class'=>'form-control')); ?>
<?= $validator->error('iname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
                  
Item Image:

<?= $form->fileField('iimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('iimage'); ?></span>

</div>
</div>



<div class="row">

                    <div class="col-md-6">
Offer Price:

<?= $form->textBox('offerprice',array('class'=>'form-control')); ?>
<?= $validator->error('offerprice'); ?>
</div>
</div>

<div class="row">

                    <div class="col-md-6">

Selling Price:

<?= $form->textBox('sellingprice',array('class'=>'form-control')); ?>
<?= $validator->error('sellingprice'); ?>

</div>
</div>




<div class="row">
                    <div class="col-md-6">
Category Name:

<?php
                    $options = $dao->createOptions('cname','cid',"category");
                    echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>

</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


