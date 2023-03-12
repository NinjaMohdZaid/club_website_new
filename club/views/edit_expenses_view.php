
<?php 
if(isset($_POST['update_expense'])){
    $up_msg = $obj->update_expense($_POST);
}
if(isset($_GET['action'])){
    if($_GET['action']=='edit'){
        $expense_id = $_GET['expense_id'];
        $expense_data = $obj->display_expenseByID($expense_id);
    }
}
    list($suppliers,) = $obj->display_suppliers($_SESSION['auth']['club_id'],$params = array(),$items_per_page = 0);
?>

<h2><?php echo $obj->__('update_expenses',$_SESSION['auth']['default_lang']); ?></h2>

<h6 class="text-success">
   <?php 
     if(isset($up_msg)){
         echo $obj->__('expenses_updated_successfully',$_SESSION['auth']['default_lang']);
     }
   ?>

</h6>

<div>
    <form action="" method="POST">
    <input type="hidden" name="expense_id" value="<?php echo $expense_data['expense_id']; ?>">
    <div class="form-group">
        <label for="name"><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="name" class="form-control" value="<?php echo $expense_data['name']; ?>">
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo $expense_data['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="supplier_id"><?php echo $obj->__('supplier',$_SESSION['auth']['default_lang']); ?></label>
        <select name="supplier_id" class="form-control">
            <?php foreach ($suppliers as $supplier) { ?>  
            <option value="<?php echo $supplier['supplier_id']; ?>" <?php if($expense_data['supplier_id'] == $supplier['supplier_id']) echo 'selected'; ?>><?php echo $supplier['name']; ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="date"><?php echo $obj->__('date',$_SESSION['auth']['default_lang']); ?></label>
        <input type="date" name="date" class="form-control" value="<?php echo date("Y-m-d", $expense_data['timestamp']) ?>">
    </div>
    <div class="form-group">
        <label for="amount"><?php echo $obj->__('amount',$_SESSION['auth']['default_lang']); ?></label>
        <input type="amount" name="amount" class="form-control" value="<?php echo $expense_data['amount']; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="<?php echo $obj->__('add_expenses',$_SESSION['auth']['default_lang']); ?>" name="update_expense" class="btn btn-primary" >
    </div>       
    </form>
</div>
