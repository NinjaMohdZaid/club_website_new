<?php 
    if(!empty($_REQUEST['action']) && $_REQUEST['action']=='remove_game'){
        $obj->remove_game_from_club($_REQUEST['game_id'],$_SESSION['auth']['club_id']);
        header('Location:'.$_REQUEST['return_url']);
    }
    if(isset($_POST['add_games'])){
        if(!empty($_REQUEST['game_ids'])){            
            if($obj->update_club_games($_SESSION['auth']['club_id'],$_POST['game_ids'])){
                $rtnMsg = "Games added to the club";
            }else{
                $rtnMsg = "Failed to Add Games added to the club";
            }
        }else{
            $rtnMsg = "Failed to Add Games added to the club";
        }    
    }
    $club_data = $obj->display_clubByID($_SESSION['auth']['club_id']);
    $_params = ['exclude_game_ids' => $club_data['game_ids']];
    list($games,) = $obj->display_games($_params,$_SESSION['auth']['default_lang']);

?>
<h2>Games In The Club</h2>
<table class="table table-striped">
    <?php
     if(!empty($club_data['game_ids'])){
         $_params = ['game_ids' => $club_data['game_ids']];
         list($_games,) = $obj->display_games($_params,$_SESSION['auth']['default_lang']);
     }else{
         $_games = [];
     }
       if(!empty($_games)){
    ?>
    <thead>
        <tr>
            <th>ID</th>
            <th>Game</th>
            <th>Game Image</th>
            <th>Booking By</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       
       <?php
       foreach ($_games as $key => $game) {?>
        <tr>
            <td><?php echo $game['game_id'] ?></td>
            <td><?php echo $game['game'] ?></td>
            <td><?php if(!empty($game['image_location'])){?>
                <img src="../assets/files/games/images/<?php echo $game['game_id'].'/'.$game['image_location']; ?>" style="width: 80px;" >
                <?php }?></td>
            <td><?php if($game['booking_by'] == 'H') echo 'Shot';
                    elseif($game['booking_by'] == 'S') echo 'Subscription';
                    elseif($game['booking_by'] == 'T') echo 'Time'; ?>
            </td>
            <td>
                <?php if($game['field_type'] == 'T'){
                    echo '<a href="manage_tables.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">Total '.$obj->get_table_counts($game['game_id'],$_SESSION['auth']['club_id']).' Tables</a>';
                }elseif($game['field_type'] == 'G'){
                    echo '<a href="manage_grounds.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">Total '.$obj->get_ground_counts($game['game_id'],$_SESSION['auth']['club_id']).' Grounds</a>';
                }elseif($game['field_type'] == 'P'){
                    echo '<a href="manage_pitches.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">Total '.$obj->get_pitch_counts($game['game_id'],$_SESSION['auth']['club_id']).' pitches</a>';
                }elseif($game['field_type'] == 'E'){
                    echo '<a href="#" class="btn btn-sm btn-warning">Total 20 Games</a>';
                }elseif($game['field_type'] == 'M'){
                    echo '<a href="#" class="btn btn-sm btn-warning">Total 13 Memberships</a>';
                }
                ?>
                <a href="?action=remove_game&game_id=<?php echo $game['game_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Remove From Club</a>
            </td>
           
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p>No Game Select For your club</p>
        <?php
            }
        ?>
       
    </tbody>
</table>