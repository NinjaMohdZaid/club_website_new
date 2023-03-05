<?php 
    if(isset($_POST['update_table'])){
      $res =   $obj->update_table($_POST,$_SESSION['auth']['default_lang']);
      if(!empty($res)){
        $rtnMsg = $obj->__('updated_successfully',$_SESSION['auth']['default_lang']);
      }else{
        $rtnMsg = $obj->__('not_updated_successfully',$_SESSION['auth']['default_lang']);
      }
    }
    if(!empty($_REQUEST['table_id'])){
        $table_data = $obj->display_tableByID($_REQUEST['table_id'],$_SESSION['auth']['default_lang']);
    }
?>


<h2><?php echo $obj->__('update_table',$_SESSION['auth']['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="table_id" value="<?php echo $table_data['table_id'] ?>">
    <div class="form-group">
        <label for="table_name"><?php echo $obj->__('table',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="table_name" value="<?php echo $table_data['table_name'] ?>" required class="form-control">
    </div>
    <?php if(!empty($table_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/tables/images/'.$table_data['table_id'].'/'. $table_data['image']?>" style="width: 80px;" >
    <?php
    }
    ?>    
    <div class="form-group">
        <label for="banner"><?php echo $obj->__('table_image',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" required name="price" value="<?php echo $table_data['price'] ?>" class="form-control">
    </div>
    <input type="submit" value="<?php echo $obj->__('update_table',$_SESSION['auth']['default_lang']); ?>" name="update_table" class="btn btn-primary">
</form>