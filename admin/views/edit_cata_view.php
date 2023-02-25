
<?php 
    if(isset($_POST['update_ctg'])){
        $res = $obj->update_catagory($_POST,$_SESSION['default_lang']);
        if($res){
            $up_msg = $obj->__('category_updated_successfully',$_SESSION['default_lang']);
        }else{
            $up_msg = $obj->__('category_not_updated_successfully',$_SESSION['default_lang']);
        }
    }
    if(isset($_GET['status'])){
        if($_GET['status']=='edit'){
            $category_id = $_GET['category_id'];
           $cata = $obj->display_categoryByID($category_id);
        }
    }
?>


<h2><?php echo $obj->__('update_catagory',$_SESSION['default_lang']); ?></h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="category"><?php echo $obj->__('catagory_name',$_SESSION['default_lang']); ?></label>
        <input type="text" name="category" class="form-control" value="<?php echo $cata['category'] ?>">
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <input type="text" name="description" class="form-control"  value="<?php echo $cata['description'] ?>">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A" <?php if($cata['status'] == 'A') echo 'selected'; ?>><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D" <?php if($cata['status'] == 'D') echo 'selected'; ?>><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <input type="hidden" name="category_id" value="<?php echo $cata['category_id'] ?>" >

    <input type="submit" value="<?php echo $obj->__('update_category',$_SESSION['default_lang']); ?>" name="update_ctg" class="btn btn-primary" >

</form>