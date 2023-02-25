
  

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
            <th>Sponsor Id</th>
            <th>Name</th>
            <th>About</th>
            <th>Care Value</th>
            <th>Degree</th>
            <th>Type</th>
            <th>Tournament</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($sponsors as $key => $sponsor) { ?>
        <tr>
            <td><?php echo '#<b>'.$sponsor['sponsor_id'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['sponsor_name'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['sponsor_about'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['care_value'].'</b>' ?></td>
            <td><?php if($sponsor['sponsor_type'] == 'A') {echo "Degree1";}
                      elseif($sponsor['sponsor_type'] == 'B'){echo "Degree2";}
                      elseif($sponsor['sponsor_type'] == 'C'){echo "Degree3";} ?></td>
            <td><?php if($sponsor['degree_of_care'] == 'A') {echo "Care1";}
                      elseif($sponsor['degree_of_care'] == 'B'){echo "Care2";}
                      elseif($sponsor['degree_of_care'] == 'C'){echo "Care3";} ?></td>
            <td><?php echo '<b>'.$sponsor['tournament'].'</b>' ?></td>
            <td class="manage_booking_action">
                <a href="edit_sponsor.php?action=edit&sponsor_id=<?php echo $sponsor['sponsor_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <!-- <a href="?action=delete&booking_id=<?php echo $sponsor['sponsor_id'] ?>" class="btn btn-sm btn-success">Cancel</a> -->
                <a href="?action=delete&sponsor_id=<?php echo $sponsor['sponsor_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
