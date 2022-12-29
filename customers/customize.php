
<?php// include("header.php");	?>

<?php include("afterlogin.php"); ?>


<?php require('../config/autoload.php'); ?>

<?php
$file=new FileUpload();
$elements=array(
        "uemail"=>"","cid"=>"","cweight"=>"","cqty"=>"","cdiscr"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("uemail"=>"username","cid"=>"Category name","cweight"=>"weight","cqty"=>"quantity","cdiscr"=>"discription"  );

$rules=array(
    "cid"=>array("required"=>true),
    
"cweight"=> array('required'=>true,"minlength"=>1,"maxlength"=>30,"integeronly"=>true),
"cqty"=> array('required'=>true,"minlength"=>1,"maxlength"=>30,"integeronly"=>true),
"cdiscr"=> array('required'=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
	
//$name="abc@gmail.com";
//$name=$_SESSION['email'] ;
 echo $name;
 $_SESSION['email']=$name;
//$date1=date('Y-m-d',time());
$data=array(
        'uemail'=>$name,
        'cid'=>$_POST['cid'],
        'cweight'=>$_POST['cweight'],
        'cqty'=>$_POST['cqty'],  
        'cdiscr'=>$_POST['cdiscr'],  
        //'uemail'=>$name,
        //'book_date'=>$date1,
        'status'=>5
		
    );
  
    if($dao->insert($data,"customize"))
    {
        echo "<script> alert('successfully');</script> ";
        //header('location:customize.php');
    }
    else
        {$msg="Registration failed";} ?>

<!--<span style="color:red;"><?php echo $msg; ?></span>-->

<?php
    
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
category:

<?php
                    $options = $dao->createOptions('cname','cid',"category");
                    echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?><span style="color:red;">
<?= $validator->error('cid'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
weight:

<?= $form->textBox('cweight',array('class'=>'form-control')); ?><span style="color:red;">
<?= $validator->error('cweight'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
quantity:

<?= $form->textBox('cqty',array('class'=>'form-control')); ?><span style="color:red;">
<?= $validator->error('cqty'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
discription:

<?= $form->textBox('cdiscr',array('class'=>'form-control')); ?><span style="color:red;">
<?= $validator->error('cdiscr'); ?>

</div>
</div>



<button type="submit" name="btn_insert"  >Submit</button>


</form>


</body>


	
	

		</html>