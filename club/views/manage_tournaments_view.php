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
            <th width="5%" >Tournament</th>
            <th width="5%">Start Date to End Date<br>of Tournament</th>
            <th>Type</th>
            <th>Status</th>
            <th>Entry fees</th>
            <th>Sponsors</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tournaments as $key => $tournament) { ?>
       <tr>
            <td><?php echo $tournament['tournament'] ?></td>
            <td><?php echo "From :".date('m/d/Y,h:i',$tournament['start_date']); ?> <br> <?php echo "To :".date('m/d/Y,h:i',$tournament['end_date']); ?></td>
            <td><?php if($tournament['type'] == 'L') {echo "League";}
                      elseif($tournament['type'] == 'K'){echo "Knockout";}
                      elseif($tournament['type'] == 'W'){echo "Winner and Knockout System";} ?></td>
            <td>
            <?php if($tournament['status']=="D")
                    {echo "Disabled"; ?> 
                    <a href="?action=activate&id=<?php echo $tournament['t_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success">Make Active</a>
                    <?php
                } 
                else{echo "Active";
                ?>
                 <a href="?action=disable&id=<?php echo $tournament['t_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning">Make Disabled</a>
                    <?php 
                }  
                ?>
                </td>
            <td><?php echo $tournament['fee'] ?></td>
            <td><?php  if($tournament['is_sponser'] == 'Y') {echo "Yes";}else{echo "No";}?></td>
            <td>
                <a href="edit_tournament.php?action=edit&id=<?php echo $tournament['t_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&id=<?php echo $tournament['t_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
