<?php 
    $show_coupon = $obj->show_coupon(['club_id' => $_SESSION['auth']['club_id']]);
 
    
?>

<h2><?php echo $obj->__('manage_special_offers',$_SESSION['auth']['default_lang']); ?></h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('special_offer_code',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('special_offer_discount',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
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
            <td><a href=""><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>  <a href=""><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>  </td>
           
        </tr>

        <?php }?>
    </tbody>
</table>