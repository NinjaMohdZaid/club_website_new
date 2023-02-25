
  

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
            <th><?php echo $obj->__('club_image',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('details',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($clubs as $key => $club) { ?>
        <tr>
            <td><?php if(!empty($club['image'])){?>
                <img class="manage_club_img" src="<?php echo '../assets/files/clubs/images/'.$club['club_id'].'/'.$club['image']?>" >
                <?php }?></td>
            <td><?php echo '<b>'.$club['club'].'</b><br>'.$club['address'].'<br> Contact Person : '.$club['city'].'<br> City : '.$club['city'].'<br> Email : <a href="mailto:'.$club['email'].'">'.$club['email'].'</a>'.'<br> Phone : <a href="tel:'.$club['phone'].'">'.$club['phone'].'</a>'.'<br> Website : <a target="__blank" href="'.$club['website'].'">'.$club['website'].'</a>'.'<br> Club Games/Activities : '.$club['activities_desc'].'<br> Club History : '.$club['history'].'<br> Club Trade License Copy : <a target="__blank" href="../assets/files/clubs/images/'.$club['club_id'].'/'.$club['licence'].'"><u>Click to Read</u></a>'; ?>
            </td>
            <td>
                <?php 
                    if($club['status']=="D")
                    {echo $obj->__('make_disabled',$_SESSION['default_lang']);
                ?> 
                    <a href="?action=activate&club_id=<?php echo $club['club_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success"><?php echo $obj->__('make_active',$_SESSION['default_lang']); ?></a>
                    <?php
                } 
                else{echo $obj->__('active',$_SESSION['default_lang']);
                
                ?>
                 <a href="?action=disable&club_id=<?php echo $club['club_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('make_disabled',$_SESSION['default_lang']); ?></a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td class="manage_club_action">
                <a href="edit_club.php?action=edit&club_id=<?php echo $club['club_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                <a href="?action=delete&club_id=<?php echo $club['club_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
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
   <?php echo $obj->__('no_data_found',$_SESSION['default_lang']); ?>
</div>
<?php  } ?>
