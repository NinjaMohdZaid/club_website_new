
<?php 
    $_product_params = ['status'=>'A','club_id'=>$_SESSION['auth']['club_id']];
    list($products,) = $obj->display_products($_product_params,0,$_SESSION['auth']['default_lang']);
    if(isset($_POST['create_order'])){
        $_POST['club_id'] = $_SESSION['auth']['club_id'];
        $rtn = $obj->create_order($_POST);
        if(!empty($rtn)){
            $rtn_msg = $obj->__('sales_added_successfully',$_SESSION['auth']['default_lang']);
        }else{
            $rtn_msg = $obj->__('sales_not_added_successfully',$_SESSION['auth']['default_lang']);
        }
    }
?>

<h2><?php echo $obj->__('add_sales',$_SESSION['auth']['default_lang']); ?></h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div>
        <div class="col-sm-12">
            <div class="card-box">
                <div class="appending_div">
                    <div class="form-group">
                        <hr>
                        <h5 class=" header-title"><?php echo $obj->__('products',$_SESSION['auth']['default_lang']); ?></h5>
                        <label for="products[1][product_id]"><?php echo $obj->__('product',$_SESSION['auth']['default_lang']); ?> 1
                            <select name="products[1][product_id]" id="product_ids" class="form-control">
                                <?php foreach ($products as $product) { ?>  
                                <option value="<?php echo $product['product_id']; ?>"><?php echo $product['product']; ?>
                                <?php } ?>
                            </select>
                        </label>    
                        <label for="products[1][amount]"><?php echo $obj->__('amount',$_SESSION['auth']['default_lang']); ?><input type="number" name="amount" class="form-control" required></label>
                    </div>
                </div>
                <span id="add_more"><?php echo $obj->__('add_more',$_SESSION['auth']['default_lang']); ?> +</span>
                <hr>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="user_data[name]"><?php echo $obj->__('customer_name',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="user_data[name]" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="user_data[phone]"><?php echo $obj->__('customer_phone',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="user_data[phone]" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="shipping_address"><?php echo $obj->__('shipping_address',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="shipping_address" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></label>
        <select name="status" class="form-control" required>
            <option value="C"><?php echo $obj->__('canceled',$_SESSION['auth']['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('completed',$_SESSION['auth']['default_lang']); ?></option>
        </select>
    </div>



    <input type="submit" value="<?php echo $obj->__('create_order',$_SESSION['auth']['default_lang']); ?>" name="create_order" class="btn btn-block btn-primary">
</form>
<script>
    
    var i = 2;
    $('#add_more').on('click', function() {
        var options = $("#product_ids > option").clone();
        var field = '<div><label for="products['+i+'][product_id]">Product '+i+'<select name="products['+i+'][product_id]" id="product_ids'+i+'" class="form-control"></select></label>&nbsp<label for="products['+i+'][amount]">Amount<input type="number" name="amount" class="form-control" required></label></div>';
        $('.appending_div').append(field);
        $('#product_ids'+i).append(options);
        i = i+1;
    });
</script>
<style>
    #add_more{
        color:gray;
    }
    #add_more:hover{
        color:black;
        cursor: pointer;
    }
</style>