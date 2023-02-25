<?php 
    $arry = $obj->show_admin_user();
   
  if(isset($_GET['status'])){
      $admin_id = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_admin($admin_id);
      }
  }

?>

<div class="container">
    <h2>Manage user</h2>

    <h4 class="text-success">
        <?php 
            if(isset($del_msg )){
                echo $del_msg;
            }
        ?>
    </h4>

    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('email',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('role',$_SESSION['default_lang']); ?></th>
                <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
            </tr>
        </thead>

        <tbody>
        <?php 
            while($user = mysqli_fetch_assoc($arry)){
        ?>
            <tr>
                <td> <?php echo $user['admin_id'] ?> </td>
                <td> <?php echo $user['admin_email'] ?> </td>
               
                <td> <?php if($user['role']==1){
                    echo $obj->__('admin',$_SESSION['default_lang']);
                }else{
                    echo $obj->__('moderator',$_SESSION['default_lang']);
                } ?> </td>
            
                <td>  
                    <a href="edit_admin.php?status=userEdit&&id=<?php echo $user['admin_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?> </a>
                    <a href="?status=delete&&id=<?php echo $user['admin_id'] ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>

                </td>
            </tr>

           

            <?php }?>
        </tbody>
    </table>
</div>