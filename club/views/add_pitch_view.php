<?php 
    if(isset($_POST['add_pitch'])){
      $table_id =   $obj->add_pitch($_POST,$_REQUEST['game_id'],$_SESSION['auth']['club_id']);
      if(!empty($table_id)){
        header('Location:manage_pitches.php?game_id='.$_REQUEST['game_id']);
      }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
?>


<h2>Add Pitch For <?php echo $game_data['game'] ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pitch_name">Pitch</label>
        <input type="text" name="pitch_name" required class="form-control">
    </div>
    <div class="form-group">
        <label for="banner">Pitch Image</label>
        <input type="file" name="banner" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" required name="price" class="form-control">
    </div>
    <input type="submit" value="Add Pitch" name="add_pitch" class="btn btn-primary">
</form>