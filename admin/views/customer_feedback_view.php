

<?php 
    $cmt_info = $obj->view_comment_all();

    if(isset($_GET['status'])){
        $comment_id = $_GET['id'];
        if($_GET['status']=='deletecomment'){
            
           $del_msg =  $obj->delete_comment($comment_id);
          

        }
    }


?>
<h2>Manage Customer Reviews</h2>


<h5 class="text-danger">
<?php 
    if(isset($del_msg)){
        echo $del_msg;
    }

?>
</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('user_id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('user_name',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('product_id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('comment',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('date',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php 
            while($cmt_row = mysqli_fetch_assoc($cmt_info)){
        ?>
        <tr>
            <td>
                <?php echo $cmt_row['id']?>
            </td>

            <td>
                <?php echo $cmt_row['user_id']?>
            </td>

            <td>
                <?php echo $cmt_row['user_name']?>
            </td>

            <td>
                <?php echo $cmt_row['pdt_id']?>
            </td>

            <td style="width:250px ;">
                <?php echo $cmt_row['comment']?>
            </td>

            <td>
                <?php echo $cmt_row['comment_date']?>
            </td>

            <td>
                <a href="edit_comment.php?status=editcomment&&id= <?php echo $cmt_row['id']?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                <a href="?status=deletecomment&&id= <?php echo $cmt_row['id']?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
            </td>



        </tr>

        <?php }?>
    </tbody>
</table>