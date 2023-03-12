<style>
    .mydiv{
        width: 200px;
        right: 38px;
        float:right;
        margin:10px;
    }
</style>
<?php 


if(isset($_GET['action'])){
    $get_id = $_GET['expense_id'];
    if($_GET['action']=="delete"){
        $obj->delete_expense($get_id);
    }
}
list($expenses,$search) = $obj->display_expenses($_SESSION['auth']['club_id'],$_REQUEST);
?>

<?php if(!empty($expenses)) { ?>
<div>
    <h2><?php echo $obj->__('manage_expenses',$_SESSION['auth']['default_lang']); ?></h2>
    <div class="mydiv">
<form action="" class="form">
    <select name="filterDate" id="filterDate" class="form-control" onchange="window.location.href=this.value">
        <option value="<?php echo '?filter_by=A'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='A')) echo 'selected'  ?>><?php echo $obj->__('all',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=T'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='T')) echo 'selected'  ?>><?php echo $obj->__('today',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=W'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='W')) echo 'selected'  ?>><?php echo $obj->__('this_weak',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=M'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='M')) echo 'selected'  ?>><?php echo $obj->__('this_month',$_SESSION['auth']['default_lang']); ?></option>
        <option value="<?php echo '?filter_by=Y'?>" <?php if(!empty($_REQUEST['filter_by'] && $_REQUEST['filter_by']=='Y')) echo 'selected'  ?>><?php echo $obj->__('this_year',$_SESSION['auth']['default_lang']); ?></option>
    </select>
</form>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('supplier',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('amount',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($expenses as $key => $expense) { ?>
        <tr>
            <td><?php echo $expense['expense_id']; ?></td>
            <td><?php echo $expense['name']; ?></td>
            <td><?php echo $expense['description']; ?></td>
            <td><?php echo $expense['supplier_name'] ?></td>
            <td><?php echo $expense['amount'] ?></td>
            <td>
                <a href="edit_expenses.php?action=edit&expense_id=<?php echo $expense['expense_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                <a href="?action=delete&expense_id=<?php echo $expense['expense_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
            </td>
           
        </tr>
        <?php 
            }
        ?>
       
    </tbody>
</table>
</div>
<?php  }else{ ?>
<div>
<?php echo $obj->__('no_data_found',$_SESSION['auth']['default_lang']); ?>
</div>
<?php  } ?>
