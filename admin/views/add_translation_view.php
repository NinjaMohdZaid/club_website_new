<?php 
    if(isset($_POST['add_translation'])){
      $club_added =   $obj->add_translation($_POST,$_SESSION['default_lang']);
      if(!empty($club_added)){
        $rtnMsg = "Translation Added Successfully";
      }else{
        $rtnMsg = "Translation Not Added Successfully";
      }
    }
?>


<h2><?php echo $obj->__('add_translation',$_SESSION['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="language_variable"><?php echo $obj->__('language_variable',$_SESSION['default_lang']); ?></label>
        <input type="text" name="language_variable" class="form-control">
    </div>

    <div class="form-group">
        <label for="translation"><?php echo $obj->__('translation',$_SESSION['default_lang']); ?></label>
        <textarea name="translation" class="form-control" rows="6"></textarea>
    </div>
    <button type="submit" name="add_translation" class="btn btn-primary"><?php echo $obj->__('submit',$_SESSION['default_lang']); ?></button>

</form>