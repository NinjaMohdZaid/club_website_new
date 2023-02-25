
  

<?php 

list($subscriptions,$search) = $obj->display_subscriptions($_REQUEST,$_SESSION['default_lang']);

if(isset($_GET['action'])){
    $get_id = $_GET['subscription_id'];
    if($_GET['action']=="activate"){
        if($obj->change_subscription_status($get_id,'A')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="disable"){
        if($obj->change_subscription_status($get_id,'D')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="delete"){
        if($obj->delete_subscription($get_id)){
            header('Location:'.$_REQUEST['return_url']);
        }
    }
}
?>

<?php if(!empty($subscriptions)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('subscription',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('description',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('validity',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('prices',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($subscriptions as $key => $subscription) { ?>
        <tr>
            <td><?php echo $subscription['subscription_id'] ?></td>
            <td><?php echo $subscription['subscription'] ?></td>
            <td><?php echo $subscription['description'] ?></td>
            <td><?php if($subscription['validity_months'] == '1') echo '1 '.$obj->__('month',$_SESSION['default_lang']);
                    elseif($subscription['validity_months'] == '2') echo '2 '.$obj->__('months',$_SESSION['default_lang']);
                    elseif($subscription['validity_months'] == '3') echo '3 '.$obj->__('months',$_SESSION['default_lang']);
                    elseif($subscription['validity_months'] == '6') echo '6 '.$obj->__('months',$_SESSION['default_lang']);
                    elseif($subscription['validity_months'] == '12') echo '1 '.$obj->__('year',$_SESSION['default_lang']); ?>
            </td>
            <td>د.إ
                <?php echo $subscription['price'] ?>
            </td>
            <td>
                <?php 
                    if($subscription['status']=="D")
                    {echo $obj->__('disabled',$_SESSION['default_lang']);
                ?> 
                    <a href="?action=activate&subscription_id=<?php echo $subscription['subscription_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success"><?php echo $obj->__('make_active',$_SESSION['default_lang']); ?></a>
                    <?php
                } 
                else{echo $obj->__('active',$_SESSION['default_lang']);
                
                ?>
                 <a href="?action=disable&subscription_id=<?php echo $subscription['subscription_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('make_disabled',$_SESSION['default_lang']); ?></a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td>
                <a href="edit_subscription.php?action=edit&subscription_id=<?php echo $subscription['subscription_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                <a href="?action=delete&subscription_id=<?php echo $subscription['subscription_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
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
