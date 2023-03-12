<?php 
    if(isset($_POST['update_tournament'])){    

        $_POST['club_id'] = $_SESSION['auth']['club_id'];
      $tournament_id = $obj->add_tournament($_POST,$_SESSION['auth']['club_id']);
      if(!empty($tournament_id)){
        $club_id = $_SESSION['auth']['club_id'];
        if($_POST['is_sponser'] == 'Y'){
            foreach($_POST['sponsors_data'] as $key=>$value){
                $sponsor_id = $obj->add_sponsor($value,$tournament_id,$club_id);
            }
        }
        header('Location:manage_tournaments.php');
      }
    }
?>


<h2><?php echo $obj->__('add_tournament',$_SESSION['auth']['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="tournament"><?php echo $obj->__('tournament',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="tournament" required class="form-control">
    </div>
    <div class="form-group">
        <label for="banner"><?php echo $obj->__('trophy_or_prize_photo',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="tournament_description" id="tournament_description" cols="20" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_history"><?php echo $obj->__('history',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="tournament_history" id="tournament_history" cols="20" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_type"><?php echo $obj->__('type',$_SESSION['auth']['default_lang']); ?></label><br>
        <label for="tournament_type"><input type="radio" name="tournament_type" value="L" checked><?php echo $obj->__('league',$_SESSION['auth']['default_lang']); ?> </label>
        <label for="tournament_type"><input type="radio" name="tournament_type"  value="K"><?php echo $obj->__('knockout',$_SESSION['auth']['default_lang']); ?> </label>
        <label for="tournament_type"><input type="radio" name="tournament_type"  value="W"><?php echo $obj->__('winner_and_knockout_system',$_SESSION['auth']['default_lang']); ?></label>
    </div>
    <div class="form-group">
        <input type="hidden" name="free_entry" value="N">
        <label for="free_entry"><input id="free_entry_input" type="checkbox" name="free_entry" value="Y"><?php echo $obj->__('free_entry',$_SESSION['auth']['default_lang']); ?></label>
    </div>
    <div class="form-group" id="tournament_entry_fee">
        <label for="tournament_entry_fee"><?php echo $obj->__('entry_fees',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" step="0.01" id="tournament_entry_fee_value" name="tournament_entry_fee" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_start_date"><?php echo $obj->__('tournament_start_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" name="tournament_start_date" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_start_date"><?php echo $obj->__('tournament_registration_start_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" name="reg_start_date" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_end_date"><?php echo $obj->__('tournament_registration_end_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" name="reg_end_date" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_status"><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></label>
        <select name="tournament_status" id="tournament_status" class="form-control">
            <option value="A" checked="checked"><?php echo $obj->__('active',$_SESSION['auth']['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['auth']['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
    <label for="is_sponser"><?php echo $obj->__('do_you_have_sponsors?',$_SESSION['auth']['default_lang']); ?></label><br>
        <label for="is_sponser"><input type="radio" id="is_sponser_yes" name="is_sponser" value="Y" > <?php echo $obj->__('yes',$_SESSION['auth']['default_lang']); ?></label>
        <label for="is_sponser"><input type="radio" id="is_sponser_no" name="is_sponser"  value="N" checked> <?php echo $obj->__('no',$_SESSION['auth']['default_lang']); ?></label>
    </div>
    
    <div class="sponsors_div" Style="display:none;">
        <div class="form-group">
            <label for="options[1]"><b><?php echo $obj->__('sponsor',$_SESSION['auth']['default_lang']); ?> 1</b></label>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('sponsor_name',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="text" class="form-control" name="sponsors_data[1][sponsor_name]" >
                </div>
                <div class="form-group">
                    <label for="banner"><?php echo $obj->__('sponsor_logo',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="file" name="sponsors_data[1][banner]" class="form-control">
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('type_of_care',$_SESSION['auth']['default_lang']); ?>: </label>
                    <label for="care_type"><input type="radio" name="sponsors_data[1][care_type]" value="A" checked> <?php echo $obj->__('care',$_SESSION['auth']['default_lang']); ?>1</label>
                    <label for="care_type"><input type="radio" name="sponsors_data[1][care_type]"  value="B"> <?php echo $obj->__('care',$_SESSION['auth']['default_lang']); ?>2</label>
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('degree_of_care',$_SESSION['auth']['default_lang']); ?>: </label>
                    <label for="degree_type"><input type="radio" name="sponsors_data[1][degree_type]" value="A" checked> <?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?>1</label>
                    <label for="degree_type"><input type="radio" name="sponsors_data[1][degree_type]"  value="B"> <?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?>2</label>
                    <label for="degree_type"><input type="radio" name="sponsors_data[1][degree_type]"  value="C"> <?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?>3</label>
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('about_sponsor',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="text" class="form-control" name="sponsors_data[1][about_sponsor]">
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('care_value',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="text" class="form-control" name="sponsors_data[1][care_value]">
                </div>
        </div>
        
        <div class="appending_div">

        </div><hr>
        <span id="add_more_sponsors"><b><?php echo $obj->__('add_more_sponsors',$_SESSION['auth']['default_lang']); ?> +</b></span><br>

    </div>
    <div class="form-group">
        <input type="submit" value="<?php echo $obj->__('add_tournament',$_SESSION['auth']['default_lang']); ?>" name="update_tournament" class="btn btn-primary">
    </div>
</form>
<style>
    .hidden{
        display: none;
    }
</style>

<script>
    $('#free_entry_input').click(function(){
            $('#tournament_entry_fee').toggleClass('hidden');
            if($(this).prop("checked") == true){
                $('#tournament_entry_fee_value').val('0');
            }
        });
    $('#is_sponser_yes').click(function() {
        $('.sponsors_div input').attr("required", true);
        // $('.sponsors_div textarea').attr("required", true);
        $('.sponsors_div').show();
    });
   
    var i = 2;
    $('#is_sponser_no').click(function() {
    // $(this).closest('.form-group').remove();
        $('.sponsors_div').remove();
    });
    
    $('#add_more_sponsors').on('click', function() {
        var field = '<div class="sponsors_div"><div class="form-group"><label for="options['+i+']"><b>Sponsor '+i+'</b></label><div class="form-group"><label for="options['+i+']">Sponsor Name</label><input type="text" class="form-control" name="sponsors_data['+i+'][sponsor_name]" required><div class="form-group"><label for="banner">Sponsor Logo</label><input type="file" name="sponsors_data['+i+'][banner]" class="form-control"></div></div><div class="form-group"><label for="options['+i+']">Type of care: </label><label for="care_type"><input type="radio" name="sponsors_data['+i+'][care_type]" value="A"> Care'+i+'</label><label for="care_type"><input type="radio" name="sponsors_data['+i+'][care_type]"  value="B"> Care2</label></div><div class="form-group"><label for="options['+i+']">Degree of care: </label><label for="degree_type"><input type="radio" name="sponsors_data['+i+'][degree_type]" value="A"> Degree1</label><label for="degree_type"><input type="radio" name="sponsors_data['+i+'][degree_type]"  value="B"> Degree2</label><label for="degree_type"><input type="radio" name="sponsors_data['+i+'][degree_type]"  value="C"> Degree3</label></div><div class="form-group"><label for="options['+i+']">About Our Sponsor</label><input type="text" class="form-control" name="sponsors_data['+i+'][about_sponsor]" ></div><div class="form-group"><label for="options['+i+']">Care Value</label><input type="text" class="form-control" name="sponsors_data['+i+'][care_value]" required></div></div><div class="appending_div"></div></div>';
        $('.appending_div').append(field);
        i = i+1;
    });

</script>