
  
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
    $get_id = $_GET['sale_id'];
    if($_GET['action']=="delete"){
        $obj->delete_sales($get_id);
    }
}
list($sales,$search) = $obj->display_sales($_SESSION['auth']['club_id'],$_REQUEST);
?>

<?php if(!empty($sales)) { ?>
<div>
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
            <th><?php echo $obj->__('sales_type',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('date',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($sales as $key => $sale) { ?>
        <tr>
            <td><?php echo $sale['sale_id']; ?></td>
            <td><?php if($sale['object_type'] == 'O') echo $obj->__('order',$_SESSION['auth']['default_lang']);
                elseif($sale['object_type'] == 'B')
                echo $obj->__('booking',$_SESSION['auth']['default_lang']);
            ?></td>
            <td><?php echo date( "m/d/Y:M h:i:s", $sale['timestamp']); ?></td>
            <td><?php echo $sale['total_price'] ?></td>
            <td>
                <a href="?action=delete&sale_id=<?php echo $sale['sale_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
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
