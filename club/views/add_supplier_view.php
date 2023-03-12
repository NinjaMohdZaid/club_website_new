
<?php 
    if(isset($_POST['add_supplier'])){
       $_POST['club_id'] = $_SESSION['auth']['club_id'];
       $rtn_id =  $obj->add_supplier($_POST);
    }
?>

<h2><?php echo $obj->__('add_supplier',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="text-success">
   <?php 
     if(isset($rtn_id)){
         echo $obj->__('supplier_added_successfully',$_SESSION['auth']['default_lang']);
     }
   ?>

</h6>

<div>
    <form action="" method="POST">
      
    <div class="form-group">
        <label for="name"><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="name" class="form-control" >
    </div>

    <div class="form-group">
        <label for="address"><?php echo $obj->__('address',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="address" class="form-control" >
    </div>

    <div class="form-group">
        <label for="product_or_services"><?php echo $obj->__('product_or_services',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="product_or_services" class="form-control" >
    </div>
    <div class="form-group">
        <input type="submit" value="<?php echo $obj->__('add_supplier',$_SESSION['auth']['default_lang']); ?>" name="add_supplier" class="btn btn-primary" >
    </div>       
    </form>
</div>
