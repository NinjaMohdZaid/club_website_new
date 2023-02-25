<?php 
    if(isset($_POST['update_tournament'])){     
        $_POST['club_id'] = $_SESSION['auth']['club_id'];
      $tournament_id = $obj->add_tournament($_POST,$_SESSION['auth']['club_id']);
      if(!empty($tournament_id)){
        $club_id = $_SESSION['auth']['club_id'];
        foreach($_POST['sponsors_data'] as $key=>$value){
            $sponsor_id = $obj->add_sponsor($value,$tournament_id,$club_id);
        }
       
        header('Location:manage_tournaments.php');
      }
    }
?>


<h2>Add Tournament</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="tournament">Tournament Name</label>
        <input type="text" name="tournament" required class="form-control">
    </div>
    <div class="form-group">
        <label for="banner">Trophy/Prize Photo</label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_description">Tournament description</label>
        <textarea name="tournament_description" id="tournament_description" cols="20" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_history">Tournament History</label>
        <textarea name="tournament_history" id="tournament_history" cols="20" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="tournament_type">Tournament Type</label><br>
        <label for="tournament_type"><input type="radio" name="tournament_type" value="L" checked> League</label>
        <label for="tournament_type"><input type="radio" name="tournament_type"  value="K"> Knockout</label>
        <label for="tournament_type"><input type="radio" name="tournament_type"  value="W"> Winner and Knockout System</label>
    </div>
    <div class="form-group">
        <label for="tournament_entry_fee">Tournament Entry fee</label>
        <input type="number" step="0.01" name="tournament_entry_fee" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_start_date">Tournament Start Date</label>
        <input type="datetime-local" name="tournament_start_date" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_start_date">Tournament Registration Start Date</label>
        <input type="datetime-local" name="reg_start_date" required class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_end_date">Tournament Registration End Date</label>
        <input type="datetime-local" name="reg_end_date" required class="form-control">
    </div>
    <div class="form-group">
        <label for="tournament_status">Status</label>
        <select name="tournament_status" id="tournament_status" class="form-control">
            <option value="A" checked="checked">Active</option>
            <option value="D">Disable</option>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="is_sponser" value="N">
        <label for="is_sponser">Do you have a sponsor?</label>
        <input id="is_sponser" type="checkbox" name="is_sponser" value="Y">
    </div>
    <div class="sponsors_div" Style="display:none;">
        <div class="form-group">
            <label for="options[1]"><b>Sponsor 1</b></label>
                <div class="form-group">
                <label for="options[1]">Sponsor Name</label>
                    <input type="text" class="form-control" name="sponsors_data[1][sponsor_name]" >
                </div>
                <div class="form-group">
                <label for="options[1]">Type of care: </label>
                    <label for="care_type"><input type="radio" name="sponsors_data[1][care_type]" value="A" checked> Care1</label>
                    <label for="care_type"><input type="radio" name="sponsors_data[1][care_type]"  value="B"> Care2</label>
                </div>
                <div class="form-group">
                <label for="options[1]">Degree of care: </label>
                    <label for="degree_type"><input type="radio" name="sponsors_data[1][degree_type]" value="A" checked> Degree1</label>
                    <label for="degree_type"><input type="radio" name="sponsors_data[1][degree_type]"  value="B"> Degree2</label>
                    <label for="degree_type"><input type="radio" name="sponsors_data[1][degree_type]"  value="C"> Degree3</label>
                </div>
                <div class="form-group">
                <label for="options[1]">About Our Sponsor</label>
                    <input type="text" class="form-control" name="sponsors_data[1][about_sponsor]">
                </div>
                <div class="form-group">
                <label for="options[1]">Care Value</label>
                    <input type="text" class="form-control" name="sponsors_data[1][care_value]">
                </div>
        </div>
        
        <div class="appending_div">

        </div><hr>
        <span id="add_more_sponsors"><b>Add More Sponsors +</b></span><br>

    </div>
    <div class="form-group">
        <input type="submit" value="Add Tournaments" name="update_tournament" class="btn btn-primary">
    </div>
</form>

<script>
    $('#is_sponser').change(function() {
        $('.sponsors_div input').attr("required", true);
        // $('.sponsors_div textarea').attr("required", true);
        $('.sponsors_div').show();
    });
    var i = 2;
    
    $('#add_more_sponsors').on('click', function() {
        var field = '<div class="sponsors_div"><div class="form-group"><label for="options['+i+']"><b>Sponsor '+i+'</b></label><div class="form-group"><label for="options['+i+']">Sponsor Name</label><input type="text" class="form-control" name="sponsors_data['+i+'][sponsor_name]" required></div><div class="form-group"><label for="options['+i+']">Type of care: </label><label for="care_type"><input type="radio" name="sponsors_data['+i+'][care_type]" value="A"> Care'+i+'</label><label for="care_type"><input type="radio" name="sponsors_data['+i+'][care_type]"  value="B"> Care2</label></div><div class="form-group"><label for="options['+i+']">Degree of care: </label><label for="degree_type"><input type="radio" name="sponsors_data['+i+'][degree_type]" value="A"> Degree1</label><label for="degree_type"><input type="radio" name="sponsors_data['+i+'][degree_type]"  value="B"> Degree2</label><label for="degree_type"><input type="radio" name="sponsors_data['+i+'][degree_type]"  value="C"> Degree3</label></div><div class="form-group"><label for="options['+i+']">About Our Sponsor</label><input type="text" class="form-control" name="sponsors_data['+i+'][about_sponsor]" ></div><div class="form-group"><label for="options['+i+']">Care Value</label><input type="text" class="form-control" name="sponsors_data['+i+'][care_value]" required></div></div><div class="appending_div"></div></div>';
        $('.appending_div').append(field);
        i = i+1;

    });

</script>