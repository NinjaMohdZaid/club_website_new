
  
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
    $get_id = $_GET['supplier_id'];
    if($_GET['action']=="delete"){
        $obj->delete_supplier($get_id);
    }
}
list($suppliers,$search) = $obj->display_suppliers($_SESSION['auth']['club_id'],$_REQUEST);
?>

<?php if(!empty($suppliers)) { ?>
<div>
    <h2><?php echo $obj->__('manage_suppliers',$_SESSION['auth']['default_lang']); ?></h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('address',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('product_or_services',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($suppliers as $key => $supplier) { ?>
        <tr>
            <td><?php echo $supplier['supplier_id']; ?></td>
            <td><?php echo $supplier['name']; ?></td>
            <td><?php echo $supplier['address']; ?></td>
            <td><?php echo $supplier['product_or_services'] ?></td>
            <td>
                <a href="edit_supplier.php?action=edit&supplier_id=<?php echo $supplier['supplier_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                <a href="?action=delete&supplier_id=<?php echo $supplier['supplier_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
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
