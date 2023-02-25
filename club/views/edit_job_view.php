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


<h2><?php echo $obj->__('update_job',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>

<form action="" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="job_id" class="form-control" value="<?php echo $job_data['job_id'] ?>">
    <div class="form-group">
        <label for="job_position"><?php echo $obj->__('job_position',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="job_position" value="<?php echo $job_data['job_position'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="type"><?php echo $obj->__('type',$_SESSION['auth']['default_lang']); ?></label><br>
        <label for="type"><input type="radio" name="type" value="F" <?php if($job_data['type'] == 'F')echo 'checked'; ?>><?php echo $obj->__('full_time',$_SESSION['auth']['default_lang']); ?></label>
        <label for="type"><input type="radio" name="type" value="P" <?php if($job_data['type'] == 'P')echo 'checked'; ?>><?php echo $obj->__('part_time',$_SESSION['auth']['default_lang']); ?></label>
        <label for="type"><input type="radio" name="type" value="C" <?php if($job_data['type'] == 'C')echo 'checked'; ?>><?php echo $obj->__('contract',$_SESSION['auth']['default_lang']); ?></label>
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="description" cols="20" rows="5" class="form-control"><?php echo $job_data['description'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="skills"><?php echo $obj->__('skills',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="skills" cols="20" rows="5" class="form-control"><?php echo $job_data['skills'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="salary"><?php echo $obj->__('salary',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="salary" step="0.01" class="form-control"  value="<?php echo $job_data['salary'] ?>">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A" <?php if($job_data['status'] == 'A')echo 'selected'; ?>><?php echo $obj->__('active',$_SESSION['auth']['default_lang']); ?></option>
            <option value="D" <?php if($job_data['status'] == 'D')echo 'selected'; ?>><?php echo $obj->__('disabled',$_SESSION['auth']['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group">
        <input type="checkbox" name="show_company_name" value="Y" <?php if($job_data['show_company_name'] == 'Y')echo 'checked'; ?>>
        <label for="show_company_name"><?php echo $obj->__('show_company_name',$_SESSION['auth']['default_lang']); ?></label>
    </div>
    <input type="submit" value="<?php echo $obj->__('update_job',$_SESSION['auth']['default_lang']); ?>" name="update_job" class="btn btn-primary" >
</form>