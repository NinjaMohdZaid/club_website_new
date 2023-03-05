<?php 

    if(isset($_POST['add_booking'])){
      $_POST['club_id'] = $_SESSION['auth']['club_id'];
      $rtn =   $obj->add_booking($_POST);
      if(!empty($rtn)){
        $rtnMsg = "Booking added successfuly";
      }else{
        $rtnMsg = "Booking not added";
      }
    }
    if(!empty($_REQUEST['table_id'])){
        $obect_id = $_REQUEST['table_id'];
        $object = 'T';
        $table_data = $obj->display_tableByID($_REQUEST['table_id'],$_SESSION['auth']['default_lang']);
        $game_data = $obj->display_gameByID($table_data['game_id'],$_SESSION['auth']['default_lang']);
    }elseif(!empty($_REQUEST['ground_id'])){
        $obect_id = $_REQUEST['ground_id'];
        $object = 'G';
        $ground_data = $obj->display_groundByID($_REQUEST['ground_id'],$_SESSION['auth']['default_lang']);
        $game_data = $obj->display_gameByID($ground_data['game_id'],$_SESSION['auth']['default_lang']);
    }elseif(!empty($_REQUEST['pitch_id'])){
        $obect_id = $_REQUEST['pitch_id'];
        $object = 'P';
        $pitch_data = $obj->display_pitchByID($_REQUEST['pitch_id'],$_SESSION['auth']['default_lang']);
        $game_data = $obj->display_gameByID($pitch_data['game_id'],$_SESSION['auth']['default_lang']);
    }elseif(!empty($_REQUEST['membership_id'])){
        $obect_id = $_REQUEST['membership_id'];
        $object = 'M';
        $membership_data = $obj->display_game_membershipByID($_REQUEST['membership_id'],$_SESSION['auth']['default_lang']);
        $game_data = $obj->display_gameByID($membership_data['game_id'],$_SESSION['auth']['default_lang']);
    }
?>
<!-- //table type -->
<?php if($game_data['field_type']=='T'){
    ?>
<?php if(!empty($table_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/tables/images/'.$table_data['table_id'].'/'. $table_data['image']?>" style="width: 200px;" >
    <?php
    }
?>        
<h2>Book <?php echo $ground_data['table_name']; ?> For <?php echo $game_data['game'] ?> <?php echo $obj->__('game',$_SESSION['auth']['default_lang']); ?></h2>
<?php }?>

<?php if($game_data['field_type']=='P'){
    ?>
<?php if(!empty($pitch_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/pitches/images/'.$pitch_data['pitch_id'].'/'. $pitch_data['image']?>" style="width: 200px;" >
    <?php
    }
?>        
<h2><?php echo $obj->__('book',$_SESSION['auth']['default_lang']); ?> <?php echo $pitch_data['pitch_name']; ?> <?php echo $obj->__('for',$_SESSION['auth']['default_lang']); ?> <?php echo $game_data['game'] ?> <?php echo $obj->__('game',$_SESSION['auth']['default_lang']); ?></h2>
<?php }?>

<?php if($game_data['field_type']=='G'){
    ?>
<?php if(!empty($ground_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/grounds/images/'.$ground_data['ground_id'].'/'. $ground_data['image']?>" style="width: 200px;" >
    <?php
    }
?>        
<h2><?php echo $obj->__('book',$_SESSION['auth']['default_lang']); ?> <?php echo $ground_data['ground_name']; ?> <?php echo $obj->__('for',$_SESSION['auth']['default_lang']); ?> <?php echo $game_data['game'] ?> <?php echo $obj->__('game',$_SESSION['auth']['default_lang']); ?></h2>
<?php }?>

<!-- ground type -->
<?php if($game_data['field_type']=='T'){
    ?>
<?php if(!empty($table_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/tables/images/'.$table_data['table_id'].'/'. $table_data['image']?>" style="width: 200px;" >
    <?php
    }
?>        
<h2><?php echo $obj->__('book',$_SESSION['auth']['default_lang']); ?> <?php echo $table_data['table_name']; ?> <?php echo $obj->__('for',$_SESSION['auth']['default_lang']); ?> <?php echo $game_data['game'] ?> <?php echo $obj->__('game',$_SESSION['auth']['default_lang']); ?></h2>
<?php }?>
<!-- pitch type -->
<?php
if($game_data['field_type']=='M'){
    ?>
<?php if(!empty($membership_data['image'])){
    ?>
    <img src="<?php echo '../assets/files/memberships/images/'.$membership_data['membership_id'].'/'. $membership_data['image']?>" style="width: 200px;" >
    <?php
    }
?>        
<h2><?php echo $obj->__('book',$_SESSION['auth']['default_lang']); ?> <?php echo $membership_data['membership_name']; ?> <?php echo $obj->__('for',$_SESSION['auth']['default_lang']); ?> <?php echo $game_data['game'] ?> <?php echo $obj->__('game',$_SESSION['auth']['default_lang']); ?></h2>
<?php }?>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="game_id" value="<?php echo $game_data['game_id']; ?>" required>
    <input type="hidden" name="object_id" value="<?php echo $obect_id; ?>" required>
    <input type="hidden" name="object" value="<?php echo $object; ?>" required>
    <div class="form-group">
        <label for="name"><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="name" required class="form-control">
    </div>

    <div class="form-group">
        <label for="email"><?php echo $obj->__('email',$_SESSION['auth']['default_lang']); ?></label>
        <input type="email" name="email" required class="form-control">
    </div>

    <div class="form-group">
        <label for="phone"><?php echo $obj->__('phone',$_SESSION['auth']['default_lang']); ?></label>
        <input type="text" name="phone" required class="form-control">
    </div>

    <div class="form-group">
        <label for="booking_from"><?php echo $obj->__('booking_from',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" required name="booking_from" class="form-control">
    </div>

    <div class="form-group">
        <label for="booking_to"><?php echo $obj->__('booking_to',$_SESSION['auth']['default_lang']); ?></label>
        <input type="datetime-local" required name="booking_to" class="form-control">
    </div>

    <input type="submit" value="<?php echo $obj->__('book_now',$_SESSION['auth']['default_lang']); ?>" name="add_booking" class="btn btn-primary" >

</form>