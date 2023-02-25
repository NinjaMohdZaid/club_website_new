<?php 
    if(isset($_POST['add_ground'])){
      $table_id =   $obj->add_ground($_POST,$_REQUEST['game_id'],$_SESSION['auth']['club_id']);
      if(!empty($table_id)){
        header('Location:manage_grounds.php?game_id='.$_REQUEST['game_id']);
      }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
?>


<h2>Add Ground For <?php echo $game_data['game'] ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="ground_name">Ground</label>
        <input type="text" name="ground_name" required class="form-control">
    </div>
    <div class="form-group">
        <label for="banner">Ground Image</label>
        <input type="file" name="banner" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" required name="price" class="form-control">
    </div>
    <input type="submit" value="Add Ground" name="add_ground" class="btn btn-primary">
</form>