
  

<?php 
$_REQUEST['club_id'] = $_SESSION['auth']['club_id'];
if(isset($_GET['action'])){
    $get_id = $_GET['booking_id'];
    if($_GET['action']=="activate"){
        $obj->change_booking_status($get_id,'A');
    }elseif($_GET['action']=="disable"){
        $obj->change_booking_status($get_id,'D');
    }elseif($_GET['action']=="delete"){
        if($obj->delete_booking($get_id)){
            header('Location:'.$_REQUEST['return_url']);
        }
    }
}
list($bookings,$search) = $obj->display_bookings($_REQUEST,$_SESSION['auth']['default_lang']);
?>

<?php if(!empty($bookings)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('details',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($bookings as $key => $booking) { ?>
        <tr>
            <td><?php echo '#<b>'.$booking['booking_id'].'</b>' ?></td>
            <td><?php echo '<b>'.$booking['name'].'</b><br>'.$obj->__('game',$_SESSION['auth']['default_lang']).' :'.$booking['game'].'<br>'.$obj->__('price',$_SESSION['auth']['default_lang']).' : '.$booking['price'].'<br> '.$obj->__('email',$_SESSION['auth']['default_lang']).' : <a href="mailto:'.$booking['email'].'">'.$booking['email'].'</a>'.'<br> '.$obj->__('phone',$_SESSION['auth']['default_lang']).' : <a href="tel:'.$booking['phone'].'">'.$booking['phone'].'</a>'.'<br> '.$obj->__('from',$_SESSION['auth']['default_lang']).' : '.date('m/d/Y,h:i',$booking['booking_from']).'<br> '.$obj->__('to',$_SESSION['auth']['default_lang']).' : '.date('m/d/Y,h:i',$booking['booking_to']); ?>
            </td>
            <td class="manage_booking_action">
                <a href="edit_booking.php?action=edit&booking_id=<?php echo $booking['booking_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                <!-- <a href="?action=delete&booking_id=<?php echo $booking['booking_id'] ?>" class="btn btn-sm btn-success">Cancel</a> -->
                <a href="?action=delete&booking_id=<?php echo $booking['booking_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
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
