<?php 
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $job_id = $_GET['job_id'];
            $job_data = $obj->display_jobByID($job_id,$_SESSION['default_lang']);
        }
    }

    if(isset($_POST['update_job'])){
        $up_msg = $obj->update_job($_POST,$_SESSION['default_lang']);
    }
?>


<h2>Update Job</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>

<form action="" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="job_id" class="form-control" value="<?php echo $job_data['job_id'] ?>">
    <div class="form-group">
        <label for="job_position">Job Position</label>
        <input type="text" name="job_position" value="<?php echo $job_data['job_position'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="type">Type</label><br>
        <label for="type"><input type="radio" name="type" value="F" <?php if($job_data['type'] == 'F')echo 'checked'; ?>>Full Time</label>
        <label for="type"><input type="radio" name="type" value="P" <?php if($job_data['type'] == 'P')echo 'checked'; ?>>Part Time</label>
        <label for="type"><input type="radio" name="type" value="C" <?php if($job_data['type'] == 'C')echo 'checked'; ?>>Contract</label>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" cols="20" rows="5" class="form-control"><?php echo $job_data['description'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="skills">skills</label>
        <textarea name="skills" cols="20" rows="5" class="form-control"><?php echo $job_data['skills'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" name="salary" step="0.01" class="form-control"  value="<?php echo $job_data['salary'] ?>">
    </div>

    <div class="form-group">
        <label for="status">Satus</label>
        <select name="status" class="form-control">
            <option value="A" <?php if($job_data['status'] == 'A')echo 'selected'; ?>>Active</option>
            <option value="D" <?php if($job_data['status'] == 'D')echo 'selected'; ?>>Disabled</option>
        </select>
    </div>

    <div class="form-group">
        <input type="checkbox" name="show_company_name" value="Y" <?php if($job_data['show_company_name'] == 'Y')echo 'checked'; ?>>
        <label for="show_company_name">Show Company Name</label>
    </div>
    <input type="submit" value="Update Job" name="update_job" class="btn btn-primary" >




</form>