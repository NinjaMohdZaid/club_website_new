
  

<?php 
$_REQUEST['club_id'] = $_SESSION['auth']['club_id'];
list($sponsors,$search) = $obj->display_sponsors($_REQUEST,$_SESSION['auth']['default_lang']);
// print_r($sponsors);
// die;

if(isset($_GET['action'])){
    $get_id = $_GET['sponsor_id'];
    if($_GET['action']=="activate"){
        $obj->change_booking_status($get_id,'A');
    }elseif($_GET['action']=="disable"){
        $obj->change_booking_status($get_id,'D');
    }elseif($_GET['action']=="delete"){
        if($obj->delete_sponsor($get_id)){
            header('Location:'.$_REQUEST['return_url']);
        }
    }
}
?>

<?php if(!empty($sponsors)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('name',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('about',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('care_value',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('degree',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('type',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('tournament',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($sponsors as $key => $sponsor) { ?>
        <tr>
            <td><?php echo '#<b>'.$sponsor['sponsor_id'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['sponsor_name'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['sponsor_about'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['care_value'].'</b>' ?></td>
            <td><?php if($sponsor['sponsor_type'] == 'A') {echo $obj->__('degree',$_SESSION['auth']['default_lang'])." 1";}
                        elseif($sponsor['sponsor_type'] == 'B'){echo $obj->__('degree',$_SESSION['auth']['default_lang'])." 2";}
                        elseif($sponsor['sponsor_type'] == 'C'){echo $obj->__('degree',$_SESSION['auth']['default_lang'])." 3";} ?></td>
                <td><?php if($sponsor['degree_of_care'] == 'A') {echo $obj->__('care',$_SESSION['auth']['default_lang'])." 1";}
                        elseif($sponsor['degree_of_care'] == 'B'){echo $obj->__('care',$_SESSION['auth']['default_lang'])." 2";}
                        elseif($sponsor['degree_of_care'] == 'C'){echo $obj->__('care',$_SESSION['auth']['default_lang'])." 3";} ?></td>
            <td><?php echo '<b>'.$sponsor['tournament'].'</b>' ?></td>
            <td class="manage_booking_action">
                <a href="edit_sponsor.php?action=edit&sponsor_id=<?php echo $sponsor['sponsor_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                <!-- <a href="?action=delete&booking_id=<?php echo $sponsor['sponsor_id'] ?>" class="btn btn-sm btn-success">Cancel</a> -->
                <a href="?action=delete&sponsor_id=<?php echo $sponsor['sponsor_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
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
