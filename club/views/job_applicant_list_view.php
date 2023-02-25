
  

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
list($job_applicants,$search) = $obj->display_job_applicants($_REQUEST['job_id'],$_SESSION['auth']['default_lang']);
?>

<?php if(!empty($job_applicants)) { ?>
<div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Applicant Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>CV</th>
        </tr>
    </thead>

    <tbody>
       <?php foreach ($job_applicants as $key => $job_applicants) { ?>
        <tr>
            <td><?php echo $job_applicants['applicant_id'] ?></td>
            <td><?php echo $job_applicants['name'] ?></td>
            <td><?php echo $job_applicants['phone'] ?></td>
            <td><?php echo $job_applicants['email'] ?></td>
            <td><a href="#">Download</a></td>
           
        </tr>
        <?php 
            }
        ?>
       
    </tbody>
</table>
</div>
<?php  }else{ ?>
<div>
    No Applicant Found
</div>
<?php  } ?>
