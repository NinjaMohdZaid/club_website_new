
<?php 
    if(isset($_POST['cuopon_add'])){
       $coupon_msg =  $obj->add_coupon($_POST);
       
    }
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
        <label for="cuopon_code"><?php echo $obj->__('offer_code',$_SESSION['default_lang']); ?></label>
        <input type="text" name="cuopon_code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <input type="text" name="cuopon_description" class="form-control" >
    </div>

    <div class="form-group">
        <label for="influencer_name"><?php echo $obj->__('influencer_name',$_SESSION['default_lang']); ?></label>
        <input type="text" name="influencer_name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="influencer_amount"><?php echo $obj->__('influencer_amount',$_SESSION['default_lang']); ?></label>
        <input type="number" name="influencer_amount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_discount"><?php echo $obj->__('offer_discount',$_SESSION['default_lang']); ?></label>
        <input type="number" name="cuopon_discount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_discount"><?php echo $obj->__('price',$_SESSION['default_lang']); ?></label>
        <input type="number" name="price" class="form-control" >
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option disabled>--<?php echo $obj->__('select',$_SESSION['default_lang']); ?>--</option>
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="expiry_date"><?php echo $obj->__('expiry_date',$_SESSION['default_lang']); ?></label>
        <input type="datetime-local" required name="expiry_date" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" name="cuopon_add" class="btn btn-primary" >
    </div>
    </form>
</div>
