<?php 

list($tournaments,$search) = $obj->display_tournaments($_REQUEST,$_SESSION['auth']['default_lang']);


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
                    echo "Disabled";
                        else
                    echo "Active";
            ?>
            </td>
            <td><?php echo $tournament['fee'] ?></td>
            <td><?php  if($tournament['is_sponser'] == 'Y') {echo "Yes";}else{echo "No";}?></td>
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
