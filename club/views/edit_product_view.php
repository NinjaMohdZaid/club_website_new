<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    if(isset($_POST['update_pdt'])){
        $res = $obj->update_product($_POST,$_SESSION['auth']['default_lang']); 
        if(!empty($res)){
            $update_msg =$obj->__('product_updated_successfully',$_SESSION['auth']['default_lang']);
        }else{
            $update_msg =$obj->__('product_not_updated_successfully',$_SESSION['auth']['default_lang']);
        }
    }
    $pdt = $obj->display_productByID($_GET['product_id'],$_SESSION['auth']['default_lang']);
    list($categories,) = $obj->display_categories(['status'=>'A'],0,$_SESSION['auth']['default_lang']);
    if(!empty($_REQUEST['delete_image'])){
        $product_id = $_REQUEST['product_id'];
        $target_dir = "../assets/files/products/multi_images/$product_id";
            if (is_dir($target_dir)) {
                $file = $target_dir.'/'.$_REQUEST['target_image'];
                // Delete the given file
                unlink($file);
            }
     }

?>
<h4><?php echo $obj->__('update_product',$_SESSION['auth']['default_lang']); ?></h4>

<?php 
    if(isset($update_msg)){
        echo $update_msg;
    }
?>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="product"><?php echo $obj->__('product',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="product" class="form-control" value="<?php echo $pdt['product'] ?>" >
    </div>

    <input type="hidden" name="product_id" value="<?php echo $pdt['product_id'] ?>">
    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" step="0.001" name="price" class="form-control" value="<?php echo $pdt['price'] ?>">
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['auth']['default_lang']); ?></label>
        <textarea name="description" cols="30" rows="10" class="form-control" ><?php echo $pdt['description']?> </textarea>
    </div>

    <div class="form-group">
        <label for="amount"><?php echo $obj->__('amount',$_SESSION['auth']['default_lang']); ?></label>
        <input type="number" name="amount" class="form-control" value="<?php echo $pdt['amount']?>">
    </div>


    <div class="form-group">
        <label for="category_id"><?php echo $obj->__('category',$_SESSION['auth']['default_lang']); ?></label>
        <select name="category_id" class="form-control" required>
        <option value="" disabled><?php echo $obj->__('select_a_category',$_SESSION['auth']['default_lang']); ?></option>

        <?php foreach ($categories as $category) {?>
        <option value="<?php echo $category['category_id']; ?>" <?php if($category['category_id'] == $pdt['category_id']) echo 'selected'; ?>><?php echo $category['category']; ?></option>
        <?php } ?>
        </select>
    </div>

   

    <div class="form-group">
        <label for="pdt_img"><?php echo $obj->__('main_image_of_product',$_SESSION['auth']['default_lang']); ?></label>
        <div class="mb-3">
            <img src="../assets/files/products/images/<?php echo $pdt['product_id'].'/'.$pdt['image']; ?>" style="width: 80px;" >
        </div>
        <input type="file" name="banner" class="form-control">
    </div>
    <output id='image_file_output'>
        <?php
            foreach ($pdt['multi_images'] as $image){
        ?>
            <div class="image_container"><div class = "x" data_target_product_id="<?php echo $_GET['product_id']; ?>" data_target_img = "<?php echo $image; ?>">X</div><img src="../assets/files/products/multi_images/<?php echo $pdt['product_id'].'/'.$image; ?>"></div>
        <?php }
        ?>
    </output>

    <div class="form-group">
        <label for="multiple_images"><?php echo $obj->__('select_multiple_images_product',$_SESSION['auth']['default_lang']); ?></label>
        <input type="file" id='multiple_images' name="multiple_images[]" class="form-control" multiple>
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A" <?php if($pdt['status']=='A'){ echo "selected";} ?> ><?php echo $obj->__('active',$_SESSION['auth']['default_lang']); ?></option>
            <option value="D" <?php if($pdt['status']=='D'){echo "selected";} ?> ><?php echo $obj->__('disabled',$_SESSION['auth']['default_lang']); ?></option>
        </select>
    </div>

    <input type="submit" value="<?php echo $obj->__('update_product',$_SESSION['auth']['default_lang']); ?>" name="update_pdt" class="btn btn-block btn-primary">
</form>
<script>
    window.onload = function() {
  //Check File API support
  if (window.File && window.FileList && window.FileReader) {
    var filesInput = document.getElementById("multiple_images");
    filesInput.addEventListener("change", function(event) {
      var files = event.target.files; //FileList object
      var output = document.getElementById("image_file_output");
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        //Only pics
        if (!file.type.match('image'))
          continue;
        var picReader = new FileReader();
        picReader.addEventListener("load", function(event) {
          var picFile = event.target;
          var div = document.createElement("div");
          div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
          output.insertBefore(div, null);
        });
        //Read the image
        picReader.readAsDataURL(file);
      }
    });
  } else {
    console.log("Your browser does not support File API");
  }
}
$(".x").click(function(event) {
  let target_image = $(this).attr("data_target_img");
  let data_target_product_id = $(this).attr("data_target_product_id");
    $(this).parent().remove();

  $.ajax({
    url: 'edit_product.php?product_id='+data_target_product_id+'&delete_image=true&target_image='+target_image,
    type: 'GET',
    success: function(data) {
        // $(this).parents('.image_container').remove();
    }
});

});
</script>
<style>
    #image_file_output{
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
    }
    #image_file_output img{
        width:200px;
        height:150px;
    }
    .image_container {
        width: 80%;
        overflow: auto;
        position: relative;
    }

    .x {
        display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    float: right;
    border: none;
    border-radius: 11px;
    width: 12%;
    background: red;
    color: white;
    top: 10px;
    right: 2px;
    }
    .x:hover{
        cursor: pointer;
    }

</style>
