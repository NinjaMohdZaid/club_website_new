
  

<?php 
list($sponsors,$search) = $obj->display_sponsors($_REQUEST,$_SESSION['auth']['default_lang']);

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
    <h2>Club Sponsors</h2>

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
