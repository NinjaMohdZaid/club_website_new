

<?php 
    $obj=new adminback();

   if(isset($_GET['status'])){
       $order_id = $_GET['order_id'];
       if(!empty($_GET['status'])){
           $obj->change_order_status($order_id,$_GET['status']);
       }
   }
   if(!empty($_GET['action']) && $_GET['action'] == 'delete'){
        $obj->delete_order($_GET['order_id']);
    }
   list($orders,) =  $obj->display_orders(['club_id'=>$_SESSION['auth']['club_id']]);
?>
<h2>Manage Product </h2> 
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Products</th>
            <th>Total Price</th>
            <th>User Data</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($orders as $order) { ?>
        <tr>
            <td> #<?php echo $order['order_id'] ?></td>
            <td> <?php 
                $products = unserialize($order['products_data']);
                foreach ($products as $key => $product) {
                    $product_data = $obj->display_productByID($product['product_id'],$_SESSION['default_lang']);
                    echo '<a href="edit_product.php?&product_id='.$product_data['product_id'].'">'.$product_data['product'].'</a> | Price : '.$product['price'].'<br>';
                }
            ?>
            
            </td>
            <td> <?php echo $order['price'] ?></td>
            <td> <?php 
                $user_data = unserialize($order['user_data']);
                echo 'Name : '.$user_data['name'].'<br>Phone : '.$user_data['phone'].'<br>Shipping Address : '.$order['shipping_address'];
            ?>
            
            </td>
            <td> 
                <?php 
                    if($order['status']=='C'){
                        echo "Canceled";
                        
                        ?>
                        <a href="?status=D&&order_id=<?php echo $order['order_id']?>"  class="btn btn-sm btn-primary" >Completed</a>
                    <?php
                    }else{
                        echo "Completed";
                       
                         ?>
                            <a href="?status=C&&order_id=<?php echo $order['order_id'] ?>" class="btn btn-sm btn-warning">Canceled</a>
                         <?php
                    }
                ?>
            </td>
            
            <td><a href="?action=delete&&order_id=<?php echo $order['order_id'] ?>">Delete</a>  </td>

        </tr>
        <?php }?>

        
    </tbody>
</table>


<script>




</script>