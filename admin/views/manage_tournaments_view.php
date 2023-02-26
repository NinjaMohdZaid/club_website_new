<?php 
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
list($tournaments,$search) = $obj->display_tournaments($_REQUEST,$_SESSION['default_lang']);
?>

<?php if(!empty($tournaments)) { ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="5%" ><?php echo $obj->__('tournaments',$_SESSION['default_lang']); ?></th>
            <th width="5%"><?php echo $obj->__('start_date_to_end_date_of_tournament',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('type',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('entry_fees',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('sponsors',$_SESSION['default_lang']); ?></th>
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
                    echo $obj->__('disabled',$_SESSION['default_lang']);
                        else
                    echo $obj->__('active',$_SESSION['default_lang']);
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
<?php echo $obj->__('no_data_found',$_SESSION['default_lang']); ?>
</div>
<?php  } ?>
