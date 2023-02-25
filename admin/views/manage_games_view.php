
  

<?php 

list($games,$search) = $obj->display_games($_REQUEST,$_SESSION['default_lang']);

if(isset($_GET['action'])){
    $get_id = $_GET['game_id'];
    if($_GET['action']=="activate"){
        if($obj->change_game_status($get_id,'A')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="disable"){
        if($obj->change_game_status($get_id,'D')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="delete"){
        if($obj->delete_game($get_id)){
            header('Location:'.$_REQUEST['return_url']);
        }
    }
}
?>

<?php if(!empty($games)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('game',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('game_image',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('booking_by',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($games as $key => $game) { ?>
        <tr>
            <td><?php echo $game['game_id'] ?></td>
            <td><?php echo $game['game'] ?></td>
            <td><?php if(!empty($game['image_location'])){?>
                <img src="<?php echo '../assets/files/games/images/'.$game['game_id'].'/'. $game['image_location']?>" style="width: 80px;" >
                <?php }?></td>
            <td><?php if($game['booking_by'] == 'M') echo 'Monthly';
                    elseif($game['booking_by'] == 'T') echo 'Time';
                    elseif($game['booking_by'] == 'H') echo 'Shot';?>
            </td>
            <td>
                <?php 
                    if($game['status']=="D")
                    {echo $obj->__('disabled',$_SESSION['default_lang']);
                ?> 
                    <a href="?action=activate&game_id=<?php echo $game['game_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success"><?php echo $obj->__('make_active',$_SESSION['default_lang']); ?></a>
                    <?php
                } 
                else{echo $obj->__('active',$_SESSION['default_lang']);
                
                ?>
                 <a href="?action=disable&game_id=<?php echo $game['game_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('make_disabled',$_SESSION['default_lang']); ?></a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td>
                <a href="edit_game.php?action=edit&game_id=<?php echo $game['game_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                <a href="?action=delete&game_id=<?php echo $game['game_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
            </td>
           
        </tr>
        <?php 
            }
        ?>
       
    </tbody>
</table>
</div>
<?php  }else{ ?>
<div>
    No Data found
</div>
<?php  } ?>
