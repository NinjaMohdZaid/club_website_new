<?php 
    if(isset($_GET['status'])){
        $comment_id = $_GET['id'];
        if($_GET['status']=='editcomment'){
            
           $array =  $obj->edit_comment($comment_id);
           $row = mysqli_fetch_assoc($array);

        }
    }

    if(isset($_POST['update_comment'])){
       $update_msg =  $obj->update_comment($_POST);
    }

?>



<form action="#" method="POST">

<h5 class="text-success">
    
<?php 
    if(isset($update_msg)){
        echo $update_msg;
    }
?>
</h5> <br> <br>
    
        <h5><?php echo $obj->__('user_id',$_SESSION['default_lang']); ?>: <?php echo $row['user_id'] ?> </h5> <br>
        <h5><?php echo $obj->__('user_name',$_SESSION['default_lang']); ?>: <?php echo $row['user_name'] ?> </h5> <br>
        <h5><?php echo $obj->__('product_id',$_SESSION['default_lang']); ?>: <?php echo $row['pdt_id'] ?> </h5> <br>

        <h5><?php echo $obj->__('comment',$_SESSION['default_lang']); ?>: </h5> <br>
        
   

    <div class="form-group">
        <input type="hidden" name="cmt_id" value="<?php echo $row['id'] ?>">
        <textarea name="u_comment" id="" cols="30" rows="10"><?php echo $row['comment'] ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" value="<?php echo $obj->__('update_comment',$_SESSION['default_lang']); ?>" name="update_comment" class="btn btn-lg btn-primary">
    </div>

    
</form>
