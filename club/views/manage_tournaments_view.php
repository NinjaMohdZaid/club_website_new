<?php 

list($tournaments,$search) = $obj->display_tournaments(['club_id'=>$_SESSION['auth']['club_id']],$_SESSION['auth']['default_lang']);
if(isset($_GET['action'])){
    $get_id = $_GET['id'];
    if($_GET['action']=="activate"){
        $obj->change_tournament_status($get_id,'A');
        header('Location:'.$_REQUEST['return_url']);
    }elseif($_GET['action']=="disable"){
        $obj->change_tournament_status($get_id,'D');
        header('Location:'.$_REQUEST['return_url']);
    }elseif($_GET['action']=="delete"){
        $obj->delete_tournament($get_id);
        header('Location:'.$_REQUEST['return_url']);
    }
}
?>

<?php if(!empty($tournaments)) { ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="5%" ><?php echo $obj->__('tournament',$_SESSION['auth']['default_lang']); ?></th>
            <th width="5%"><?php echo $obj->__('dates_start_or_end',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('type',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('entry_fees',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('sponsors',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tournaments as $key => $tournament) { ?>
       <tr>
            <td><?php echo $tournament['tournament'] ?></td>
            <td><?php echo "From :".date('m/d/Y,h:i',$tournament['tournament_start_date']); ?> <br> <?php echo "To :".date('m/d/Y,h:i',$tournament['reg_end_date']); ?></td>
            <td><?php if($tournament['type'] == 'L') {echo $obj->__('league',$_SESSION['auth']['default_lang']);}
                      elseif($tournament['type'] == 'K'){echo $obj->__('knockout',$_SESSION['auth']['default_lang']);}
                      elseif($tournament['type'] == 'W'){echo  $obj->__('winner_and_knockout_system',$_SESSION['auth']['default_lang']);} ?></td>
            <td>
            <?php if($tournament['status']=="D")
                    {echo  $obj->__('disabled',$_SESSION['auth']['default_lang']); ?> 
                    <a href="?action=activate&id=<?php echo $tournament['t_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success"><?php echo $obj->__('make_active',$_SESSION['auth']['default_lang']); ?></a>
                    <?php
                } 
                else{echo  $obj->__('active',$_SESSION['auth']['default_lang']);
                ?>
                 <a href="?action=disable&id=<?php echo $tournament['t_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('make_disabled',$_SESSION['auth']['default_lang']); ?></a>
                    <?php 
                }  
                ?>
                </td>
            <td><?php echo $tournament['fee'] ?></td>
            <td><?php  if($tournament['is_sponser'] == 'Y') {echo $obj->__('yes',$_SESSION['auth']['default_lang']);}else{echo $obj->__('no',$_SESSION['auth']['default_lang']);}?></td>
            <td>
                <a href="edit_tournament.php?action=edit&id=<?php echo $tournament['t_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                <a href="?action=delete&id=<?php echo $tournament['t_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
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
<?php echo $obj->__('no_data_found',$_SESSION['auth']['default_lang']); ?>
</div>
<?php  } ?>
