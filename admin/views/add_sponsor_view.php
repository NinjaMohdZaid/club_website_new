<?php 
    if(isset($_POST['add_sponsor'])){ 
        $sponsor_id = $obj->add_sponsor($_POST); 
        if(!empty($sponsor_id)){
            $rtnMsg = "Sponsor added successfully";
        }else{
            $rtnMsg = "Sponsor not added successfully";
        }   
      }
?>

<?php if(!empty($rtnMsg)){
    ?>
<h3><?php echo $rtnMsg; ?></h3>
<?php }?>
<h2>Add Sponsor</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
   
        <div class="form-group">
                <div class="form-group">
                <label for="sponsor_name">Sponsor Name</label>
                    <input type="text" class="form-control" name="sponsor_name" >
                </div>
                <div class="form-group">
                <label for="care_type">Type of care: </label>
                    <label for="care_type"><input type="radio" name="care_type" value="A" checked> Care1</label>
                    <label for="care_type"><input type="radio" name="care_type"  value="B"> Care2</label>
                </div>
                <div class="form-group">
                <label for="degree_type">Degree of care: </label>
                    <label for="degree_type"><input type="radio" name="degree_type" value="A" checked> Degree1</label>
                    <label for="degree_type"><input type="radio" name="degree_type"  value="B"> Degree2</label>
                    <label for="degree_type"><input type="radio" name="degree_type"  value="C"> Degree3</label>
                </div>
                <div class="form-group">
                <label for="about_sponsor">About Our Sponsor</label>
                    <input type="text" class="form-control" name="about_sponsor">
                </div>
                <div class="form-group">
                <label for="care_value">Care Value</label>
                    <input type="text" class="form-control" name="care_value">
                </div>
        </div>
        
        

    <div class="form-group">
        <input type="submit" value="Add Sponsor" name="add_sponsor" class="btn btn-primary">
    </div>
</form>