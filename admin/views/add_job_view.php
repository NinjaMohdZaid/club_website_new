<?php 

    if(isset($_POST['add_job'])){
      $rtnMsg =   $obj->add_job($_POST);
    }
?>


<h2>Add Job</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="job_position"><?php echo $obj->__('job_position',$_SESSION['default_lang']); ?></label>
        <input type="text" name="job_position" class="form-control">
    </div>

    <div class="form-group">
        <label for="type"><?php echo $obj->__('type',$_SESSION['default_lang']); ?></label><br>
        <label for="type"><input type="radio" name="type" value="F" checked><?php echo $obj->__('full_time',$_SESSION['default_lang']); ?></label>
        <label for="type"><input type="radio" name="type" value="P"><?php echo $obj->__('part_time',$_SESSION['default_lang']); ?></label>
        <label for="type"><input type="radio" name="type" value="C"><?php echo $obj->__('contract',$_SESSION['default_lang']); ?></label>
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <textarea name="description" cols="20" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="skills"><?php echo $obj->__('skills',$_SESSION['default_lang']); ?></label>
        <textarea name="skills" cols="20" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="salary"><?php echo $obj->__('salary',$_SESSION['default_lang']); ?></label>
        <input type="number" name="salary" step="0.01" class="form-control">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group">
        <input type="checkbox" name="show_company_name" value="Y">
        <label for="show_company_name"><?php echo $obj->__('show_company_name',$_SESSION['default_lang']); ?></label>
    </div>

    <input type="submit" value="<?php echo $obj->__('add_job',$_SESSION['default_lang']); ?>" name="add_job" class="btn btn-primary" >

</form>