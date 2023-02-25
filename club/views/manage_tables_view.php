<?php 
    if(isset($_GET['action'])){
        $table_id = $_GET['table_id'];
        if($_GET['action']=="delete"){
            if($obj->delete_table($table_id)){
                $rtnMsg = "Deleted successfully";
            }else{
                $rtnMsg = "Not deleted successfully";
            }
                
        }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
    list($tables,$search) = $obj->display_tables($_REQUEST,$_REQUEST['game_id'],$_SESSION['auth']['club_id'],$_SESSION['auth']['default_lang']);
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 
</h4>
<h2>Tables For <?php echo $game_data['game'] ?></h2>
<a href="add_table.php?game_id=<?php echo $_REQUEST['game_id']; ?>" class="btn btn-primary">+ Add Table</a>
<table class="table table-striped">
    <?php
       if(!empty($tables)){
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
       foreach ($tables as $key => $table) { ?>
        <tr>
            <td><?php echo $table['table_id'] ?></td>
            <td><?php if(!empty($table['image'])){?>
                <img src="<?php echo '../assets/files/tables/images/'.$table['table_id'].'/'. $table['image']?>" style="width: 80px;" >
                <?php }?></td> 
            <td><?php echo $table['table_name'] ?></td>
            <td><?php echo $table['price'] ?></td>
            <td class="manage_club_action">
                <a href="edit_table.php?action=edit&table_id=<?php echo $table['table_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&table_id=<?php echo $table['table_id'] ?>&game_id=<?php echo $_REQUEST['game_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                <a href="add_booking.php?table_id=<?php echo $table['table_id'] ?>" class="btn btn-sm btn-info">Book Now</a>
            </td>
                      
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p>No Table Available</p>
        <?php
            }
        ?>
       
    </tbody>
</table>

