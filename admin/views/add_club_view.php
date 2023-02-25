<?php 
    list($subscriptions,) = $obj->display_subscriptions([]);

    if(isset($_POST['add_club'])){
      $club_added =   $obj->add_club($_POST);
      if(!empty($club_added)){
        $rtnMsg = "Club Added Successfully";
      }else{
        $rtnMsg = "Club Not Added Successfully";
      }
    }
?>


<h2><?php echo $obj->__('add_club',$_SESSION['default_lang']); ?></h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="club"><?php echo $obj->__('club',$_SESSION['default_lang']); ?></label>
        <input type="text" name="club" class="form-control">
    </div>
    <div class="form-group">
        <label for="club"><?php echo $obj->__('subscription',$_SESSION['default_lang']); ?></label>
        <select name="subscription_id" required class="form-control">
            <option>---<?php echo $obj->__('choose_subscription',$_SESSION['default_lang']); ?>---</option>
            <?php
            foreach ($subscriptions as $subscription) {
                echo "<option value='".$subscription['subscription_id']."'>".$subscription['subscription']."(".$subscription['price']."AED For ".$subscription['validity_months']." Months)</option>";
            }
            ?>                                                
        </select>
    </div>

    <div class="form-group">
        <label for="activities_desc"><?php echo $obj->__('club_games_or_activities',$_SESSION['default_lang']); ?></label>
        <textarea name="activities_desc" class="form-control" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label for="history"><?php echo $obj->__('club_history',$_SESSION['default_lang']); ?></label>
        <textarea name="history" class="form-control" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label for="licence_copy"><?php echo $obj->__('upload_trade_license_copy',$_SESSION['default_lang']); ?></label>
        <input type="file" name="licence_copy" required class="form-control">
    </div>

    <div class="form-group">
        <label for="licence_expiry"><?php echo $obj->__('licence_expiry_date',$_SESSION['default_lang']); ?></label>
        <input type="datetime-local" required name="licence_expiry" class="form-control">
    </div>

    <div class="form-group">
        <label for="address"><?php echo $obj->__('full_address',$_SESSION['default_lang']); ?></label>
        <textarea name="address" class="form-control" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label for="city"><?php echo $obj->__('city',$_SESSION['default_lang']); ?></label>
        <input type="text" name="city" class="form-control">
    </div>

    <div class="form-group">
        <label for="contact_person"><?php echo $obj->__('club_contact_person_name',$_SESSION['default_lang']); ?></label>
        <input type="text" name="contact_person" class="form-control">
    </div>

    <div class="form-group">
        <label for="email"><?php echo $obj->__('email',$_SESSION['default_lang']); ?></label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="phone"><?php echo $obj->__('phone',$_SESSION['default_lang']); ?></label>
        <input type="phone" name="phone" class="form-control">
    </div>

    <div class="form-group">
        <label for="website"><?php echo $obj->__('website',$_SESSION['default_lang']); ?></label>
        <input type="website" name="website" class="form-control">
    </div>

    <div class="form-group">
        <label for="banner"><?php echo $obj->__('upload_logo_of_club',$_SESSION['default_lang']); ?></label>
        <input type="file" name="banner" class="form-control">
    </div>

    <output id='image_file_output'></output>
    <div class="form-group">
        <label for='multiple_images'><?php echo $obj->__('select_images_for_club_gallery',$_SESSION['default_lang']); ?></label>
        <input id='multiple_images' name="multiple_images[]" type='file' class="form-control" multiple/>
    </div>

    <div class="form-group">
        <label for="video"><?php echo $obj->__('upload_video_of_the_club',$_SESSION['default_lang']); ?></label>
        <input type="file" name="video" class="form-control" accept="video/*">
    </div>

    <div class="form-group">
        <label for="status"><?php echo $obj->__('status',$_SESSION['default_lang']); ?></label>
        <select name="status" class="form-control">
            <option value="A"><?php echo $obj->__('active',$_SESSION['default_lang']); ?></option>
            <option value="D"><?php echo $obj->__('disabled',$_SESSION['default_lang']); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="password"><?php echo $obj->__('password',$_SESSION['default_lang']); ?></label>
        <input type="password" required name="password" class="form-control">
    </div>
    <button type="submit" name="add_club" class="btn btn-primary"><?php echo $obj->__('submit',$_SESSION['default_lang']); ?></button>

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