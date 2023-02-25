<?php 
    if(isset($_GET['action'])){
        $pitch_id = $_GET['pitch_id'];
        if($_GET['action']=="delete"){
            if($obj->delete_pitch($pitch_id)){
                $rtnMsg = "Deleted successfully";
            }else{
                $rtnMsg = "Not deleted successfully";
            }
                
        }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
    list($pitches,$search) = $obj->display_pitches($_REQUEST,$_REQUEST['game_id'],$_SESSION['auth']['club_id'],$_SESSION['auth']['default_lang']);
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 
</h4>
<h2>Pitches for <?php echo $game_data['game'] ?></h2>
<a href="add_pitch.php?game_id=<?php echo $_REQUEST['game_id']; ?>" class="btn btn-primary">+ Add Pitch</a>
<table class="table table-striped">
    <?php
       if(!empty($pitches)){
    ?>
    <thead>
        <tr>
            <th>ID</th>
            <th>&nbsp;</th>
            <th>Table</th>
            <th>Price (AED)</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       
       <?php
       foreach ($pitches as $key => $pitch) { ?>
        <tr>
            <td><?php echo $pitch['pitch_id'] ?></td>
            <td><?php if(!empty($pitch['image'])){?>
                <img src="<?php echo '../assets/files/pitches/images/'.$pitch['pitch_id'].'/'. $pitch['image']?>" style="width: 80px;" >
                <?php }?></td> 
            <td><?php echo $pitch['pitch_name'] ?></td>
            <td><?php echo $pitch['price'] ?></td>
            <td class="manage_club_action">
                <a href="edit_pitch.php?action=edit&pitch_id=<?php echo $pitch['pitch_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&pitch_id=<?php echo $pitch['pitch_id'] ?>&game_id=<?php echo $_REQUEST['game_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                <a href="add_booking.php?pitch_id=<?php echo $pitch['pitch_id'] ?>" class="btn btn-sm btn-info">Book Now</a>
            </td>
                      
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p>No Pitches Available</p>
        <?php
            }
        ?>
       
    </tbody>
</table>

