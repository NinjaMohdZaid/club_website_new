<?php 
    if(isset($_POST['add_user'])){
        $add_msg = $obj->add_admin_user($_POST);
    }
?>

<div class="container">
<h2><?php echo $obj->__('add_admin_or_moderator',$_SESSION['default_lang']); ?></h2>
<br>
<h6 class="text-success">
    <?php 
        if(isset($add_msg)){
            echo $add_msg;
        }
    ?>
</h6>
<form action="" method="POST">
    <div class="form-group">
        <h4><?php echo $obj->__('user_email',$_SESSION['default_lang']); ?></h4>
        <input type="email" name="user_name" class="form-control" required>
    </div>

    <div class="form-group">
        <h4><?php echo $obj->__('password',$_SESSION['default_lang']); ?></h4>
        <input type="password" name="user_password" class="form-control" required>
    </div>

    <div class="form-group">
        <h4><?php echo $obj->__('role',$_SESSION['default_lang']); ?></h4>
       <select name="user_role" class="form-control">
           <option disabled selected>--<?php echo $obj->__('select',$_SESSION['default_lang']); ?>--</option>
           <option value="1"><?php echo $obj->__('admin',$_SESSION['default_lang']); ?></option>
           <option value="2"><?php echo $obj->__('moderator',$_SESSION['default_lang']); ?></option>
       </select>
    </div>

    <div class="form-group">
        <input type="submit" name="add_user" class="btn btn-primary">
    </div>
</form>
</div>