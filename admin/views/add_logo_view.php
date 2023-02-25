

<?php 
    $obj=new adminback();
   $logo_info = $obj->display_logo();

   // if(isset($_GET['prostatus'])){
   //     $id = $_GET['id'];
   //     if($_GET['prostatus']=='published'){
   //         $obj->published_product($id);
   //     }elseif($_GET['prostatus']=='unpublished'){
   //         $obj->unpublished_product($id);
   //     }elseif($_GET['prostatus']=="delete"){
   //      $del_msg = $obj->delete_product($id);
   //  }
   // }
?>
<h2>Add logo</h2> 

<table class="table">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
           
         
            <th><?php echo $obj->__('logo',$_SESSION['default_lang']); ?></th>
         
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
<?php 
    if(isset($del_msg)){
        echo "{$del_msg}";
    }

?>
    <?php while($logo = mysqli_fetch_assoc( $logo_info)) {

        ?>
        <tr>
  
            <td> <?php echo $logo['id']; ?></td>
          
            <td>  <img style="height:60px" src="uploads/<?php echo $logo['img']; ?>" alt=""> </td>
            
           
            <td>    <a href="edit_logo.php?status=edit&&id=<?php echo $logo['id']; ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a></td>

        </tr>
        <?php }?>
    </tbody>
</table>