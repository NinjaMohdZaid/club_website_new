
<?php 
    list($categories,) = $obj->display_categories(['status'=>'A'],0,$_SESSION['auth']['default_lang']);

    if(isset($_POST['add_pdt'])){
        $_POST['club_id'] = $_SESSION['auth']['club_id'];
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
        <label for="product">Product</label>
        <input type="text" name="product" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.001" name="price" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" name="amount" class="form-control" min='0' required>
    </div>


    <div class="form-group">
        <label for="category_id">Catagory</label>
        <select name="category_id" class="form-control" required>
        <option value="" disabled>Select a Catagory</option>

        <?php foreach ($categories as $category) {?>
        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category']; ?></option>
        <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="banner">Main Image Of Product</label>
        <input type="file" name="banner" class="form-control">
    </div>
    <output id='image_file_output'></output>

    <div class="form-group">
        <label for="multiple_images">Select Multiple Images Product</label>
        <input type="file" id='multiple_images' name="multiple_images[]" class="form-control" multiple>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="A">Active</option>
            <option value="D">Disabled</option>
        </select>
    </div>
    <input type="submit" value="Add Product" name="add_pdt" class="btn btn-block btn-primary">
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