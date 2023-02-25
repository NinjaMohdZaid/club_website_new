
  

<?php 
$_REQUEST['club_id'] = $_SESSION['auth']['club_id'];
list($bookings,$search) = $obj->display_bookings($_REQUEST,$_SESSION['auth']['default_lang']);

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
?>

<?php if(!empty($bookings)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Booking Id</th>
            <th>Details</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($bookings as $key => $booking) { ?>
        <tr>
            <td><?php echo '#<b>'.$booking['booking_id'].'</b>' ?></td>
            <td><?php echo '<b>'.$booking['name'].'</b><br>Game :'.$booking['game'].'<br>Price : '.$booking['price'].'<br> Email : <a href="mailto:'.$booking['email'].'">'.$booking['email'].'</a>'.'<br> Phone : <a href="tel:'.$booking['phone'].'">'.$booking['phone'].'</a>'.'<br> From : '.date('m/d/Y,h:i',$booking['booking_from']).'<br> To : '.date('m/d/Y,h:i',$booking['booking_to']); ?>
            </td>
            <td class="manage_booking_action">
                <a href="edit_booking.php?action=edit&booking_id=<?php echo $booking['booking_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <!-- <a href="?action=delete&booking_id=<?php echo $booking['booking_id'] ?>" class="btn btn-sm btn-success">Cancel</a> -->
                <a href="?action=delete&booking_id=<?php echo $booking['booking_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
