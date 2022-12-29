<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','category','cid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cname"=>$info[0]['cname'],"cimage"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('cname'=>"category Name","cimage"=>"category image", );

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>1,"maxlength"=>30),
    "cimage"=>array()
    //"cimage"=>
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
  
if($validator->validate($_POST))
{

if(isset($_FILES['cimage'])){
			if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))
			{
				$flag=true;
					
			}
}
$data=array(

        'cname'=>$_POST['cname'],
         // 'cimage'=>$_POST['cimage'],
    );
  $condition='cid='.$_GET['id'];
if(isset($flag))
			{	$data['cimage']=$fileName;
		
			}
    

if($dao->update($data,'category',$condition))
    {
        $msg="Successfully Updated";

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

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">


IMAGE:


<?= $form->fileField('cimage',array('class'=>'form-control')); ?>

</div>
</div>





<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>
