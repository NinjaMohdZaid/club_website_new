<?php 
    if(isset($_POST['update_ground'])){
      $res =   $obj->update_ground($_POST,$_SESSION['auth']['default_lang']);
      if(!empty($res)){
        $rtnMsg = $obj->__('updated_successfully',$_SESSION['auth']['default_lang']);
      }else{
        $rtnMsg = $obj->__('not_updated_successfully',$_SESSION['auth']['default_lang']);
      }
    }
    if(!empty($_REQUEST['ground_id'])){
        $ground_data = $obj->display_groundByID($_REQUEST['ground_id'],$_SESSION['auth']['default_lang']);
    }
?>


<h2><?php echo $obj->__('update_gorund',$_SESSION['auth']['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ground_id" value="<?php echo $ground_data['ground_id'] ?>">
    <div class="form-group">
        <label for="ground_name"><?php echo $obj->__('ground',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="ground_name" value="<?php echo $ground_data['ground_name'] ?>" required class="form-control">
    </div>
    <?php if(!empty($ground_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/grounds/images/'.$ground_data['ground_id'].'/'. $ground_data['image']?>" style="width: 80px;" >
    <?php
    }
    ?>    
    <div class="form-group">
        <label for="banner"><?php echo $obj->__('ground_image',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" step="0.01" required name="price" value="<?php echo $ground_data['price'] ?>" class="form-control">
    </div>
    <input type="submit" value="<?php echo $obj->__('update_ground',$_SESSION['auth']['default_lang']); ?>" name="update_ground" class="btn btn-primary">
</form>