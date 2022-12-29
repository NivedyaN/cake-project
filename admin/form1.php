
<?php 

require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
       "cat_name"=>"");
$form=new FormAssist($elements,$_POST);
$dao=new DataAccess();
$labels=array('cat_name'=>"Category Name");
$rules=array(
   "cat_name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true,"unique"=>array("field"=>"cat_name","table"=>"tbl_category")),
); 
$validator = new FormValidator($rules,$labels);
if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
$data=array(
       'cat_name'=>$_POST['cat_name'], 
       'status'=>'1',  
   );
   if($dao->insert($data,"tbl_category"))
   {
       echo "<script> alert('category added successfully');</script> ";
        //header('location:category.php');
   }
   else
       {
           $msg="submission failed";
           } ?>

<!--<span style="color:red;"><?php echo $msg; ?></span>-->
<?php 
}
}
?>



<form>
<div class="row">
 <div class="col-md-6">
Category Name:

<?= $form->textBox('cat_name',array('class'=>'form-control')); ?>
<?= $validator->error('cat_name'); ?>
</div>
</div>
<button type="submit" name="btn_insert"  >Submit</button>
           </form>       



           <?php
include('footer.html');
?>