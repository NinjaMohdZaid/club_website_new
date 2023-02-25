<?php 

    if(isset($_POST['add_subscription'])){
      $rtnMsg =   $obj->add_subscription($_POST);
    }
?>


<h2><?php echo $obj->__('add_subscription',$_SESSION['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="subscription"><?php echo $obj->__('subscription',$_SESSION['default_lang']); ?></label>
        <input type="text" name="subscription" required class="form-control">
    </div>

    <div class="form-group">
        <label for="validity_months"><?php echo $obj->__('validity',$_SESSION['default_lang']); ?></label>
        <select name="validity_months" class="form-control">
            <option value="1">1 <?php echo $obj->__('month',$_SESSION['default_lang']); ?></option>
            <option value="2">2 <?php echo $obj->__('months',$_SESSION['default_lang']); ?></option>
            <option value="6">6 <?php echo $obj->__('months',$_SESSION['default_lang']); ?></option>
            <option value="12">1 <?php echo $obj->__('year',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['default_lang']); ?></label>
        <input type="text" required name="price" class="form-control">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <input type="submit" value="<?php echo $obj->__('add_subscription',$_SESSION['default_lang']); ?>" name="add_subscription" class="btn btn-primary" >

</form>