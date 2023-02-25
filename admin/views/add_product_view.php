
<?php 
    list($categories,) = $obj->display_categories(['status'=>'A'],0,$_SESSION['default_lang']);

    if(isset($_POST['add_pdt'])){
        $rtn = $obj->add_product($_POST);
        if(!empty($rtn)){
            $rtn_msg = "Product added successfully";
        }else{
            $rtn_msg = "Product not added successfully";
        }
    }
?>

<h2>Add Product</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="product"><?php echo $obj->__('product',$_SESSION['default_lang']); ?></label>
        <input type="text" name="product" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="price"><?php echo $obj->__('price',$_SESSION['default_lang']); ?></label>
        <input type="number" step="0.001" name="price" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description"><?php echo $obj->__('description',$_SESSION['default_lang']); ?></label>
        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="amount"><?php echo $obj->__('amount',$_SESSION['default_lang']); ?></label>
        <input type="number" name="amount" class="form-control" min='0' required>
    </div>


    <div class="form-group">
        <label for="category_id"><?php echo $obj->__('category',$_SESSION['default_lang']); ?></label>
        <select name="category_id" class="form-control" required>
        <option value="" disabled><?php echo $obj->__('select_a_category',$_SESSION['default_lang']); ?></option>

        <?php foreach ($categories as $category) {?>
        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category']; ?></option>
        <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="banner"><?php echo $obj->__('main_image_of_product',$_SESSION['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>
    <output id='image_file_output'></output>

    <div class="form-group">
        <label for="multiple_images"><?php echo $obj->__('select_multiple_image_of_product',$_SESSION['default_lang']); ?></label>
        <input type="file" id='multiple_images' name="multiple_images[]" class="form-control" multiple>
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control" required>
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>



    <input type="submit" value="<?php echo $obj->__('add_product',$_SESSION['default_lang']); ?>" name="add_pdt" class="btn btn-block btn-primary">
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

</style>