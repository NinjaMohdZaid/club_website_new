<?php 
   

    if(isset($_POST['update_tournament'])){
        $up_msg = $obj->update_tournament($_POST,$_SESSION['auth']['default_lang']);
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $get_id = $_GET['id'];
            $tournament = $obj->display_tournamentByID($get_id,$_SESSION['auth']['default_lang']);
        }
    }
    
?>


<h2>Update Tournament</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="t_id" class="form-control" value="<?php echo $tournament['t_id'] ?>">
    <div class="form-group">
        <label for="tournament">Tournament Name</label>
        <input type="text" name="tournament" value="<?php echo $tournament['tournament'] ?>" required class="form-control">
    </div>
    <div class="form-group">
        <div class="mb-3">
            <img src="../assets/files/tournaments/images/<?php echo $tournament['t_id'].'/'.$tournament['image']; ?>" style="width: 80px;" >
        </div>
        <label for="banner">Trophy/Prize Photo</label>
        <input type="file" name="banner" class="form-control">
    </div>

    <div class="form-group">
        <label for="tournament_description">Tournament description</label>
        <textarea name="tournament_description" id="tournament_description" cols="20" rows="10" class="form-control"><?php echo $tournament['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_history">Tournament History</label>
        <textarea name="tournament_history" id="tournament_history" cols="20" rows="10" class="form-control"><?php echo $tournament['tournament'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_type">Tournament Type</label><br>
        <label for="tournament_type"><input type="radio" name="tournament_type"<?php if($tournament['type'] == 'L')echo 'checked'; ?> value="L"> League</label>
        <label for="tournament_type"><input type="radio" name="tournament_type"<?php if($tournament['type'] == 'K')echo 'checked'; ?>  value="K"> Knockout</label>
        <label for="tournament_type"><input type="radio" name="tournament_type"<?php if($tournament['type'] == 'W')echo 'checked'; ?>  value="W"> Winner and Knockout System</label>
    </div>
    <div class="form-group">
        <label for="tournament_start_date">Tournament Start Date</label>
        <input type="datetime-local" name="tournament_start_date" required class="form-control" value="<?php echo date("Y-m-d\TH:i:s", $tournament['tournament_start_date']); ?>">
    </div>
    <div class="form-group">
        <label for="tournament_entry_fee">Tournament Entry fee</label>
        <input type="number" name="tournament_entry_fee" value="<?php echo $tournament['fee'] ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_start_date">Tournament Registration Start Date</label>
        <input type="datetime-local" name="reg_start_date" value="<?php echo date("Y-m-d\TH:i:s", $tournament['reg_start_date']); ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_end_date">Tournament Registration End Date</label>
        <input type="datetime-local" name="reg_end_date" value="<?php echo date("Y-m-d\TH:i:s", $tournament['reg_end_date']); ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_status">Status</label>
        <select name="tournament_status" id="tournament_status" class="form-control">
            <option value="A" <?php if($tournament['status'] == 'A')echo 'selected'; ?>>Active</option>
            <option value="D" <?php if($tournament['status'] == 'D')echo 'selected'; ?>>Disable</option>
        </select>
    </div>
    <div class="form-group">
        <label for="is_sponser">Do you have a sponsor?</label>
        <input type="checkbox" name="is_sponser"  value="<?php echo $tournament['is_sponser'] ?>" <?php if($tournament['is_sponser'] == 'Y')echo 'checked'; ?>>
    </div>
    
    <input type="submit" value="Update Tournaments" name="update_tournament" class="btn btn-primary">
</form>