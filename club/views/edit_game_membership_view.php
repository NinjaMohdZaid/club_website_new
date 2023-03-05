<?php 
    if(isset($_POST['update_game_membership'])){
      $res =   $obj->update_game_membership($_POST,$_SESSION['auth']['default_lang']);
      if(!empty($res)){
        $rtnMsg = $obj->__('updated_successfully',$_SESSION['auth']['default_lang']);
      }else{
        $rtnMsg = $obj->__('not_updated_successfully',$_SESSION['auth']['default_lang']);
      }
    }
    if(!empty($_REQUEST['membership_id'])){
        $membership_data = $obj->display_game_membershipByID($_REQUEST['membership_id'],$_SESSION['auth']['default_lang']);
    }
?>


<h2><?php echo $obj->__('update_membership',$_SESSION['auth']['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="membership_id" value="<?php echo $membership_data['membership_id'] ?>">
    <div class="form-group">
        <label for="membership_name"><?php echo $obj->__('membership',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="membership_name" value="<?php echo $membership_data['membership_name'] ?>" required class="form-control">
    </div>
    <?php if(!empty($membership_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/memberships/images/'.$membership_data['membership_id'].'/'. $membership_data['image']?>" style="width: 80px;" >
    <?php
    }
    ?>   
     
    <div class="form-group">
        <label for="banner"><?php echo $obj->__('membership_logo',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="months"><?php echo $obj->__('membership_months',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="months" min="1" value="<?php echo $membership_data['months'] ?>" class="form-control" required>
    </div> 
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" step="0.01" required name="price" value="<?php echo $membership_data['price'] ?>" class="form-control">
    </div>
    <input type="submit" value="<?php echo $obj->__('update_membership',$_SESSION['auth']['default_lang']); ?>" name="update_game_membership" class="btn btn-primary">
</form>