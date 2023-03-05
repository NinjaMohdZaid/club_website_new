<?php 
    if(isset($_POST['add_game_membership'])){
      $table_id =   $obj->add_game_membership($_POST,$_REQUEST['game_id'],$_SESSION['auth']['club_id']);
      if(!empty($table_id)){
        header('Location:manage_game_memberships.php?game_id='.$_REQUEST['game_id']);
      }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
?>


<h2><?php echo $obj->__('add_membership_for',$_SESSION['auth']['default_lang']); ?> <?php echo $game_data['game'] ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="membership_name"><?php echo $obj->__('membership',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="membership_name" required class="form-control">
    </div>
    <div class="form-group">
        <label for="banner"><?php echo $obj->__('membership_logo',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="months"><?php echo $obj->__('membership_months',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="months" min="1" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" step="0.01" required name="price" class="form-control">
    </div>
    <input type="submit" value="<?php echo $obj->__('add_membership',$_SESSION['auth']['default_lang']); ?>" name="add_game_membership" class="btn btn-primary">
</form>