<?php 

    if(isset($_POST['add_subscription'])){
      $rtnMsg =   $obj->add_subscription($_POST);
    }
?>


<h2>Add Subscription</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="subscription">subscription</label>
        <input type="text" name="subscription" required class="form-control">
    </div>

    <div class="form-group">
        <label for="validity_months">Validity</label>
        <select name="validity_months" class="form-control">
            <option value="1">1 Month</option>
            <option value="2">2 Months</option>
            <option value="6">6 Months</option>
            <option value="12">1 Year</option>
        </select>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" required name="price" class="form-control">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="A">Active</option>
            <option value="D">Disabled</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <input type="submit" value="Add Subscription" name="add_subscription" class="btn btn-primary" >

</form>