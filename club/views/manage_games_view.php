<?php 
    if(!empty($_REQUEST['action']) && $_REQUEST['action']=='remove_game'){
        $obj->remove_game_from_club($_REQUEST['game_id'],$_SESSION['auth']['club_id']);
        header('Location:'.$_REQUEST['return_url']);
    }
    $club_data = $obj->display_clubByID($_SESSION['auth']['club_id']);
    $_params = ['exclude_game_ids' => $club_data['game_ids']];
    list($games,) = $obj->display_games($_params,$_SESSION['auth']['default_lang']);

?>
<h2><?php echo $obj->__('games_in_the_club',$_SESSION['auth']['default_lang']); ?></h2>
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
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('game',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('game_image',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('booking_by',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
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
            <td><?php if($game['booking_by'] == 'H') echo $obj->__('shot',$_SESSION['auth']['default_lang']);
                    elseif($game['booking_by'] == 'M') echo $obj->__('monthly',$_SESSION['auth']['default_lang']);
                    elseif($game['booking_by'] == 'T') echo $obj->__('time',$_SESSION['auth']['default_lang']); ?>
            </td>
            <td>
                <?php if($game['field_type'] == 'T'){
                    echo '<a href="manage_tables.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">'.$obj->__('total',$_SESSION['auth']['default_lang']) .' '.$obj->get_table_counts($game['game_id'],$_SESSION['auth']['club_id']).$obj->__('tables',$_SESSION['auth']['default_lang']).'</a>';
                }elseif($game['field_type'] == 'G'){
                    echo '<a href="manage_grounds.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">'.$obj->__('total',$_SESSION['auth']['default_lang']) .' '.$obj->get_ground_counts($game['game_id'],$_SESSION['auth']['club_id']).$obj->__('grounds',$_SESSION['auth']['default_lang']).'</a>';
                }elseif($game['field_type'] == 'P'){
                    echo '<a href="manage_pitches.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">'.$obj->__('total',$_SESSION['auth']['default_lang']) .' '.$obj->get_pitch_counts($game['game_id'],$_SESSION['auth']['club_id']).$obj->__('pitches',$_SESSION['auth']['default_lang']).'</a>';
                }elseif($game['field_type'] == 'E'){
                    echo '<a href="#" class="btn btn-sm btn-warning">Total 0 Games</a>';
                }elseif($game['field_type'] == 'M'){
                    echo '<a href="manage_game_memberships.php?game_id='.$game['game_id'].'" class="btn btn-sm btn-warning">Total '.$obj->get_game_membership_counts($game['game_id'],$_SESSION['auth']['club_id']).$obj->__('memberships',$_SESSION['auth']['default_lang']).'</a>';
                }
                ?>
                <a href="?action=remove_game&game_id=<?php echo $game['game_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('remove_from_club',$_SESSION['auth']['default_lang']); ?></a>
            </td>
           
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p>
        <?php echo $obj->__('no_game_select_for_your_club',$_SESSION['auth']['default_lang']); ?>
        </p>
        <?php
            }
        ?>
       
    </tbody>
</table>