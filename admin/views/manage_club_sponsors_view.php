
  

<?php 
list($sponsors,$search) = $obj->display_sponsors($_REQUEST,$_SESSION['default_lang']);

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
    <h2><?php echo $obj->__('club_sponsors',$_SESSION['default_lang']); ?></h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('name',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('about',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('care_value',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('degree',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('type',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('tournament',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($sponsors as $key => $sponsor) { ?>
        <tr>
            <td><?php echo '#<b>'.$sponsor['sponsor_id'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['sponsor_name'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['sponsor_about'].'</b>' ?></td>
            <td><?php echo '<b>'.$sponsor['care_value'].'</b>' ?></td>
            <td><?php if($sponsor['sponsor_type'] == 'A') {echo $obj->__('degree',$_SESSION['default_lang'])."1";}
                      elseif($sponsor['sponsor_type'] == 'B'){echo $obj->__('degree',$_SESSION['default_lang'])."2";}
                      elseif($sponsor['sponsor_type'] == 'C'){echo $obj->__('degree',$_SESSION['default_lang'])."3";} ?></td>
            <td><?php if($sponsor['degree_of_care'] == 'A') {echo $obj->__('care',$_SESSION['default_lang'])."1";}
                      elseif($sponsor['degree_of_care'] == 'B'){echo $obj->__('care',$_SESSION['default_lang'])."2";}
                      elseif($sponsor['degree_of_care'] == 'C'){echo $obj->__('care',$_SESSION['default_lang'])."3";} ?></td>
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
<?php echo $obj->__('no_data_found',$_SESSION['default_lang']); ?>
</div>
<?php  } ?>
