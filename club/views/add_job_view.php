<?php 

    if(isset($_POST['add_job'])){
      $_POST['club_id'] = $_SESSION['auth']['club_id'];
      $rtnMsg =   $obj->add_job($_POST);
    }
?>


<h2>Add Job</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="job_position">Job Position</label>
        <input type="text" name="job_position" class="form-control">
    </div>

    <div class="form-group">
        <label for="type">Type</label><br>
        <label for="type"><input type="radio" name="type" value="F" checked>Full Time</label>
        <label for="type"><input type="radio" name="type" value="P">Part Time</label>
        <label for="type"><input type="radio" name="type" value="C">Contract</label>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" cols="20" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="skills">skills</label>
        <textarea name="skills" cols="20" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" name="salary" step="0.01" class="form-control">
    </div>

    <div class="form-group">
        <label for="status">Satus</label>
        <select name="status" class="form-control">
            <option value="A">Active</option>
            <option value="D">Disabled</option>
        </select>
    </div>

    <div class="form-group">
        <input type="checkbox" name="show_company_name" value="Y">
        <label for="show_company_name">Show Company Name</label>
    </div>

    <input type="submit" value="Add Job" name="add_job" class="btn btn-primary" >

</form>