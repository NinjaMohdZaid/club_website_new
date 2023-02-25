<?php 
    if(!empty($_REQUEST['action']) && $_REQUEST['action']=='remove_game'){
        $obj->remove_game_from_club($_REQUEST['game_id'],$_SESSION['auth']['club_id']);
        header('Location:'.$_REQUEST['return_url']);
    }
    if(isset($_POST['add_games'])){
        if(!empty($_REQUEST['game_ids'])){            
            if($obj->update_club_games($_SESSION['auth']['club_id'],$_POST['game_ids'])){
                $rtnMsg = "Games added to the club";
            }else{
                $rtnMsg = "Failed to Add Games added to the club";
            }
        }else{
            $rtnMsg = "Failed to Add Games added to the club";
        }    
    }
    $club_data = $obj->display_clubByID($_SESSION['auth']['club_id']);
    $_params = ['exclude_game_ids' => $club_data['game_ids']];
    list($games,) = $obj->display_games($_params,$_SESSION['auth']['default_lang']);

?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<h2>Add Game Into Club</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>


<form action="" method="post" enctype="multipart/form-data">
    <?php 
        if(!empty($games)){
    ?>
    <div class="games_list">
        <label id="select_all" is_selected="N">Select All
        </label>
            <div class="leaved_game_list">
            <?php 
            foreach ($games as $key => $game) {
                echo '<label class="games">'.$game['game'].'
                <input type="checkbox" name="game_ids[]" class="check_game_input" value="'.$game['game_id'].'">
                <span class="checkmark"></span>
            </label>';
            }
            ?>
            </div>
        <input type="submit" value="Add Selected Game In Club" name="add_games" class="btn btn-primary" >
    </div>
    <?php
        }else{
        ?>
    <div>
        No Games Available to Choose For Your Club
    </div>
    <?php
        }
    ?>
    <!-- <div id="field_type_games">
        <?php

        if(!empty($_REQUEST['game_id'])){
            $game_data = $obj->display_gameByID($_REQUEST['game_id'],$_SESSION['default_lang']);
            // die(var_dump($game_data));
            if($game_data['field_type'] == 'T')
            {
                ?>
                <label for="game_id"><b>Add Table</b></label>
                <div class="appending_div">
                    <div class="form-group">
                        Table Photo: <input type="file" name="table[0][photo]">&nbsp; Price(AED): <input type="number" name="table[0][price]" step=".01">
                    </div>
                </div>  
                <div class="add-more-button">
                    Add More Tables: <span class="fa fa-plus add"></span>
                </div>
            <?php 
            }
        } 
        ?>
    </div>     -->

</form>
<script>
    $(document).ready(function() {
        // var i = 1;
        // $('.add').on('click', function() {
        //     var field = '<div class="form-group">Table Photo: <input type="file" name="table['+i+'][photo]">&nbsp; Price(AED): <input type="number" name="table['+i+'][price]" step=".01"></div>';
        //     $('.appending_div').append(field);
        //     i = i+1;
        // })
        $("#select_all").on('click',function () {
            if($(this).attr('is_selected') == 'N'){
                $('#select_all').text('Unselect All');
                $(this).attr('is_selected',"Y");
            }else{
                $(this).attr('is_selected',"N");
                $('#select_all').text('Select All');
            }
            $('.check_game_input').click();
        });
        //onchange game 
        //     $('#game_id').change(function(){
        //         let game_id = this.value;
        //         $.get("add_game.php?game_id="+game_id,
        //         function(data){
        //             $('html').replaceWith(data);
        //         }
        //     );
        // });
    })
</script>
<style>
    .add-more-button{
        margin-bottom: 1.25em;
        color: #b5aeae;
    }
    .add-more-button{
        margin-bottom: 1.25em;
        color: #b5aeae;
    }
    .games_games{
        margin-bottom: 1.25em;
    }
    .games{
        display:flex;
    }
    .games {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 17px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.games input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.games:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.games input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.games input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.games .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.leaved_game_list{
    overflow: auto;
    max-height: 400px;
    border: 1px solid #4197f9;
    padding: 8px;
    border-radius: 3px;
}
</style>    