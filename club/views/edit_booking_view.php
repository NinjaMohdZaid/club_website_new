<?php 

    if(isset($_GET['action'])){
        if($_GET['action']=='edit'){
            $booking_id = $_GET['booking_id'];
            $booking_data = $obj->display_bookingByID($booking_id,$_SESSION['default_lang']);
        }
    }

    if(isset($_POST['edit_booking'])){
        $up_msg = $obj->update_booking($_POST,$_SESSION['default_lang']);
    }
    list($games) = $obj->display_games(['status'=>'A'], $_SESSION['default_lang']);
    list($clubs) = $obj->display_clubs(['status'=>'A'], $_SESSION['default_lang']);
?>


<h2>Update Booking</h2>

<h4 class="text-success"> <?php if(isset($up_msg)){ echo $up_msg; } ?> 

</h4>
<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="booking_id" value="<?php echo $booking_data['booking_id'] ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $booking_data['name'] ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email"  value="<?php echo $booking_data['email'] ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone"  value="<?php echo $booking_data['phone'] ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="game_id">Game</label>
        <select name="game_id" class="form-control" required <?php if(empty($games)) echo 'disabled'; ?>>
            <?php foreach ($games as $game) { ?>
                <option value="<?php echo $game['game_id'] ?>" <?php if($game['game_id']==$booking_data['game_id']) echo 'selected'; ?>   ><?php echo $game['game'] ?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label for="club_id">Club</label>
        <select name="club_id" class="form-control" required <?php if(empty($clubs)) echo 'disabled'; ?>>
            <?php foreach ($clubs as $club) { ?>
                <option value="<?php echo $club['club_id'] ?>" <?php if($club['club_id']==$booking_data['club_id']) echo 'selected'; ?>  ><?php echo $club['club'] ?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label for="booking_from">Booking From</label>
        <input type="datetime-local" required name="booking_from" value="<?php echo date("Y-m-d\TH:i:s", $booking_data['booking_from']) ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="booking_to">Booking To</label>
        <input type="datetime-local" required name="booking_to" value="<?php echo date("Y-m-d\TH:i:s", $booking_data['booking_to']) ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="0.01" required name="price" value="<?php echo $booking_data['price'] ?>" class="form-control">
    </div>

    <input type="submit" value="Edit Booking" name="edit_booking" class="btn btn-primary" >

</form>