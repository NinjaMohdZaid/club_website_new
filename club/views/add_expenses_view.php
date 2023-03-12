
<?php 
    if(isset($_POST['add_expenses'])){
       $_POST['club_id'] = $_SESSION['auth']['club_id'];
       $rtn_id =  $obj->add_expenses($_POST);
    }
    list($suppliers,) = $obj->display_suppliers($_SESSION['auth']['club_id'],$params = array(),$items_per_page = 0);
?>

<h2><?php echo $obj->__('add_expenses',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="text-success">
   <?php 
     if(isset($rtn_id)){
         echo $obj->__('expenses_added_successfully',$_SESSION['auth']['default_lang']);
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
        <label for="description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="supplier_id"><?php echo $obj->__('supplier',$_SESSION['auth']['default_lang']); ?></label>
        <select name="supplier_id" class="form-control">
            <?php foreach ($suppliers as $supplier) { ?>  
            <option value="<?php echo $supplier['supplier_id']; ?>"><?php echo $supplier['name']; ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="date"><?php echo $obj->__('date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="date" name="date" class="form-control" >
    </div>
    <div class="form-group">
        <label for="amount"><?php echo $obj->__('amount',$_SESSION['auth']['default_lang']); ?></label>
        <input type="amount" name="amount" class="form-control" >
    </div>
    <div class="form-group">
        <input type="submit" value="<?php echo $obj->__('add_expenses',$_SESSION['auth']['default_lang']); ?>" name="add_expenses" class="btn btn-primary" >
    </div>       
    </form>
</div>
