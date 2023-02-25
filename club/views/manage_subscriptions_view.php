
  

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
            <th>ID</th>
            <th>Subscription</th>
            <th>Description</th>
            <th>Validity</th>
            <th>Prices</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($subscriptions as $key => $subscription) { ?>
        <tr>
            <td><?php echo $subscription['subscription_id'] ?></td>
            <td><?php echo $subscription['subscription'] ?></td>
            <td><?php echo $subscription['description'] ?></td>
            <td><?php if($subscription['validity_months'] == '1') echo '1 Month';
                    elseif($subscription['validity_months'] == '2') echo '2 Months';
                    elseif($subscription['validity_months'] == '3') echo '3 Months';
                    elseif($subscription['validity_months'] == '6') echo '6 Months';
                    elseif($subscription['validity_months'] == '12') echo '1 Year'; ?>
            </td>
            <td>د.إ
                <?php echo $subscription['price'] ?>
            </td>
            <td>
                <?php 
                    if($subscription['status']=="D")
                    {echo "Disabled";
                ?> 
                    <a href="?action=activate&subscription_id=<?php echo $subscription['subscription_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success">Make Active</a>
                    <?php
                } 
                else{echo "Active";
                
                ?>
                 <a href="?action=disable&subscription_id=<?php echo $subscription['subscription_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning">Make Disabled</a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td>
                <a href="edit_subscription.php?action=edit&subscription_id=<?php echo $subscription['subscription_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&subscription_id=<?php echo $subscription['subscription_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
