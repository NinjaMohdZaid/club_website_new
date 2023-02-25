

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
<h2><?php echo $obj->__('manage_products',$_SESSION['auth']['default_lang']); ?></h2> 
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('product',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('product_image',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
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
                        echo $obj->__('disabled',$_SESSION['auth']['default_lang']);
                        
                        ?>
                        <a href="?status=A&&product_id=<?php echo $pdt['product_id']?>"  class="btn btn-sm btn-primary" ><?php echo $obj->__('active',$_SESSION['auth']['default_lang']); ?></a>
                    <?php
                    }else{
                        echo $obj->__('active',$_SESSION['auth']['default_lang']);
                       
                         ?>
                            <a href="?status=D&&product_id=<?php echo $pdt['product_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('disabled',$_SESSION['auth']['default_lang']); ?></a>
                         <?php
                    }
                ?>
            </td>
            <td>   <a href="edit_product.php?&product_id=<?php echo $pdt['product_id'] ?>"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a> <br>
             <a href="?action=delete&&product_id=<?php echo $pdt['product_id'] ?>"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>  </td>

        </tr>
        <?php }?>

        
    </tbody>
</table>


<script>




</script>