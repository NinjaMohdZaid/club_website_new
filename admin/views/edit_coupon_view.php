
<?php 
    if(isset($_POST['cuopon_update'])){
       $coupon_msg =  $obj->update_coupon($_REQUEST['coupon_id'],$_POST);
    }
    $coupon_data = $obj->display_couponByID($_REQUEST['coupon_id']);
?>

<h2>Add Offer</h2>

<h4>
    <?php 
        if(isset($coupon_msg)){
            echo $coupon_msg;
        }
    ?>
</h4>

<div>
    <form action="" method="POST">
    <div class="form-group">
        <label for="cupon_code"><?php echo $obj->__('offer_code',$_SESSION['default_lang']); ?></label>
        <input type="text" name="cupon_code" class="form-control" value="<?php echo $coupon_data['cupon_code']; ?>">
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <input type="text" name="description" class="form-control" value="<?php echo $coupon_data['description']; ?>">
    </div>

    <div class="form-group">
        <label for="influencer_name"><?php echo $obj->__('influencer_name',$_SESSION['default_lang']); ?></label>
        <input type="text" name="influencer_name" class="form-control" value="<?php echo $coupon_data['influencer_name']; ?>">
    </div>

    <div class="form-group">
        <label for="influencer_amount"><?php echo $obj->__('influencer_amount',$_SESSION['default_lang']); ?></label>
        <input type="number" name="influencer_amount" class="form-control" value="<?php echo $coupon_data['influencer_amount']; ?>">
    </div>

    <div class="form-group">
        <label for="discount"><?php echo $obj->__('offer_discount',$_SESSION['default_lang']); ?></label>
        <input type="number" name="discount" class="form-control" value="<?php echo $coupon_data['discount']; ?>">
    </div>

    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['default_lang']); ?></label>
        <input type="number" name="price" class="form-control" value="<?php echo $coupon_data['price']; ?>">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option disabled>--<?php echo $obj->__('select',$_SESSION['default_lang']); ?>--</option>
            <option value="A" <?php if($coupon_data['status'] == 'A') echo 'selected'; ?>><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D" <?php if($coupon_data['status'] == 'D') echo 'selected'; ?>><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="expiry_date"><?php echo $obj->__('expiry_date',$_SESSION['default_lang']); ?></label>
        <input type="datetime-local" required name="expiry_date" class="form-control" value="<?php echo date("Y-m-d\TH:i:s", $coupon_data['expiry_date']); ?>">
    </div>

    <div class="form-group">
        <input type="submit" name="cuopon_update" class="btn btn-primary" >
    </div>
    </form>
</div>
