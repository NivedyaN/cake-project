<?php 

 require('../config/autoload.php'); 
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','company','cid='.$_GET['id']);

$file=new FileUpload();
$elements=array(
    "cname"=>$info[0]['cname'],"cimage"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cname'=>"Company Name","cimage"=>"companyimage");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
"cimage"=> array('filerequired'=>true)
     
);
    
    
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
  
    $condition='cid='.$_GET['id'];
    if(isset($flag))
                {	$data['cimage']=$fileName;
            
                }
        
    
    if($dao->update($data,'company',$condition))
        {
            $msg="Successfully updated";
    
        }
        else
            {$msg="Failed";} ?>
    
    <span style="color:red;"><?php echo $msg; ?></span>
    
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
company Name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>



<div class="row">
                    <div class="col-md-6">
IMAGE:

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>

</div>
</div>

<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>


