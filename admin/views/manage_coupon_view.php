<?php 
    if(isset($_GET['status'])){
        $coupon_id = $_GET['coupon_id'];
        if($_GET['status']=='change_status'){
            $obj->change_catagory_status($coupon_id,$_GET['status_to']);
        }elseif($_GET['status']=="delete"){
            $obj->delete_coupon($coupon_id);
        }
        header('Location:manage_coupon.php');
    }
    $show_coupon = $obj->show_coupon();
?>

<h2><?php echo $obj->__('manage_special_offer',$_SESSION['default_lang']); ?></h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('special_offer_code',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('description',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('special_offer_discount',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
            <?php 
               while($result = mysqli_fetch_assoc($show_coupon) ){
            ?>
        <tr>
            <td> <?php echo $result['cupon_id'] ?></td>
            <td> <?php echo $result['cupon_code'] ?></td>
            <td> <?php echo $result['description'] ?></td>
            <td> <?php echo $result['discount'] ?></td>
            <td><a href="edit_coupon.php?coupon_id=<?php echo $result['cupon_id']; ?>"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>  <a href="?status=delete&&coupon_id=<?php echo $result['cupon_id']; ?>"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>  </td>
        </tr>

        <?php }?>
    </tbody>
</table>