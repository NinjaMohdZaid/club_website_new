
  

<?php 
if(isset($_GET['action'])){
    $get_id = $_GET['translation_id'];
   if($_GET['action']=="delete"){
        $obj->delete_translation($get_id);
    }
}
list($translations,$search) = $obj->display_translations($_REQUEST,$_SESSION['default_lang']);
?>

<?php if(!empty($translations)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <!-- <th>Club</th> -->
            <th><?php echo $obj->__('language_variable',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('translation',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($translations as $key => $translation) { ?>
        <tr>
            <td><?php echo $translation['language_variable']; ?></td>
            <td><?php echo $translation['translation']; ?></td>
            <td class="manage_translate_action">
                <a href="edit_translation.php?action=edit&translation_id=<?php echo $translation['translation_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                <a href="?action=delete&translation_id=<?php echo $translation['translation_id']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
            </td>
           
        </tr>
        <?php 
            }
        ?>
       
    </tbody>
</table>
</div>
<?php  }else{ ?>
<div>
<?php echo $obj->__('no_data_found',$_SESSION['default_lang']); ?>
</div>
<?php  } ?>
