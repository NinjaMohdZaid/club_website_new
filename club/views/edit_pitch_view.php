<?php 
    if(isset($_POST['update_pitch'])){
      $res =   $obj->update_pitch($_POST,$_SESSION['auth']['default_lang']);
      if(!empty($res)){
        $rtnMsg = $obj->__('updated_successfully',$_SESSION['auth']['default_lang']);
      }else{
        $rtnMsg = $obj->__('not_updated_successfully',$_SESSION['auth']['default_lang']);
      }
    }
    if(!empty($_REQUEST['pitch_id'])){
        $pitch_data = $obj->display_pitchByID($_REQUEST['pitch_id'],$_SESSION['auth']['default_lang']);
    }
?>


<h2><?php echo $obj->__('update_pitch',$_SESSION['auth']['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="pitch_id" value="<?php echo $pitch_data['pitch_id'] ?>">
    <div class="form-group">
        <label for="pitch_name"><?php echo $obj->__('pitch',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="pitch_name" value="<?php echo $pitch_data['pitch_name'] ?>" required class="form-control">
    </div>
    <?php if(!empty($pitch_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/pitches/images/'.$pitch_data['pitch_id'].'/'. $pitch_data['image']?>" style="width: 80px;" >
    <?php
    }
    ?>    
    <div class="form-group">
        <label for="banner"><?php echo $obj->__('pitch_image',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" step="0.01" required name="price" value="<?php echo $pitch_data['price'] ?>" class="form-control">
    </div>
    <input type="submit" value="<?php echo $obj->__('update_pitch',$_SESSION['auth']['default_lang']); ?>" name="update_pitch" class="btn btn-primary">
</form>