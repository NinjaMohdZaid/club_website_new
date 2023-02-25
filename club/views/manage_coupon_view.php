<?php 
    $show_coupon = $obj->show_coupon(['club_id' => $_SESSION['auth']['club_id']]);
 
    
?>

<h2>Manage Special Offer</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Special Offer Id</th>
            <th>Special Offer Code</th>
            <th>Special Offer Description</th>
            <th>Special Offer Discount</th>
            <th>Action</th>
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
            <td><a href="">Edit</a>  <a href="">Delete</a>  </td>
           
        </tr>

        <?php }?>
    </tbody>
</table>