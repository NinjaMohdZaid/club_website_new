<?php 

    if(isset($_POST['add_ctg'])){
      $rtnMsg =   $obj->add_category($_POST);
      if(!empty($rtnMsg)){
        $rtnMsg = $obj->__('category_added_successfully',$_SESSION['default_lang']);
      }else{
        $rtnMsg = $obj->__('category_not_added',$_SESSION['default_lang']);;
      }
    }
?>


<h2><?php echo $obj->__('add_category',$_SESSION['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="category"><?php echo $obj->__('category_name',$_SESSION['default_lang']); ?></label>
        <input type="text" name="category" class="form-control">
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <input type="text" name="description" class="form-control">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <input type="submit" value="<?php echo $obj->__('add',$_SESSION['default_lang']); ?>" name="add_ctg" class="btn btn-primary" >

</form>