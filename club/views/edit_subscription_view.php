
<?php 
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $subscription_id = $_GET['subscription_id'];
            $subscription_data = $obj->display_subscriptionByID($subscription_id,$_SESSION['auth']['default_lang']);
        }
    }

    if(isset($_POST['update_subscription'])){
        $up_msg = $obj->update_subscription($_POST,$_SESSION['auth']['default_lang']);
    }
?>


<h2>Update Subscription</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="subscription">Subscription</label>
        <input type="text" name="subscription" required class="form-control" value="<?php echo $subscription_data['subscription'] ?>">
    </div>

    <div class="form-group">
        <label for="validity_months">Validity</label>
        <select name="validity_months" class="form-control">
            <option value="1" <?php if($subscription_data['validity_months'] == '1'){echo 'selected';} ?>>1 Month</option>
            <option value="2" <?php if($subscription_data['validity_months'] == '2'){echo 'selected';} ?>>2 Months</option>
            <option value="6" <?php if($subscription_data['validity_months'] == '6'){echo 'selected';} ?>>6 Months</option>
            <option value="12" <?php if($subscription_data['validity_months'] == '12'){echo 'selected';} ?>>1 Year</option>
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" required name="price" class="form-control" value="<?php echo $subscription_data['price'] ?>">
    </div>

   

    <div class="form-group">
        <label for="status">Satus</label>
        <select name="status" class="form-control">
            <option value="A" <?php if($subscription_data['status'] == 'A'){echo 'selected';} ?>>Active</option>
            <option value="D" <?php if($subscription_data['status'] == 'D'){echo 'selected';} ?>>Disabled</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"><?php echo $subscription_data['description'] ?></textarea>
    </div>

    <input type="hidden" name="subscription_id" value="<?php echo $subscription_data['subscription_id'] ?>" >

    <input type="submit" value="Update Subscription" name="update_subscription" class="btn btn-primary" >

</form>