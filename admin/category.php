<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "cname"=>"","cimage"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cname'=>"Category Name",'cimage'=>"Category image");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"unique"=>array("field"=>"cname","table"=>"category")),
    "cimage"=>array('filerequired'=>true));
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,2,'../uploads'))
    {

$data=array(

        'cname'=>$_POST['cname'],
        'cimage'=>$fileName,
         
    );
  
    if($dao->insert($data,"category"))
    {
        echo "<script> alert('New category created successfully');</script> ";
//header('location:category.php');//


    }
    else
        {$msg="creation failed";} ?>

<!--<span style="color:red;"><?php echo $msg; ?></span>-->

<?php
    

    }
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
                        <h1><center><b><font color="green"> CATEGORY</b></center></h1>
Name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Image:

<?= $form->filefield('cimage',array('class'=>'form-control')); ?>
<?= $validator->error('cimage'); ?>

</div>
</div>



<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


