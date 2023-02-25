<?php 
    if(isset($_POST['update_ground'])){
      $res =   $obj->update_ground($_POST,$_SESSION['auth']['default_lang']);
      if(!empty($res)){
        $rtnMsg = 'Updated successfully';
      }else{
        $rtnMsg = 'Ground not updated try again';
      }
    }
    if(!empty($_REQUEST['ground_id'])){
        $ground_data = $obj->display_groundByID($_REQUEST['ground_id'],$_SESSION['auth']['default_lang']);
    }
?>


<h2>Update ground</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ground_id" value="<?php echo $ground_data['ground_id'] ?>">
    <div class="form-group">
        <label for="ground_name">Ground</label>
        <input type="text" name="ground_name" value="<?php echo $ground_data['ground_name'] ?>" required class="form-control">
    </div>
    <?php if(!empty($ground_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/grounds/images/'.$ground_data['ground_id'].'/'. $ground_data['image']?>" style="width: 80px;" >
    <?php
    }
    ?>    
    <div class="form-group">
        <label for="banner">Ground Image</label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" required name="price" value="<?php echo $ground_data['price'] ?>" class="form-control">
    </div>
    <input type="submit" value="Update ground" name="update_ground" class="btn btn-primary">
</form>