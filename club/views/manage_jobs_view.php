
  

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
$_REQUEST['club_id'] = $_SESSION['auth']['club_id'];
list($jobs,$search) = $obj->display_jobs($_REQUEST,$_SESSION['auth']['default_lang']);
?>

<?php if(!empty($jobs)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Job Details</th>
            <th>Status</th>
            <th>Action</th>
            <th>Applied By</th>
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
                    {echo "Disabled";
                ?> 
                    <a href="?action=activate&job_id=<?php echo $job['job_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-success">Make Active</a>
                    <?php
                } 
                else{echo "Active";
                
                ?>
                 <a href="?action=disable&job_id=<?php echo $job['job_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-warning">Make Disabled</a>
                    <?php 
                }  
                
                ?>
            
            </td>
            <td>
                <a href="edit_job.php?action=edit&job_id=<?php echo $job['job_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?action=delete&job_id=<?php echo $job['job_id'] ?>&return_url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
            <td><a href="job_applicant_list.php?job_id=<?php echo $job['job_id']; ?>">Total 5 Applicants</a></td>
           
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
