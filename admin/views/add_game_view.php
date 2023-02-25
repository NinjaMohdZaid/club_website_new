<?php 

    if(isset($_POST['add_game'])){
      $rtnMsg =   $obj->add_game($_POST);
    }
?>


<h2><?php echo $obj->__('add_game',$_SESSION['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="game"><?php echo $obj->__('game',$_SESSION['default_lang']); ?></label>
        <input type="text" name="game" class="form-control">
    </div>

    <div class="form-group">
        <label for="booking_by"><?php echo $obj->__('booking_by',$_SESSION['default_lang']); ?></label>
        <select name="booking_by" id="booking_by" class="form-control">
            <option value="H"><?php echo $obj->__('shot',$_SESSION['default_lang']); ?></option>
            <option value="T" target_id="time_dependent_field"><?php echo $obj->__('time',$_SESSION['default_lang']); ?></option>
            <option value="M"><?php echo $obj->__('monthly',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group dependent_field hidden" id="time_dependent_field">
        <label for="time_slot"><?php echo $obj->__('time_slot',$_SESSION['default_lang']); ?></label>
        <input type="number" name="time_slot" class="form-control">
    </div>

    <div class="form-group">
        <label for="min_players"><?php echo $obj->__('min_no_of_players',$_SESSION['default_lang']); ?></label>
        <input type="number" name="min_players" class="form-control">
    </div>

    <div class="form-group">
        <label for="banner"><?php echo $obj->__('add_banner',$_SESSION['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="field_type"><?php echo $obj->__('field_or_ground_names',$_SESSION['default_lang']); ?></label>
        <select name="field_type" class="form-control">
            <option value="T"><?php echo $obj->__('table',$_SESSION['default_lang']); ?></option>
            <option value="G"><?php echo $obj->__('ground',$_SESSION['default_lang']); ?></option>
            <option value="P"><?php echo $obj->__('pitch',$_SESSION['default_lang']); ?></option>
            <option value="E"><?php echo $obj->__('game',$_SESSION['default_lang']); ?></option>
            <option value="M"><?php echo $obj->__('membership',$_SESSION['default_lang']); ?></option>

        </select>
    </div>
    <input type="submit" value="<?php echo $obj->__('add_game',$_SESSION['default_lang']); ?>" name="add_game" class="btn btn-primary" >

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