<?php 
    if(isset($_GET['action'])){
        $membership_id = $_GET['membership_id'];
        if($_GET['action']=="delete"){
            if($obj->delete_game_membership($membership_id)){
                $rtnMsg = "Deleted successfully";
            }else{
                $rtnMsg = "Not deleted successfully";
            }
                
        }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
    list($memberships,$search) = $obj->display_game_memberships($_REQUEST,$_REQUEST['game_id'],$_SESSION['auth']['club_id'],$_SESSION['auth']['default_lang']);
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 
</h4>
<h2>Memberships For <?php echo $game_data['game'] ?></h2>
<a href="add_game_membership.php?game_id=<?php echo $_REQUEST['game_id']; ?>" class="btn btn-primary">+ Add Memberships</a>
<table class="table table-striped">
    <?php
       if(!empty($memberships)){
    ?>
    <thead>
        <tr>
            <th>ID</th>
            <th>&nbsp;</th>
            <th>Membership</th>
            <th>Months</th>
            <th>Price (AED)</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       
       <?php
       foreach ($memberships as $key => $membership) { ?>
        <tr>
            <td><?php echo $membership['membership_id'] ?></td>
            <td><?php if(!empty($membership['image'])){?>
                <img src="<?php echo '../assets/files/memberships/images/'.$membership['membership_id'].'/'. $membership['image']?>" style="width: 80px;" >
                <?php }?></td> 
            <td><?php echo $membership['membership_name'] ?></td>
            <td><?php echo $membership['months'] ?></td>
            <td><?php echo $membership['price'] ?></td>
            <td class="manage_club_action">
                <a href="edit_game_membership.php?action=edit&membership_id=<?php echo $membership['membership_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&membership_id=<?php echo $membership['membership_id'] ?>&game_id=<?php echo $_REQUEST['game_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                <a href="add_booking.php?membership_id=<?php echo $membership['membership_id'] ?>" class="btn btn-sm btn-info">Book Now</a>
            </td>
                      
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p>No Memberships Available</p>
        <?php
            }
        ?>
       
    </tbody>
</table>

