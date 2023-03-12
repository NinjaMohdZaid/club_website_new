
<?php 
    if(isset($_POST['update_supplier'])){
        $up_msg = $obj->update_supplier($_POST);
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $supplier_id = $_GET['supplier_id'];
            $supplier_data = $obj->display_supplierByID($supplier_id);
        }
    }
?>

<h2><?php echo $obj->__('update_supplier',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="text-success">
   <?php 
     if(isset($up_msg)){
         echo $obj->__('supplier_updated_successfully',$_SESSION['auth']['default_lang']);
     }
   ?>

</h6>

<div>
    <form action="" method="POST">
      <input type="hidden" name="supplier_id" value="<?php echo $supplier_data['supplier_id']; ?>">
    <div class="form-group">
        <label for="name"><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="name" class="form-control" value="<?php echo $supplier_data['name']; ?>">
    </div>

    <div class="form-group">
        <label for="address"><?php echo $obj->__('address',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="address" class="form-control" value="<?php echo $supplier_data['address']; ?>">
    </div>

    <div class="form-group">
        <label for="product_or_services"><?php echo $obj->__('product_or_services',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="product_or_services" class="form-control" value="<?php echo $supplier_data['product_or_services']; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="<?php echo $obj->__('update_supplier',$_SESSION['auth']['default_lang']); ?>" name="update_supplier" class="btn btn-primary" >
    </div>       
    </form>
</div>
