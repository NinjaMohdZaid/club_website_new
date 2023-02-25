
<?php 
    if(isset($_POST['cuopon_add'])){
       $_POST['club_id'] = $_SESSION['auth']['club_id'];
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
        <label for="cuopon_code">Offer Code</label>
        <input type="text" name="cuopon_code" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_description">Offer Description</label>
        <input type="text" name="cuopon_description" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_discount">Offer Discount</label>
        <input type="number" name="cuopon_discount" class="form-control" >
    </div>

    <div class="form-group">
        <label for="cuopon_discount">Price</label>
        <input type="number" name="price" class="form-control" >
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option disabled>--Select--</option>
            <option value="A">Active</option>
            <option value="D">Deactive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="expiry_date">Licence Expiry Date</label>
        <input type="datetime-local" required name="expiry_date" class="form-control">
    </div>

    <div class="form-group">
       
        <input type="submit" name="cuopon_add" class="btn btn-primary" >
    </div>




       
    </form>
</div>
