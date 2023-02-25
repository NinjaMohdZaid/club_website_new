<?php 
    if(isset($_POST['update_table'])){
      $table_id =   $obj->add_table($_POST,$_REQUEST['game_id'],$_SESSION['auth']['club_id']);
      if(!empty($table_id)){
        header('Location:manage_tables.php?game_id='.$_REQUEST['game_id']);
      }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
?>


<h2>Add Table For <?php echo $game_data['game'] ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="table_name">Table</label>
        <input type="text" name="table_name" required class="form-control">
    </div>
    <div class="form-group">
        <label for="banner">Table Image</label>
        <input type="file" name="banner" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" required name="price" class="form-control">
    </div>
    <input type="submit" value="Add Table" name="update_table" class="btn btn-primary">
</form>