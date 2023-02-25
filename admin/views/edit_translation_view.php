<?php 
    if(isset($_POST['add_translation'])){
      $club_added =   $obj->update_translation($_POST,$_SESSION['default_lang']);
      if(!empty($club_added)){
        $rtnMsg = $obj->__('translation_updated_successfully',$_SESSION['default_lang']);
      }else{
        $rtnMsg = $obj->__('translation_not_updated_successfully',$_SESSION['default_lang']);
      }
    }
    $translation_data = $obj->display_translationByID($_REQUEST['translation_id']);
?>


<h2><?php echo $obj->__('update_translation',$_SESSION['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="translation_id" value="<?php echo $_REQUEST['translation_id']; ?>">
    <div class="form-group">
        <label for="language_variable"><?php echo $obj->__('language_variable',$_SESSION['default_lang']); ?></label>
        <input type="text" name="language_variable" value="<?php echo $translation_data['language_variable']; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="translation"><?php echo $obj->__('translation',$_SESSION['default_lang']); ?></label>
        <textarea name="translation" class="form-control" rows="6"><?php echo $translation_data['translation']; ?></textarea>
    </div>
    <button type="submit" name="add_translation" class="btn btn-primary"><?php echo $obj->__('update',$_SESSION['default_lang']); ?></button>

</form>
