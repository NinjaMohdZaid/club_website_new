
  

<?php 

    if(isset($_GET['status'])){
        $category_id = $_GET['category_id'];
        if($_GET['status']=='change_status'){
            $obj->change_catagory_status($category_id,$_GET['status_to']);
        }elseif($_GET['status']=="delete"){
            $obj->delete_category($category_id);
        }
        header('Location:manage_cata.php');
    }
    list($categories,$search) = $obj->display_categories($_REQUEST,0,$_SESSION['default_lang']);
?>
<div >
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('category',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('description',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('status',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
            </tr>
        </thead>

        <tbody>
           <?php foreach($categories as $category){ 
            ?>
            <tr>
                <td><?php echo $category['category_id'] ?></td>
                <td><?php echo $category['category'] ?></td>
                <td><?php echo $category['description'] ?></td>
                <td>
                    <?php 
                    if($category['status']=='D')
                    {echo $obj->__('disabled',$_SESSION['default_lang']);
                    
                         ?> 
                         <a href="?status=change_status&status_to=A&category_id=<?php echo $category['category_id'] ?>" class="btn btn-sm btn-success"><?php echo $obj->__('make_active',$_SESSION['default_lang']); ?></a>
                        <?php
                    } 
                    else{echo $obj->__('active',$_SESSION['default_lang']);
                    
                    ?>
                     <a href="?status=change_status&status_to=D&category_id=<?php echo $category['category_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('make_disabled',$_SESSION['default_lang']); ?></a>
                        <?php 
                    }  
                    
                    ?>
                
                </td>
                <td>
                    <a href="edit_cata.php?status=edit&&category_id=<?php echo $category['category_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                    <a href="?status=delete&&category_id=<?php echo $category['category_id'] ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
                </td>
               
            </tr>
            <?php 
                }
            ?>
           
        </tbody>
    </table>
</div>
