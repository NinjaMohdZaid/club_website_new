
<?php 
    if(isset($_POST['cuopon_add'])){
       $_POST['club_id'] = $_SESSION['auth']['club_id'];
       $coupon_msg =  $obj->add_coupon($_POST);
    }
?>

<h2><?php echo $obj->__('add_offer',$_SESSION['auth']['default_lang']); ?></h2>

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
        <label for="cuopon_code"><?php echo $obj->__('offer_code',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="cuopon_code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="cuopon_description" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_discount"><?php echo $obj->__('offer_discount',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="cuopon_discount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_discount"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="price" class="form-control" >
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option disabled>--<?php echo $obj->__('select',$_SESSION['auth']['default_lang']); ?>--</option>
            <option value="A"><?php echo $obj->__('active',$_SESSION['auth']['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['auth']['default_lang']); ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="expiry_date"><?php echo $obj->__('offer_expiry_date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" required name="expiry_date" class="form-control">
    </div>

    <div class="form-group">
       
        <input type="submit" name="cuopon_add" class="btn btn-primary" >
    </div>       
    </form>
</div>
