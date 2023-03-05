
<?php 
    if(isset($_POST['update_subscription'])){
        $up_msg = $obj->update_subscription($_POST,$_SESSION['default_lang']);
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $subscription_id = $_GET['subscription_id'];
            $subscription_data = $obj->display_subscriptionByID($subscription_id,$_SESSION['default_lang']);
        }
    }
?>


<h2><?php echo $obj->__('update_subscription',$_SESSION['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="subscription"><?php echo $obj->__('subscription',$_SESSION['default_lang']); ?></label>
        <input type="text" name="subscription" required class="form-control" value="<?php echo $subscription_data['subscription'] ?>">
    </div>

    <div class="form-group">
        <label for="validity_months"><?php echo $obj->__('validity',$_SESSION['default_lang']); ?></label>
        <select name="validity_months" class="form-control">
            <option value="1" <?php if($subscription_data['validity_months'] == '1'){echo 'selected';} ?>>1 <?php echo $obj->__('month',$_SESSION['default_lang']); ?></option>
            <option value="2" <?php if($subscription_data['validity_months'] == '2'){echo 'selected';} ?>>2 <?php echo $obj->__('months',$_SESSION['default_lang']); ?></option>
            <option value="6" <?php if($subscription_data['validity_months'] == '6'){echo 'selected';} ?>>6 <?php echo $obj->__('months',$_SESSION['default_lang']); ?></option>
            <option value="12" <?php if($subscription_data['validity_months'] == '12'){echo 'selected';} ?>>1 <?php echo $obj->__('year',$_SESSION['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['default_lang']); ?></label>
        <input type="text" required name="price" class="form-control" value="<?php echo $subscription_data['price'] ?>">
    </div>

   

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A" <?php if($subscription_data['status'] == 'A'){echo 'selected';} ?>><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D" <?php if($subscription_data['status'] == 'D'){echo 'selected';} ?>><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <textarea name="description" class="form-control"><?php echo $subscription_data['description'] ?></textarea>
    </div>

    <input type="hidden" name="subscription_id" value="<?php echo $subscription_data['subscription_id'] ?>" >

    <input type="submit" value="<?php echo $obj->__('update_subscription',$_SESSION['default_lang']); ?>" name="update_subscription" class="btn btn-primary" >

</form>