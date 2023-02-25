

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
<h2><?php echo $obj->__('manage_orders',$_SESSION['auth']['default_lang']); ?></h2> 
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('products',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('total_price',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('user_data',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($orders as $order) { ?>
        <tr>
            <td> #<?php echo $order['order_id'] ?></td>
            <td> <?php 
                $products = unserialize($order['products_data']);
                foreach ($products as $key => $product) {
                    $product_data = $obj->display_productByID($product['product_id'],$_SESSION['auth']['default_lang']);
                    echo '<a href="edit_product.php?&product_id='.$product_data['product_id'].'">'.$product_data['product'].'</a> | '.$obj->__('price',$_SESSION['auth']['default_lang']).': '.$product['price'].'<br>';
                }
            ?>
            
            </td>
            <td> <?php echo $order['price'] ?></td>
            <td> <?php 
               $user_data = unserialize($order['user_data']);
               echo $obj->__('name',$_SESSION['auth']['default_lang']).' : '.$user_data['name'].'<br>'.$obj->__('phone',$_SESSION['auth']['default_lang']).' : '.$user_data['phone'].'<br>'.$obj->__('shipping',$_SESSION['auth']['default_lang']).' : '.$order['shipping_address'];
           ?>
            
            </td>
            <td> 
                <?php 
                    if($order['status']=='C'){
                        echo $obj->__('canceled',$_SESSION['auth']['default_lang']);
                        
                        ?>
                        <a href="?status=D&&order_id=<?php echo $order['order_id']?>"  class="btn btn-sm btn-primary" ><?php echo $obj->__('completed',$_SESSION['auth']['default_lang']); ?></a>
                    <?php
                    }else{
                        echo $obj->__('completed',$_SESSION['auth']['default_lang']);
                       
                         ?>
                            <a href="?status=C&&order_id=<?php echo $order['order_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('canceled',$_SESSION['auth']['default_lang']); ?></a>
                         <?php
                    }
                ?>
            </td>
            
            <td><a href="?action=delete&&order_id=<?php echo $order['order_id'] ?>"><?php echo $obj->__('deleted',$_SESSION['auth']['default_lang']); ?></a>  </td>

        </tr>
        <?php }?>

        
    </tbody>
</table>


<script>




</script>