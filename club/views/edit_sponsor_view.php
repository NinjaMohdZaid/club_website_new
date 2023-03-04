<?php 
   

    if(isset($_POST['update_sponsor'])){
        
        $up_msg = $obj->update_sponsor($_POST,$_SESSION['auth']['default_lang']);
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $get_id = $_GET['sponsor_id'];
            $sponsor = $obj->display_sponsorByID($get_id,$_SESSION['auth']['default_lang']);
        }
    }
?>


<h2><?php echo $obj->__('update_sponsor',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="sponsor_id" class="form-control" value="<?php echo $sponsor['sponsor_id'] ?>">
<input type="hidden" name="tournament_id" class="form-control" value="<?php echo $sponsor['tournament_id'] ?>">
<div class="form-group">
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="text" class="form-control" name="sponsor_name" value="<?php echo $sponsor['sponsor_name'] ?>" required>
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('type_of_care',$_SESSION['auth']['default_lang']); ?>: </label>
                    <label for="care_type"><input type="radio" name="care_type" value="A" <?php if($sponsor['sponsor_type'] == 'A')echo 'checked'; ?>> <?php echo $obj->__('care',$_SESSION['auth']['default_lang']); ?> 1</label>
                    <label for="care_type"><input type="radio" name="care_type"  value="B" <?php if($sponsor['sponsor_type'] == 'B')echo 'checked'; ?>> <?php echo $obj->__('care',$_SESSION['auth']['default_lang']); ?> 2</label>
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('degree_of_care',$_SESSION['auth']['default_lang']); ?>: </label>
                    <label for="degree_type"><input type="radio" name="degree_type" <?php if($sponsor['degree_of_care'] == 'A')echo 'checked'; ?> value="A"><?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?> 1</label>
                    <label for="degree_type"><input type="radio" name="degree_type" <?php if($sponsor['degree_of_care'] == 'B')echo 'checked'; ?>  value="B"><?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?> 2</label>
                    <label for="degree_type"><input type="radio" name="degree_type" <?php if($sponsor['degree_of_care'] == 'C')echo 'checked'; ?>  value="C"><?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?> 3</label>
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('about_sponsors',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="text" class="form-control" name="about_sponsor" value="<?php echo $sponsor['sponsor_about'] ?>" >
                </div>
                <div class="form-group">
                <label for="options[1]"><?php echo $obj->__('care_value',$_SESSION['auth']['default_lang']); ?></label>
                    <input type="text" class="form-control" name="care_value" value="<?php echo $sponsor['care_value'] ?>" required>
                </div>
        </div>
    </div>
    
    <input type="submit" value="<?php echo $obj->__('update_sponsor',$_SESSION['auth']['default_lang']); ?>" name="update_sponsor" class="btn btn-primary">
</form>