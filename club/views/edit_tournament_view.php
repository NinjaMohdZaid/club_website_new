<?php 
    if(isset($_POST['update_tournament'])){
        $up_msg = $obj->update_tournament($_POST,$_SESSION['auth']['default_lang']);
        if(!empty($tournament_id)){
            $club_id = $_SESSION['auth']['club_id'];
            if($_POST['is_sponser'] == 'Y'){
                foreach($_POST['sponsors_data'] as $key=>$value){
                    $sponsor_id = $obj->add_sponsor($value,$_POST['t_id'],$club_id);
                }
            }
            // header('Location:manage_tournaments.php');
          }
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $get_id = $_GET['id'];
            $tournament = $obj->display_tournamentByID($get_id,$_SESSION['auth']['default_lang']);
            $sponsors = $obj->display_sponsors_by_tournament_id($get_id, $_SESSION['auth']['default_lang']);
            // print_r($sponsors);
            // die;
        }
    }
    
?>


<h2><?php echo $obj->__('update_tournament',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="t_id" class="form-control" value="<?php echo $tournament['t_id'] ?>">
    <div class="form-group">
        <label for="tournament"><?php echo $obj->__('tournament',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="tournament" value="<?php echo $tournament['tournament'] ?>" required class="form-control">
    </div>
    <div class="form-group">
        <div class="mb-3">
            <img src="../assets/files/tournaments/images/<?php echo $tournament['t_id'].'/'.$tournament['image']; ?>" style="width: 80px;" >
        </div>
        <label for="banner"><?php echo $obj->__('trophy_or_prize_photo',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>

    <div class="form-group">
        <label for="tournament_description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="tournament_description" id="tournament_description" cols="20" rows="10" class="form-control"><?php echo $tournament['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_history"><?php echo $obj->__('history',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="tournament_history" id="tournament_history" cols="20" rows="10" class="form-control"><?php echo $tournament['tournament'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_type"><?php echo $obj->__('type',$_SESSION['auth']['default_lang']); ?></label><br>
        <label for="tournament_type"><input type="radio" name="tournament_type"<?php if($tournament['type'] == 'L')echo 'checked'; ?> value="L"><?php echo $obj->__('league',$_SESSION['auth']['default_lang']); ?></label>
        <label for="tournament_type"><input type="radio" name="tournament_type"<?php if($tournament['type'] == 'K')echo 'checked'; ?>  value="K"><?php echo $obj->__('knockout',$_SESSION['auth']['default_lang']); ?></label>
        <label for="tournament_type"><input type="radio" name="tournament_type"<?php if($tournament['type'] == 'W')echo 'checked'; ?>  value="W"><?php echo $obj->__('winner_and_knockout_system',$_SESSION['auth']['default_lang']); ?></label>
    </div>
    <div class="form-group">
        <label for="tournament_entry_fee"><?php echo $obj->__('entry_fees',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="tournament_entry_fee" value="<?php echo $tournament['fee'] ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_start_date"><?php echo $obj->__('tournament_start_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" name="tournament_start_date" required class="form-control" value="<?php echo date("Y-m-d\TH:i:s", $tournament['tournament_start_date']); ?>">
    </div>
    <div class="form-group">
        <label for="reg_start_date"><?php echo $obj->__('tournament_registration_start_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" name="reg_start_date" value="<?php echo date("Y-m-d\TH:i:s", $tournament['reg_start_date']); ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_end_date"><?php echo $obj->__('tournament_registration_end_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" name="reg_end_date" value="<?php echo date("Y-m-d\TH:i:s", $tournament['reg_end_date']); ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_status"><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></label>
        <select name="tournament_status" id="tournament_status" class="form-control">
            <option value="A" <?php if($tournament['status'] == 'A')echo 'selected'; ?>><?php echo $obj->__('active',$_SESSION['auth']['default_lang']); ?></option>
            <option value="D" <?php if($tournament['status'] == 'D')echo 'selected'; ?>><?php echo $obj->__('disabled',$_SESSION['auth']['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <!-- <label for="is_sponser">Do you have a sponsor?</label>
        <input type="checkbox" name="is_sponser"  value="<?php echo $tournament['is_sponser'] ?>" <?php if($tournament['is_sponser'] == 'Y')echo 'checked'; ?>>
     -->
     <label for="is_sponser"><?php echo $obj->__('do_you_have_sponsors?',$_SESSION['auth']['default_lang']); ?></label><br>
        <label for="is_sponser"><input type="radio" id="is_sponser_yes" name="is_sponser" value="Y" <?php if($tournament['is_sponser'] == 'Y')echo 'checked'; ?>> <?php echo $obj->__('yes',$_SESSION['auth']['default_lang']); ?></label>
        <label for="is_sponser"><input type="radio" id="is_sponser_no" name="is_sponser"  value="N" <?php if($tournament['is_sponser'] == 'N')echo 'checked'; ?>> <?php echo $obj->__('no',$_SESSION['auth']['default_lang']); ?></label>
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
                    <label for="care_type"><input type="radio" name="sponsors_data[1][care_type]" value="A" checked><?php echo $obj->__('care',$_SESSION['auth']['default_lang']); ?> 1</label>
                    <label for="care_type"><input type="radio" name="sponsors_data[1][care_type]"  value="B"><?php echo $obj->__('care',$_SESSION['auth']['default_lang']); ?> 2</label>
                </div>
                <div class="form-group">
                <label for="options[1]">Degree of care: </label>
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
    <?php if($tournament['is_sponser'] == 'Y') { ?>
<?php if(!empty($sponsors)) { ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
                <th><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></th>
                <th><?php echo $obj->__('about',$_SESSION['auth']['default_lang']); ?></th>
                <th><?php echo $obj->__('care_value',$_SESSION['auth']['default_lang']); ?></th>
                <th><?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?></th>
                <th><?php echo $obj->__('type',$_SESSION['auth']['default_lang']); ?></th>
                <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($sponsors as $key => $sponsor) { ?>
            <tr>
                <td><?php echo '#<b>'.$sponsor['sponsor_id'].'</b>' ?></td>
                <td><?php echo '<b>'.$sponsor['sponsor_name'].'</b>' ?></td>
                <td><?php echo '<b>'.$sponsor['sponsor_about'].'</b>' ?></td>
                <td><?php echo '<b>'.$sponsor['care_value'].'</b>' ?></td>
                <td><?php if($sponsor['sponsor_type'] == 'A') {echo $obj->__('degree',$_SESSION['auth']['default_lang'])." 1";}
                        elseif($sponsor['sponsor_type'] == 'B'){echo $obj->__('degree',$_SESSION['auth']['default_lang'])." 2";}
                        elseif($sponsor['sponsor_type'] == 'C'){echo $obj->__('degree',$_SESSION['auth']['default_lang'])." 3";} ?></td>
                <td><?php if($sponsor['degree_of_care'] == 'A') {echo $obj->__('care',$_SESSION['auth']['default_lang'])." 1";}
                        elseif($sponsor['degree_of_care'] == 'B'){echo $obj->__('care',$_SESSION['auth']['default_lang'])." 2";}
                        elseif($sponsor['degree_of_care'] == 'C'){echo $obj->__('care',$_SESSION['auth']['default_lang'])." 3";} ?></td>
                <td class="manage_booking_action">
                    <a href="edit_sponsor.php?action=edit&sponsor_id=<?php echo $sponsor['sponsor_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                    <!-- <a href="?action=delete&booking_id=<?php echo $sponsor['sponsor_id'] ?>" class="btn btn-sm btn-success">Cancel</a> -->
                    <a href="?action=delete&sponsor_id=<?php echo $sponsor['sponsor_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
                </td>
            
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <?php } ?>
</div>
<?php  }else{ ?>
<div>
<?php echo $obj->__('no_data_found',$_SESSION['auth']['default_lang']); ?>
</div>
<?php  } ?>
    <a id="add_more_sponser_yes"> <b><?php echo $obj->__('add_more_sponsors',$_SESSION['auth']['default_lang']); ?> +</b> </a><br>
    <input type="submit" value="<?php echo $obj->__('update_tournament',$_SESSION['auth']['default_lang']); ?>" name="update_tournament" class="btn btn-primary">
</form>

<script>
    $('#is_sponser_yes').click(function() {
        $('.sponsors_div input').attr("required", true);
        // $('.sponsors_div textarea').attr("required", true);
        $('.sponsors_div').show();
    });
    $('#add_more_sponser_yes').click(function() {
        $('.sponsors_div input').attr("required", true);
        // $('.sponsors_div textarea').attr("required", true);
        $('.sponsors_div').show();
        $('#add_more_sponser_yes').hide();
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