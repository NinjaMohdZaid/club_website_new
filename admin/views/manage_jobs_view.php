
  

<?php 


if(isset($_GET['action'])){
    $get_id = $_GET['job_id'];
    if($_GET['action']=="activate"){
        if($obj->change_job_status($get_id,'A')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="disable"){
        if($obj->change_job_status($get_id,'D')){
            header('Location:'.$_REQUEST['return_url']);
        }
    }elseif($_GET['action']=="delete"){
        if($obj->delete_job($get_id)){
            header('Location:'.$_REQUEST['return_url']);
        }
    }
}
list($jobs,$search) = $obj->display_jobs($_REQUEST,$_SESSION['default_lang']);

?>

<?php if(!empty($jobs)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('job_details',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('status',$_SESSION['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($jobs as $key => $job) { ?>
        <tr>
            <td><?php echo $job['job_id'] ?></td>
            <td><?php echo '<b>'. $job['job_position'].'</b><br>Job Description: '.$job['description'].'<br>Skills: '.$job['skills'].'<br>Salary: AED '.$job['salary'] ?></td>
            <td>
                <?php 
                    if($job['status']=="D")
                    {echo $obj->__('disabled',$_SESSION['default_lang']);
                ?> 
                    <a href="?action=activate&job_id=<?php echo $job['job_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success"><?php echo $obj->__('make_active',$_SESSION['default_lang']); ?></a>
                    <?php
                } 
                else{echo $obj->__('active',$_SESSION['default_lang']);
                
                ?>
                 <a href="?action=disable&job_id=<?php echo $job['job_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('make_disabled',$_SESSION['default_lang']); ?></a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td>
                <a href="edit_job.php?action=edit&job_id=<?php echo $job['job_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['default_lang']); ?></a>
                <a href="?action=delete&job_id=<?php echo $job['job_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['default_lang']); ?></a>
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
