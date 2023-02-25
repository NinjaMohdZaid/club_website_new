<?php 
    if(isset($_GET['action'])){
        $ground_id = $_GET['ground_id'];
        if($_GET['action']=="delete"){
            if($obj->delete_ground($ground_id)){
                $rtnMsg = "Deleted successfully";
            }else{
                $rtnMsg = "Not deleted successfully";
            }
                
        }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
    list($gorunds,$search) = $obj->display_grounds($_REQUEST,$_REQUEST['game_id'],$_SESSION['auth']['club_id'],$_SESSION['auth']['default_lang']);
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 
</h4>
<h2>Grounds for <?php echo $game_data['game'] ?></h2>
<a href="add_ground.php?game_id=<?php echo $_REQUEST['game_id']; ?>" class="btn btn-primary">+ Add Ground</a>
<table class="table table-striped">
    <?php
       if(!empty($gorunds)){
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
       foreach ($gorunds as $key => $ground) { ?>
        <tr>
            <td><?php echo $ground['ground_id'] ?></td>
            <td><?php if(!empty($ground['image'])){?>
                <img src="<?php echo '../assets/files/grounds/images/'.$ground['ground_id'].'/'. $ground['image']?>" style="width: 80px;" >
                <?php }?></td> 
            <td><?php echo $ground['ground_name'] ?></td>
            <td><?php echo $ground['price'] ?></td>
            <td class="manage_club_action">
                <a href="edit_ground.php?action=edit&ground_id=<?php echo $ground['ground_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&ground_id=<?php echo $ground['ground_id'] ?>&game_id=<?php echo $_REQUEST['game_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                <a href="add_booking.php?ground_id=<?php echo $ground['ground_id'] ?>" class="btn btn-sm btn-info">Book Now</a>
            </td>
                      
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p>No Ground Available</p>
        <?php
            }
        ?>
       
    </tbody>
</table>

