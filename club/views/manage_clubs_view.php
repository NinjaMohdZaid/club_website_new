
  

<?php 

list($clubs,$search) = $obj->display_clubs($_REQUEST,$_SESSION['default_lang']);

if(isset($_GET['action'])){
    $get_id = $_GET['club_id'];
    if($_GET['action']=="activate"){
        if($obj->change_club_status($get_id,'A')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="disable"){
        if($obj->change_club_status($get_id,'D')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="delete"){
        if($obj->delete_club($get_id)){
            header('Location:'.$_REQUEST['return_url']);
        }
    }
}
?>

<?php if(!empty($clubs)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <!-- <th>Club</th> -->
            <th>Club Image</th>
            <th>Details</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($clubs as $key => $club) { ?>
        <tr>
            <!-- <td><?php echo $club['club_id'] ?></td> -->
            <!-- <td><?php echo $club['club'] ?></td> -->
            <td><?php if(!empty($club['image_location'])){?>
                <img class="manage_club_img" src="<?php echo $club['image_location']?>" >
                <?php }?></td>
            <td><?php echo '<b>'.$club['club'].'</b><br>'.$club['address'].'<br> Contact Person : '.$club['city'].'<br> City : '.$club['city'].'<br> Email : <a href="mailto:'.$club['email'].'">'.$club['email'].'</a>'.'<br> Phone : <a href="tel:'.$club['phone'].'">'.$club['phone'].'</a>'.'<br> Website : <a target="__blank" href="'.$club['website'].'">'.$club['website'].'</a>'.'<br> Club Games/Activities : '.$club['activities_desc'].'<br> Club History : '.$club['history'].'<br> Club Trade License Copy : <a target="__blank" href="'.$club['licence_location'].'"><u>Click to Read</u></a>'; ?>
            </td>
            <td>
                <?php 
                    if($club['status']=="D")
                    {echo "Disabled";
                ?> 
                    <a href="?action=activate&club_id=<?php echo $club['club_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success">Make Active</a>
                    <?php
                } 
                else{echo "Active";
                
                ?>
                 <a href="?action=disable&club_id=<?php echo $club['club_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning">Make Disabled</a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td class="manage_club_action">
                <a href="edit_club.php?action=edit&club_id=<?php echo $club['club_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&club_id=<?php echo $club['club_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
