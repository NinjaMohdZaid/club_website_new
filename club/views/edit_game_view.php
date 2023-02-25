
<?php 
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $game_id = $_GET['game_id'];
            $game_data = $obj->display_gameByID($game_id,$_SESSION['default_lang']);
        }
    }

    if(isset($_POST['update_game'])){
        $up_msg = $obj->update_game($_POST,$_SESSION['default_lang']);
    }
?>


<h2>Update Game</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="game">Game</label>
        <input type="text" name="game" class="form-control" value="<?php echo $game_data['game'] ?>">
    </div>

    <div class="form-group">
        <label for="booking_by">Booking By</label>
        <select name="booking_by" class="form-control">
            <option value="S" <?php if($game_data['booking_by'] == 'S'){echo 'selected';} ?>>Shot</option>
            <option value="H" <?php if($game_data['booking_by'] == 'G'){echo 'selected';} ?>>Game</option>
            <option value="G" <?php if($game_data['booking_by'] == 'H'){echo 'selected';} ?>>Hour</option>
            <option value="M" <?php if($game_data['booking_by'] == 'M'){echo 'selected';} ?>>Monthly</option>
        </select>
    </div>

    <div class="form-group">
        <label for="min_players">Minumum Number Of Players</label>
        <input type="number" name="min_players" class="form-control" value="<?php echo $game_data['min_players']; ?>">
    </div>

    <div class="form-group">
        <label for="banner">Game Banner</label>
        <?php if(!empty($game_data['image_location'])){?>
            <div class="mb-3">
                <img src="<?php echo $game_data['image_location']?>" style="width: 80px;" >
            </div>
        <?php }?>
        <input type="file" name="banner" class="form-control">
    </div>

    <div class="form-group">
        <label for="status">Satus</label>
        <select name="status" class="form-control">
            <option value="A" <?php if($game_data['status'] == 'A'){echo 'selected';} ?>>Active</option>
            <option value="D" <?php if($game_data['status'] == 'D'){echo 'selected';} ?>>Disabled</option>
        </select>
    </div>
    <div class="form-group">
        <label for="field_type">Field / ground names</label>
        <select name="field_type" class="form-control">
            <option value="A" <?php if($game_data['field_type'] == 'A'){echo 'selected';} ?>>Table</option>
            <option value="G" <?php if($game_data['field_type'] == 'G'){echo 'selected';} ?>>Ground</option>
            <option value="P" <?php if($game_data['field_type'] == 'P'){echo 'selected';} ?>>Pitch</option>
            <option value="E" <?php if($game_data['field_type'] == 'E'){echo 'selected';} ?>>Game</option>
            <option value="M" <?php if($game_data['field_type'] == 'M'){echo 'selected';} ?>>Membership</option>

        </select>
    </div>
    <input type="hidden" name="game_id" value="<?php echo $game_data['game_id'] ?>" >

    <input type="submit" value="Update Game" name="update_game" class="btn btn-primary" >

</form>