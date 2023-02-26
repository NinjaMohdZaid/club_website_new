<?php 
  
    if(isset($_POST['update_logo'])){
        $up_msg = $obj->update_logo($_POST);
    }
    if(isset($_GET['status'])){
        if($_GET['status']=='edit'){
            $id = $_GET['id'];
           $logo =$obj->display_logo_ID($id);
        }
    }
?>


<h2><?php echo $obj->__('update_logo',$_SESSION['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action=""  enctype="multipart/form-data"  method="post">


    <div class="form-group">
        <label for="img"><?php echo $obj->__('image',$_SESSION['default_lang']); ?></label>
        <input type="file" name="img" class="form-control">
       
    <input type="hidden" name="id" value="<?php echo $logo['id'] ?>" >


    <input type="submit" value="<?php echo $obj->__('update_logo',$_SESSION['default_lang']); ?>" name="update_logo" class="btn btn-primary" >

</form>