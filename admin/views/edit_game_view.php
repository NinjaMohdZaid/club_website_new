
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


<h2><?php echo $obj->__('update_game',$_SESSION['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="game"><?php echo $obj->__('game',$_SESSION['default_lang']); ?></label>
        <input type="text" name="game" class="form-control" value="<?php echo $game_data['game'] ?>">
    </div>

    <div class="form-group">
        <label for="booking_by"><?php echo $obj->__('booking_by',$_SESSION['default_lang']); ?></label>
        <select name="booking_by" id="booking_by" class="form-control">
            <option value="H" <?php if($game_data['booking_by'] == 'H'){echo 'selected';} ?>><?php echo $obj->__('shot',$_SESSION['default_lang']); ?></option>
            <option value="T" target_id="time_dependent_field" <?php if($game_data['booking_by'] == 'T'){echo 'selected';} ?>><?php echo $obj->__('time',$_SESSION['default_lang']); ?></option>
            <option value="M" <?php if($game_data['booking_by'] == 'M'){echo 'selected';} ?>><?php echo $obj->__('monthly',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="min_players"><?php echo $obj->__('minumum_number_of_players',$_SESSION['default_lang']); ?></label>
        <input type="number" name="min_players" class="form-control" value="<?php echo $game_data['min_players']; ?>">
    </div>

    <div class="form-group">
        <label for="banner"><?php echo $obj->__('game_banner',$_SESSION['default_lang']); ?></label>
        <?php if(!empty($game_data['image_location'])){?>
            <div class="mb-3">
                <img src="<?php echo '../assets/files/games/images/'.$game_data['game_id'].'/'. $game_data['image_location']?>" style="width: 80px;" >
            </div>
        <?php }?>
        <input type="file" name="banner" class="form-control">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A" <?php if($game_data['status'] == 'A'){echo 'selected';} ?>><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D" <?php if($game_data['status'] == 'D'){echo 'selected';} ?>><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="field_type"><?php echo $obj->__('field_or_ground_names',$_SESSION['default_lang']); ?></label>
        <select name="field_type" class="form-control">
            <option value="T" <?php if($game_data['field_type'] == 'T'){echo 'selected';} ?>><?php echo $obj->__('table',$_SESSION['default_lang']); ?></option>
            <option value="G" <?php if($game_data['field_type'] == 'G'){echo 'selected';} ?>><?php echo $obj->__('ground',$_SESSION['default_lang']); ?></option>
            <option value="P" <?php if($game_data['field_type'] == 'P'){echo 'selected';} ?>><?php echo $obj->__('pitch',$_SESSION['default_lang']); ?></option>
            <option value="E" <?php if($game_data['field_type'] == 'E'){echo 'selected';} ?>><?php echo $obj->__('game',$_SESSION['default_lang']); ?></option>
            <option value="M" <?php if($game_data['field_type'] == 'M'){echo 'selected';} ?>><?php echo $obj->__('membership',$_SESSION['default_lang']); ?></option>

        </select>
    </div>
    <input type="hidden" name="game_id" value="<?php echo $game_data['game_id'] ?>" >

    <input type="submit" value="<?php echo $obj->__('update_game',$_SESSION['default_lang']); ?>" name="update_game" class="btn btn-primary" >

</form>

<script>
     //onchange dev start for type of ad
    $("#booking_by").change(function() {
        var target_id = $('option:selected', this).attr('target_id');
        $(".dependent_field").addClass("hidden");
        $('.dependent_field input').removeAttr('required');
        $('.dependent_field textarea').removeAttr('required');
        $("#" + target_id).removeClass("hidden");
        $("#" + target_id + ' input').attr("required", true);
        $("#" + target_id + ' textarea').attr("required", true);
    });
</script>
<style>
    .hidden{
        display: none;
    }
</style>