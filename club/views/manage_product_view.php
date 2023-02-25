

<?php 
    $obj=new adminback();

   if(isset($_GET['status'])){
       $product_id = $_GET['product_id'];
       if(!empty($_GET['status'])){
           $obj->change_product_status($product_id,$_GET['status']);
       }
       if(!empty($_GET['status'])){
        $obj->change_product_status($product_id,$_GET['status']);
        }
   }
   if(!empty($_GET['action']) && $_GET['action'] == 'delete'){
        $obj->delete_product($_GET['product_id']);
    }
   list($products,) =  $obj->display_products(['club_id'=>$_SESSION['auth']['club_id']],0,$_SESSION['default_lang']);
?>
<h2>Manage Product </h2> 
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Price</th>
            <th>Product Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach($products as $pdt) { ?>
        <tr>
            <td> #<?php echo $pdt['product_id'] ?></td>
            <td> <?php echo $pdt['product'] ?></td>
            <td> <?php echo $pdt['price'] ?></td>
          
            <td>  <img style="height:60px" src="../assets/files/products/images/<?php echo $pdt['product_id'].'/'.$pdt['image']; ?>" alt=""> </td>
            <td> 
                <?php 
                    if($pdt['status']=='D'){
                        echo "Disabled";
                        
                        ?>
                        <a href="?status=A&&product_id=<?php echo $pdt['product_id']?>"  class="btn btn-sm btn-primary" >Active</a>
                    <?php
                    }else{
                        echo "Active";
                       
                         ?>
                            <a href="?status=D&&product_id=<?php echo $pdt['product_id'] ?>" class="btn btn-sm btn-warning">Disabled</a>
                         <?php
                    }
                ?>
            </td>
            <td>   <a href="edit_product.php?&product_id=<?php echo $pdt['product_id'] ?>">Edit</a> <br>
             <a href="?action=delete&&product_id=<?php echo $pdt['product_id'] ?>">Delete</a>  </td>

        </tr>
        <?php }?>

        
    </tbody>
</table>


<script>




</script>