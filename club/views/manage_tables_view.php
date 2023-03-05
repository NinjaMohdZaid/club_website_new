<?php 
    if(isset($_GET['action'])){
        $table_id = $_GET['table_id'];
        if($_GET['action']=="delete"){
            if($obj->delete_table($table_id)){
                $rtnMsg = $obj->__('deleted_successfully',$_SESSION['auth']['default_lang']);;
            }else{
                $rtnMsg = $obj->__('not_deleted_successfully',$_SESSION['auth']['default_lang']);;
            }
                
        }
    }
    $game_data = $obj->display_gameByID($_REQUEST['game_id'], $_SESSION['auth']['default_lang']);
    list($tables,$search) = $obj->display_tables($_REQUEST,$_REQUEST['game_id'],$_SESSION['auth']['club_id'],$_SESSION['auth']['default_lang']);
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 
</h4>
<h2><?php echo $obj->__('tables_for',$_SESSION['auth']['default_lang']); ?> <?php echo $game_data['game'] ?></h2>
<a href="add_table.php?game_id=<?php echo $_REQUEST['game_id']; ?>" class="btn btn-primary">+ <?php echo $obj->__('add_table',$_SESSION['auth']['default_lang']); ?></a>
<table class="table table-striped">
    <?php
       if(!empty($tables)){
    ?>
    <thead>
        <tr>
            <th><?php echo $obj->__('id',$_SESSION['auth']['default_lang']); ?></th>
            <th>&nbsp;</th>
            <th><?php echo $obj->__('table',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('price',$_SESSION['auth']['default_lang']); ?></th>
            <th><?php echo $obj->__('action',$_SESSION['auth']['default_lang']); ?></th>
        </tr>
    </thead>

    <tbody>
       
       <?php
       foreach ($tables as $key => $table) { ?>
        <tr>
            <td><?php echo $table['table_id'] ?></td>
            <td><?php if(!empty($table['image'])){?>
                <img src="<?php echo '../assets/files/tables/images/'.$table['table_id'].'/'. $table['image']?>" style="width: 80px;" >
                <?php }?></td> 
            <td><?php echo $table['table_name'] ?></td>
            <td><?php echo $table['price'] ?></td>
            <td class="manage_club_action">
                <a href="edit_table.php?action=edit&table_id=<?php echo $table['table_id'] ?>" class="btn btn-sm btn-warning"><?php echo $obj->__('edit',$_SESSION['auth']['default_lang']); ?></a>
                <a href="?action=delete&table_id=<?php echo $table['table_id'] ?>&game_id=<?php echo $_REQUEST['game_id'] ?>" class="btn btn-sm btn-danger"><?php echo $obj->__('delete',$_SESSION['auth']['default_lang']); ?></a>
                <a href="add_booking.php?table_id=<?php echo $table['table_id'] ?>" class="btn btn-sm btn-info"><?php echo $obj->__('book_now',$_SESSION['auth']['default_lang']); ?></a>
            </td>
                      
        </tr>
        <?php 
            }
        }else{ 
        ?>
        <p><?php echo $obj->__('no_table_available',$_SESSION['auth']['default_lang']); ?></p>
        <?php
            }
        ?>
       
    </tbody>
</table>

