<?php 
   

    if(isset($_POST['update_sponsor'])){
        
        $up_msg = $obj->update_sponsor($_POST,$_SESSION['default_lang']);
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $get_id = $_GET['sponsor_id'];
            $sponsor = $obj->display_sponsorByID($get_id,$_SESSION['default_lang']);
        }
    }
?>


<h2>Update Sponsor</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="sponsor_id" class="form-control" value="<?php echo $sponsor['sponsor_id'] ?>">
<div class="form-group">
                <div class="form-group">
                <label for="options[1]">Sponsor Name</label>
                    <input type="text" class="form-control" name="sponsor_name" value="<?php echo $sponsor['sponsor_name'] ?>" required>
                </div>
                <div class="form-group">
                <label for="options[1]">Type of care: </label>
                    <label for="care_type"><input type="radio" name="care_type" value="A" <?php if($sponsor['sponsor_type'] == 'A')echo 'checked'; ?>> Care1</label>
                    <label for="care_type"><input type="radio" name="care_type"  value="B" <?php if($sponsor['sponsor_type'] == 'B')echo 'checked'; ?>> Care2</label>
                </div>
                <div class="form-group">
                <label for="options[1]">Degree of care: </label>
                    <label for="degree_type"><input type="radio" name="degree_type" <?php if($sponsor['degree_of_care'] == 'A')echo 'checked'; ?> value="A"> Degree1</label>
                    <label for="degree_type"><input type="radio" name="degree_type" <?php if($sponsor['degree_of_care'] == 'B')echo 'checked'; ?>  value="B"> Degree2</label>
                    <label for="degree_type"><input type="radio" name="degree_type" <?php if($sponsor['degree_of_care'] == 'C')echo 'checked'; ?>  value="C"> Degree3</label>
                </div>
                <div class="form-group">
                <label for="options[1]">About Our Sponsor</label>
                    <input type="text" class="form-control" name="about_sponsor" value="<?php echo $sponsor['sponsor_about'] ?>" >
                </div>
                <div class="form-group">
                <label for="options[1]">Care Value</label>
                    <input type="text" class="form-control" name="care_value" value="<?php echo $sponsor['care_value'] ?>" required>
                </div>
        </div>
    </div>
    
    <input type="submit" value="Update Sponsor" name="update_sponsor" class="btn btn-primary">
</form>