<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','item','iid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "iname"=>$info[0]['iname'],"iimage"=>"","offerprice"=>$info[0]['offerprice'],"sellingprice"=>$info[0]['sellingprice'],"cid"=>$info[0]['cid']);

	$form = new FormAssist($elements,$_POST);

$labels=array('iname'=>"item  Name","iimage"=>"item image","iweight"=>"item weight","offerprice"=>"offer price","sellingprice"=>"selling price","cid"=>"cid" );

$rules=array(
    "iname"=>array("minlength"=>3,"maxlength"=>30),
    "iimage"=>array(),
   
    
    "offerprice"=>array("minlength"=>1,"maxlength"=>10,"integeronly"=>true),
    "sellingprice"=>array("minlength"=>2,"maxlength"=>10,"integeronly"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['iimage'])){
			if($fileName=$file->doUploadRandom($_FILES['iimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

        'iname'=>$_POST['iname'],
       
        //'iimage'=>$_POST['iimage'],
        'offerprice'=>$_POST['offerprice'],
	      'sellingprice'=>$_POST['sellingprice'],
        //'cid'=>$_POST['cid'],
       
    );
  $condition='iid='.$_GET['id'];
if(isset($flag))
			{	$data['iimage']=$fileName;
		
			}
    

if($dao->update($data,'item',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
Name:

<?= $form->textBox('iname',array('class'=>'form-control')); ?>
<?= $validator->error('iname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
                   
Image:


<?= $form->fileField('iimage',array('class'=>'form-control')); ?>

</div>
</div>

</div>
<div class="row">
                    <div class="col-md-6">
Offer price:

<?= $form->textBox('offerprice',array('class'=>'form-control')); ?>
<?= $validator->error('offerprice'); ?>

</div>
</div>





<div class="row">
                    <div class="col-md-6">
Selling price:

<?= $form->textBox('sellingprice',array('class'=>'form-control')); ?>
<?= $validator->error('sellingprice'); ?>

</div>
</div>

<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>
