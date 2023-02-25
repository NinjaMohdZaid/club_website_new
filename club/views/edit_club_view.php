
<?php 
    

    if(isset($_POST['update_club'])){
        $_POST['club_id'] = $_SESSION['auth']['club_id'];
        $up_msg = $obj->update_club($_POST,$_SESSION['auth']['default_lang']);
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $club_id = $_SESSION['auth']['club_id'];
            $club_data = $obj->display_clubByID($club_id,$_SESSION['auth']['default_lang']);
        }
    }
    if(!empty($_REQUEST['delete_image'])){
        $club_id = $_REQUEST['club_id'];
        $target_dir = "../assets/files/clubs/multi_images/$club_id";
            if (is_dir($target_dir)) {
                $file = $target_dir.'/'.$_REQUEST['target_image'];
                // Delete the given file
                unlink($file);
            }
     }
?>


<h2>Update Club</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="club">Club</label>
        <input type="text" name="club" class="form-control" value="<?php echo $club_data['club'] ?>">
    </div>
   
    <div class="form-group">
        <label for="activities_desc">Club Games/Activities</label>
        <textarea name="activities_desc" class="form-control" rows="6"><?php echo $club_data['activities_desc'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="history">Club History</label>
        <textarea name="history" class="form-control" rows="6"><?php echo $club_data['history'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="licence_copy">Upload Trade License Copy</label>
        <?php if(!empty($club_data['licence_location'])){?>
            <div class="mb-3">
                <?php echo '<a target="__blank" href="'.$club_data['licence_location'].'"><u>(1) File Attached Click to Read</u></a>' ?>
            </div>
        <?php }?>
        <input type="file" name="licence_copy" class="form-control">
    </div>

    <div class="form-group">
        <label for="licence_expiry">Licence Expiry Date</label>
        <input type="datetime-local" required name="licence_expiry" value="<?php echo date("Y-m-d\TH:i:s", $club_data['licence_expiry']); ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="address">Full Address</label>
        <textarea name="address" class="form-control" rows="6"><?php echo $club_data['address'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <input type="text" name="city" class="form-control" value="<?php echo $club_data['city'] ?>">
    </div>

    <div class="form-group">
        <label for="contact_person">Club Contact Person Name</label>
        <input type="text" name="contact_person" class="form-control" value="<?php echo $club_data['contact_person'] ?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $club_data['email'] ?>">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" name="phone" class="form-control" value="<?php echo $club_data['phone'] ?>">
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="website" name="website" class="form-control" value="<?php echo $club_data['website'] ?>">
    </div>

    <div class="form-group">
        <label for="banner">Upload Photo Of Club</label>
        <?php if(!empty($club_data['image_location'])){?>
            <div class="mb-3">
                <img src="../assets/files/clubs/images/<?php echo $club_data['club_id'].'/'.$club_data['image_location']; ?>" style="width: 80px;" >
            </div>
        <?php }?>
        <input type="file" name="banner" class="form-control">
    </div>

    <output id='image_file_output'>
        <?php
            foreach ($club_data['multi_images'] as $image){
        ?>
            <div class="image_container"><div class = "x" data_target_club_id="<?php echo $club_data['club_id']; ?>" data_target_img = "<?php echo $image; ?>">X</div><img src="../assets/files/clubs/multi_images/<?php echo $club_data['club_id'].'/'.$image; ?>"></div>
        <?php }
        ?>
    </output>

    <div class="form-group">
        <label for="multiple_images">Select Images for club Gallery</label>
        <input type="file" id='multiple_images' name="multiple_images[]" class="form-control" multiple>
    </div>

    <?php if(!empty($club_data['video'])){
        ?>
    <video width="320" height="240" controls>
        <source src="../assets/files/clubs/videos/<?php echo $club_data['club_id'].'/'.$club_data['video'];?>">
    </video>
    <?php } ?>

    <div class="form-group">
        <label for="video">Upload Video of the club</label>
        <input type="file" name="video" class="form-control" accept="video/*">
    </div>    

    <div class="form-group">
        <label for="status">Satus</label>
        <select name="status" class="form-control">
            <option value="A" <?php if($club_data['status'] == 'A'){echo 'selected';} ?>>Active</option>
            <option value="D" <?php if($club_data['status'] == 'D'){echo 'selected';} ?>>Disabled</option>
        </select>
    </div>

    <input type="hidden" required name="saved_hash_pass" value="<?php echo $club_data['password'] ?>" class="form-control">

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" required name="password" value="<?php echo $club_data['password'] ?>" class="form-control">
    </div>

    <input type="hidden" name="game_id" value="<?php echo $game_data['game_id'] ?>" >

    <input type="submit" value="Update Club" name="update_club" class="btn btn-primary" >

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
  let data_target_club_id = $(this).attr("data_target_club_id");
    $(this).parent().remove();

  $.ajax({
    url: 'edit_club.php?club_id='+data_target_club_id+'&delete_image=true&target_image='+target_image,
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