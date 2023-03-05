<?php
class  adminback
{
    private $connection;
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "mysql";
        $dbname = "club_test2";

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->connection) {
            die("Databse connection error!!!");
        }
    }

    function admin_login($data)
    {
        $admin_email = $data["admin_email"];
        $admin_pass = md5($data['admin_pass']);

        $query = "SELECT * FROM `admin_info` WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $admin_info = mysqli_fetch_assoc($result);
            if ($admin_info) {
                session_start();
                $_SESSION['admin_id'] = $admin_info['admin_id'];
                $_SESSION['admin_email'] = $admin_info['admin_email'];
                $_SESSION['role'] = $admin_info['role'];
                $_SESSION['default_lang'] = $admin_info['default_lang'];
                header("location:dashborad.php");
            } else {
                $log_msg = "Email or password wrong";
                return $log_msg;
            }
        }
    }
    function club_login($data)
    {
        $email = $data["email"];
        $password = $data['password'];

        $query = "SELECT * FROM `clubs` WHERE email = '$email'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $club_data = mysqli_fetch_assoc($result);
            if (!empty($club_data) && (md5($password) === $club_data['password'])) {
                return $club_data;
            } else {
                return false;
            }
        }
    }

    function admin_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['role']);
        unset($_SESSION['default_lang']);
        header("location:index.php");
        session_destroy();
    }
    function set_deafult_language($default_lang, $admin_id)
    {
        $query = "UPDATE `admin_info` SET `default_lang`='$default_lang' WHERE `admin_id`= $admin_id";
        if (mysqli_query($this->connection, $query)) {
            $_SESSION['default_lang'] = $default_lang;
            $build_params = '';
            $request_keys = array_keys($_REQUEST);
            $request_values = array_values($_REQUEST);
            foreach ($request_keys as $key => $request_key) {
                if ($request_key != 'set_default_language') {
                    $build_params .= "$request_key=" . $request_values[$key] . "&";
                }
            }
            header("location:" . $_SERVER['PHP_SELF'] . '?' . $build_params);
            return true;
        } else {
            return false;
        }
    }
    function set_club_deafult_language($default_lang, $club_id)
    {
        $query = "UPDATE `clubs` SET `default_lang`='$default_lang' WHERE `club_id`= $club_id";
        if (mysqli_query($this->connection, $query)) {
            $_SESSION['auth']['default_lang'] = $default_lang;
            $build_params = '';
            $request_keys = array_keys($_REQUEST);
            $request_values = array_values($_REQUEST);
            foreach ($request_keys as $key => $request_key) {
                if ($request_key != 'set_default_language') {
                    $build_params .= "$request_key=" . $request_values[$key] . "&";
                }
            }
            header("location:" . $_SERVER['PHP_SELF'] . '?' . $build_params);
            return true;
        } else {
            return false;
        }
    }

    function admin_password_recover($recover_email)
    {
        $query = "SELECT * FROM `admin_info` WHERE `admin_email`='$recover_email'";
        if (mysqli_query($this->connection, $query)) {
            $row =  mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function update_admin_password($data)
    {
        $u_admin_id = $data['admin_update_id'];
        $u_admin_pass = md5($data['admin_update_password']);

        $query = "UPDATE `admin_info` SET `admin_pass`='$u_admin_pass' WHERE `admin_id`= $u_admin_id";

        if (mysqli_query($this->connection, $query)) {
            $update_mag = "You password updated successfull";
            return $update_mag;
        } else {
            return "Failed";
        }
    }

    function add_admin_user($data, $lang_code = 'en')
    {
        $user_email = $data['user_name'];
        $user_pass = md5($data['user_password']);
        $user_role = $data['user_role'];

        $query = "INSERT INTO `admin_info`( `admin_email`, `admin_pass`, `role`,`default_lang`) VALUES ('$user_email','$user_pass','$user_role','$lang_code')";

        if (mysqli_query($this->connection, $query)) {
            $msg = "{$user_email} add as a user successfully";
            return $msg;
        }
    }

    function show_admin_user()
    {
        $query = "SELECT * FROM `admin_info`";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_admin_user_by_id($user_id)
    {
        $query = "SELECT * FROM `admin_info` WHERE `admin_id`=$user_id";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function update_admin($data)
    {
        $u_id = $data['user_id'];
        $u_email = $data['u-user-email'];
        $u_role = $data['u_user_role'];
        $query = "UPDATE `admin_info` SET `admin_email`='$u_email',`role`= $u_role WHERE `admin_id`= $u_id ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "Udated successfully";
            return $up_msg;
        }
    }

    function delete_admin($admin_id)
    {
        $query = "DELETE FROM `admin_info` WHERE `admin_id`=$admin_id";
        if (mysqli_query($this->connection, $query)) {
            $del_msg = "User Deleted Successfully";
            return $del_msg;
        }
    }

    function add_category($data)
    {
        $languages = array('en', 'ar');
        $category = $data['category'];
        $description = $data['description'];
        $status = $data['status'];

        $query = "INSERT INTO `categories`(`status`) VALUES ('$status')";

        if (mysqli_query($this->connection, $query)) {
            $category_id = $this->connection->insert_id; //category_id
            $category = $data['category'];
            $description = $data['description'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `category_descriptions`( `category_id`,`category`,`description`,`lang_code`) VALUES ('$category_id','$category','$description','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if(!empty($result)){
                return $category_id;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
    function update_subscription($data, $lang_code = 'en')
    {
        $subscription_id = $data['subscription_id'];
        $validity_months = $data['validity_months'];
        $price = $data['price'];
        $status = $data['status'];
        $query = "UPDATE `subscriptions` SET `validity_months`='$validity_months',`price`='$price',`status`= '$status' WHERE `subscription_id` = '$subscription_id'";
        if (mysqli_query($this->connection, $query)) {
            $subscription = $data['subscription'];
            $description = $data['description'];
            $query = "REPLACE INTO subscription_descriptions(`subscription_id`,`subscription`,`description`,`lang_code`) VALUES('$subscription_id','$subscription','$description','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                return "{$subscription} update as a subscription successfully!!";
            } else {
                return "Failed to update subscription";
            }
        }
    }
    function add_subscription($data)
    {
        $validity_months = $data['validity_months'];
        $price = $data['price'];
        $status = $data['status'];
        $timestamp = time();
        $languages = array('en', 'ar');

        $query = "INSERT INTO `subscriptions`( `validity_months`,`price`, `status`, `timestamp`) VALUES ('$validity_months','$price', '$status','$timestamp')";
        if (mysqli_query($this->connection, $query)) {
            $subscription_id = $this->connection->insert_id; //game_id
            $subscription = $data['subscription'];
            $description = $data['description'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `subscription_descriptions`( `subscription_id`,`subscription`,`description`,`lang_code`) VALUES ('$subscription_id','$subscription','$description','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if ($result) {
                return "{$subscription} added as a subscription successfully!!";
            } else {
                return "Failed to add subscription";
            }
        } else {
            return "Failed to add subscription";
        }
    }
    function add_table($data,$game_id,$club_id)
    {
        $price = $data['price'];
        $languages = array('en', 'ar');

        $query = "INSERT INTO `game_tables`( `game_id`,`club_id`, `price`) VALUES ('$game_id','$club_id','$price')";
        if (mysqli_query($this->connection, $query)) {
            $table_id = $this->connection->insert_id; //table_id
            $table_name = $data['table_name'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `game_table_descriptions`( `table_id`,`table_name`,`lang_code`) VALUES ('$table_id','$table_name','$lang_code')";
                $result = mysqli_query($this->connection, $query);
                if(!empty($result)){
                    if (!empty($_FILES['banner']['name'])) {
                        //image upload
                        $target_dir = "../assets/files/tables/images/$table_id";
                        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                        $this->upload_image($target_dir . '/');
                    }
                }
            }
            if ($result) {
                return $table_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function add_ground($data,$game_id,$club_id)
    {
        $price = $data['price'];
        $languages = array('en', 'ar');

        $query = "INSERT INTO `game_grounds`( `game_id`,`club_id`, `price`) VALUES ('$game_id','$club_id','$price')";
        if (mysqli_query($this->connection, $query)) {
            $ground_id = $this->connection->insert_id; //ground_id
            $ground_name = $data['ground_name'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `game_ground_descriptions`( `ground_id`,`ground_name`,`lang_code`) VALUES ('$ground_id','$ground_name','$lang_code')";
                $result = mysqli_query($this->connection, $query);
                if(!empty($result)){
                    if (!empty($_FILES['banner']['name'])) {
                        //image upload
                        $target_dir = "../assets/files/grounds/images/$ground_id";
                        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                        $this->upload_image($target_dir . '/');
                    }
                }
            }
            if ($result) {
                return $ground_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function add_pitch($data,$game_id,$club_id)
    {
        $price = $data['price'];
        $languages = array('en', 'ar');

        $query = "INSERT INTO `game_pitches`( `game_id`,`club_id`, `price`) VALUES ('$game_id','$club_id','$price')";
        if (mysqli_query($this->connection, $query)) {
            $pitch_id = $this->connection->insert_id; //pitch_id
            $pitch_name = $data['pitch_name'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `game_pitch_descriptions`( `pitch_id`,`pitch_name`,`lang_code`) VALUES ('$pitch_id','$pitch_name','$lang_code')";
                $result = mysqli_query($this->connection, $query);
                if(!empty($result)){
                    if (!empty($_FILES['banner']['name'])) {
                        //image upload
                        $target_dir = "../assets/files/pitches/images/$pitch_id";
                        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                        $this->upload_image($target_dir . '/');
                    }
                }
            }
            if ($result) {
                return $pitch_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function add_game_membership($data,$game_id,$club_id)
    {
        $price = $data['price'];
        $months = $data['months'];
        $languages = array('en', 'ar');

        $query = "INSERT INTO `game_memberships`( `game_id`,`club_id`,`months`,`price`) VALUES ('$game_id','$club_id','$months','$price')";
        if (mysqli_query($this->connection, $query)) {
            $membership_id = $this->connection->insert_id; //membership_id
            $membership_name = $data['membership_name'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `game_membership_descriptions`( `membership_id`,`membership_name`,`lang_code`) VALUES ('$membership_id','$membership_name','$lang_code')";
                $result = mysqli_query($this->connection, $query);
                if(!empty($result)){
                    if (!empty($_FILES['banner']['name'])) {
                        //image upload
                        $target_dir = "../assets/files/memberships/images/$membership_id";
                        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                        $this->upload_image($target_dir . '/');
                    }
                }
            }
            if ($result) {
                return $membership_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    function add_booking($data)
    {
        $price = 0;
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $game_id = $data['game_id'];
        $club_id = $data['club_id'];
        $object = $data['object'];
        $object_id = $data['object_id'];
        $booking_from = strtotime($data['booking_from']);
        $booking_to = strtotime($data['booking_to']);
        $timestamp = time();
        if($object == 'T'){
            $table_data = $this->display_tableByID($object_id);
            $game_data = $this->display_gameByID($game_id);
            if($game_data['booking_by'] == 'T'){
                //booking by time
                $diff = strtotime($data['booking_to']) - strtotime($data['booking_from']);
                $no_of_hours   = floor($diff/(60*60));
                $price_for_one_hour = $table_data['price']/$game_data['time_slot']; //price for one hour
                $price = $no_of_hours*$price_for_one_hour;//total price
            }
        }elseif($object == 'G'){
            $ground_data = $this->display_groundByID($object_id);
            $game_data = $this->display_gameByID($game_id);
            if($game_data['booking_by'] == 'T'){
                //booking by time
                $diff = strtotime($data['booking_to']) - strtotime($data['booking_from']);
                $no_of_hours   = floor($diff/(60*60));
                $price_for_one_hour = $ground_data['price']; //price for one hour
                $price = $no_of_hours*$price_for_one_hour;//total price
            }
        }elseif($object == 'P'){
            $ground_data = $this->display_pitchByID($object_id);
            $game_data = $this->display_gameByID($game_id);
            if($game_data['booking_by'] == 'T'){
                //booking by time
                $diff = strtotime($data['booking_to']) - strtotime($data['booking_from']);
                $no_of_hours   = floor($diff/(60*60));
                $price_for_one_hour = $ground_data['price']; //price for one hour
                $price = $no_of_hours*$price_for_one_hour;//total price
            }
        }elseif($object == 'M'){
            $membership_data = $this->display_game_membershipByID($object_id);
            $game_data = $this->display_gameByID($game_id);
            if($game_data['booking_by'] == 'M'){
                //booking by time
                $diff = strtotime($data['booking_to']) - strtotime($data['booking_from']);
                $no_of_hours   = floor($diff/(60*60));
                $no_of_months = $no_of_hours/730.5;
                $price_for_one_month=$membership_data['price']/$membership_data['months'];
                $price = $no_of_months*$price_for_one_month;//total price
            }
        }

        $query = "INSERT INTO `bookings`( `name`,`email`, `phone`,`game_id`,`club_id`,`price`,`booking_from`,`booking_to`, `timestamp`,`object`,`object_id`) VALUES ('$name','$email', '$phone','$game_id','$club_id','$price','$booking_from','$booking_to','$timestamp','$object','$object_id')";
        if (mysqli_query($this->connection, $query)) {
            $booking_id = $this->connection->insert_id; //
            return $booking_id;
        } else {
            return false;
        }
    }
    function add_club($data)
    {
        $address = $data['address'];
        $city = $data['city'];
        $contact_person = $data['contact_person'];
        $email = $data['email'];
        $phone = $data['phone'];
        $website = $data['website'];
        $status = $data['status'];
        $password = md5($data['password']);
        $subscription_id = $data['subscription_id'];
        $licence_expiry = strtotime($data['licence_expiry']);
        $timestamp = time();
        $languages = array('en', 'ar');
        $query = "INSERT INTO `clubs`( `address`,`city`, `contact_person`, `email`,`phone`,`website`,`status`,`password`,`timestamp`,`licence_expiry`,`subscription_id`) VALUES ('$address','$city', '$contact_person','$email','$phone','$website','$status','$password','$timestamp','$licence_expiry','$subscription_id')";
        if(mysqli_query($this->connection, $query)) {
            $club_id = $this->connection->insert_id; //cpasswordlub_id
            $club = $data['club'];
            $activities_desc = $data['activities_desc'];
            $history = $data['history'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `club_descriptions`( `club_id`,`club`,`activities_desc`,`history`,`lang_code`) VALUES ('$club_id','$club','$activities_desc','$history','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if ($result) {
                if (!empty($_FILES['banner']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/clubs/images/$club_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_image($target_dir . '/');
                }
                if (!empty($_FILES['licence_copy']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/clubs/licence_copies/$club_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_licence_copy($target_dir . '/');
                }
                if (!empty($_FILES['multiple_images']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/clubs/multi_images/$club_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_multiple_image($target_dir . '/');
                }
                
                if (!empty($_FILES['video']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/clubs/videos/$club_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_video($target_dir . '/');
                }
                return $club_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function add_translation($data,$lang_code)
    {
        $language_variable = $data['language_variable'];
        $translation = $data['translation'];
        $query = "INSERT INTO `translations`( `language_variable`,`translation`,`lang_code`) VALUES ('$language_variable','$translation','$lang_code')";
        if(mysqli_query($this->connection, $query)) {
            $translation_id = $this->connection->insert_id; 
            return $translation_id;
        } else {
            return false;
        }
    }
    function update_club($data, $lang_code = 'en')
    {
        $club_id = $data['club_id'];
        $address = $data['address'];
        $city = $data['city'];
        $contact_person = $data['contact_person'];
        $email = $data['email'];
        $phone = $data['phone'];
        $website = $data['website'];
        $status = $data['status'];
        if ($data['saved_hash_pass'] == $data['password']) {
            $password = $data['password'];
        } else {
            $password = md5($data['password']);
        }
        $licence_expiry = strtotime($data['licence_expiry']);
        $query = "UPDATE `clubs` SET `address`='$address',`city`='$city',`contact_person`='$contact_person',`email`='$email',`phone`='$phone',`website`='$website',`status`= '$status',`password`='$password',`licence_expiry`='$licence_expiry' WHERE `club_id` = '$club_id'";
        if (mysqli_query($this->connection, $query)) {
            $club = $data['club'];
            $activities_desc = $data['activities_desc'];
            $history = $data['history'];
            $query = "REPLACE INTO club_descriptions(`club_id`,`club`,`activities_desc`,`history`,`lang_code`) VALUES('$club_id','$club','$activities_desc','$history','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/clubs/images/$club_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                if (!empty($_FILES['licence_copy']['name'])) {
                    $target_dir = "../assets/files/clubs/licence_copies/$club_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_licence_copy($target_dir . '/');
                }
                if (!empty($_FILES['video']['name'])) {
                    $target_dir = "../assets/files/clubs/videos/$club_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_video($target_dir . '/');
                }
                  
                if (!empty($_FILES['multiple_images']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/clubs/multi_images/$club_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_multiple_image($target_dir . '/');
                }
                return "{$club} update as a club successfully!";
            } else {
                return "Failed to update club";
            }
        }
    }
    function update_table($data, $lang_code = 'en')
    {
        $table_id = $data['table_id'];
        $price = $data['price'];
        $query = "UPDATE `game_tables` SET `price`='$price' WHERE `table_id` = '$table_id'";
        if (mysqli_query($this->connection, $query)) {
            $table_name = $data['table_name'];
            $query = "REPLACE INTO game_table_descriptions(`table_id`,`table_name`,`lang_code`) VALUES('$table_id','$table_name','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/tables/images/$table_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                return true;
            } else {
                return false;
            }
        }
    }
    function update_game_membership($data, $lang_code = 'en')
    {
        $membership_id = $data['membership_id'];
        $price = $data['price'];
        $months = $data['months'];
        $query = "UPDATE `game_memberships` SET `price`='$price',`months`='$months' WHERE `membership_id` = '$membership_id'";
        if (mysqli_query($this->connection, $query)) {
            $membership_name = $data['membership_name'];
            $query = "REPLACE INTO game_membership_descriptions(`membership_id`,`membership_name`,`lang_code`) VALUES('$membership_id','$membership_name','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/memberships/images/$membership_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                return true;
            } else {
                return false;
            }
        }
    }
    function update_ground($data, $lang_code = 'en')
    {
        $ground_id = $data['ground_id'];
        $price = $data['price'];
        $query = "UPDATE `game_grounds` SET `price`='$price' WHERE `ground_id` = '$ground_id'";
        if (mysqli_query($this->connection, $query)) {
            $ground_name = $data['ground_name'];
            $query = "REPLACE INTO game_ground_descriptions(`ground_id`,`ground_name`,`lang_code`) VALUES('$ground_id','$ground_name','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/grounds/images/$ground_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                return true;
            } else {
                return false;
            }
        }
    }
    function update_pitch($data, $lang_code = 'en')
    {
        $pitch_id = $data['pitch_id'];
        $price = $data['price'];
        $query = "UPDATE `game_pitches` SET `price`='$price' WHERE `pitch_id` = '$pitch_id'";
        if (mysqli_query($this->connection, $query)) {
            $pitch_name = $data['pitch_name'];
            $query = "REPLACE INTO game_pitch_descriptions(`pitch_id`,`pitch_name`,`lang_code`) VALUES('$pitch_id','$pitch_name','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/grounds/images/$pitch_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                return true;
            } else {
                return false;
            }
        }
    }
    function add_job($data)
    {
        $type = $data['type'];
        $salary = $data['salary'];
        $show_company_name = $data['show_company_name'];
        $timestamp = time();
        $status = $data['status'];
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $languages = array('en', 'ar');
        // $this->fn_print_die($data);
        $query = "INSERT INTO `jobs`( `type`,`salary`, `show_company_name`,`status`, `timestamp`,`club_id`) VALUES ('$type','$salary','$status','$show_company_name','$timestamp','$club_id')";
        if (mysqli_query($this->connection, $query)) {
            $job_id = $this->connection->insert_id; //job_id
            $job_position = $data['job_position'];
            $description = $data['description'];
            $skills = $data['skills'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `job_descriptions`( `job_id`,`job_position`,`description`,`skills`,`lang_code`) VALUES ('$job_id','$job_position','$description','$skills','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if ($result) {
                return "{$job_position} added as a job successfully!!";
            } else {
                return "Failed to add job";
            }
        } else {
            return "Failed to add job";
        }
    }
    function add_game($data)
    {
        $booking_by = $data['booking_by'];
        $min_players = $data['min_players'];
        $field_type = $data['field_type'];
        $status = $data['status'];
        $time_slot = $data['booking_by'] == 'T' ? $data['time_slot'] : 0;
        $subscription_type = $data['booking_by'] == 'S' ? $data['subscription_type'] : '';
        $timestamp = time();
        $languages = array('en', 'ar');

        $query = "INSERT INTO `games`( `booking_by`,`min_players`,`field_type`, `status`, `timestamp`,`time_slot`,`subscription_type`) VALUES ('$booking_by','$min_players','$field_type','$status','$timestamp','$time_slot','$subscription_type')";
        if (mysqli_query($this->connection, $query)) {
            $game_id = $this->connection->insert_id; //game_id
            $game = $data['game'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `game_descriptions`( `game_id`,`game`,`lang_code`) VALUES ('$game_id','$game','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if (!empty($result)) {
                if (!empty($_FILES['banner']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/games/images/$game_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_image($target_dir . '/');
                }
                return "{$game} added as a game successfully!!";
            } else {
                return "Failed to add game";
            }
        } else {
            return "Failed to add game";
        }
    }
    function update_game($data, $lang_code = 'en')
    {
        $game_id = $data['game_id'];
        $booking_by = $data['booking_by'];
        $min_players = $data['min_players'];
        $field_type = $data['field_type'];
        $status = $data['status'];
        $time_slot = ($data['booking_by'] == 'T') ? $data['time_slot'] : 0;
        $subscription_type = ($data['booking_by'] == 'S') ? $data['subscription_type'] : '';
        $query = "UPDATE `games` SET `booking_by`='$booking_by',`subscription_type`='$subscription_type',`time_slot`='$time_slot',`field_type`='$field_type',`min_players`='$min_players',`status`= '$status' WHERE `game_id` = '$game_id'";
        print_r($query);
        if (mysqli_query($this->connection, $query)) {
            $game = $data['game'];
            $query = "REPLACE INTO game_descriptions(`game_id`,`game`,`lang_code`) VALUES('$game_id','$game','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/games/images/$game_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                return $game_id;
            } else {
                return false;
            }
        }
    }
    function update_job($data, $lang_code = 'en')
    {
        $job_id = $data['job_id'];
        $type = $data['type'];
        $salary = $data['salary'];
        $show_company_name = !empty($data['show_company_name']) ? $data['show_company_name'] : 'N';
        $status = $data['status'];
        $query = "UPDATE `jobs` SET `type`='$type',`salary`='$salary',`show_company_name`='$show_company_name',`status`= '$status' WHERE `job_id` = '$job_id'";
        if (mysqli_query($this->connection, $query)) {
            $job_position = $data['job_position'];
            $description = $data['description'];
            $skills = $data['skills'];
            $query = "REPLACE INTO job_descriptions(`job_id`,`job_position`,`description`,`skills`,`lang_code`) VALUES('$job_id','$job_position','$description','$skills','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                return "{$job_position} update as a job successfully!!";
            } else {
                return "Failed to update job";
            }
        }
    }
    function update_booking($data, $lang_code = 'en')
    {
        $booking_id = $data['booking_id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $game_id = $data['game_id'];
        $club_id = $data['club_id'];
        $price = $data['price'];
        $booking_from = strtotime($data['booking_from']);
        $booking_to = strtotime($data['booking_to']);
        $query = "UPDATE `bookings` SET `name`='$name',`email`='$email',`phone`= '$phone',`game_id`= '$game_id',`club_id`= '$club_id',`price`= '$price',`booking_from`= '$booking_from',`booking_to`= '$booking_to' WHERE `booking_id` = '$booking_id'";
        if (mysqli_query($this->connection, $query)) {
            return "Booking update as a booking successfully!!";
        } else {
            return "Failed to update booking";
        }
    }

    function upload_image($target_dir)
    {
        // die(var_dump($_FILES));
        $target_file = $target_dir . basename($_FILES["banner"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["banner"]["tmp_name"]);
        if ($check !== false) {
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                return false;
                $uploadOk = 0;
            } else {
                move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file);
                return true;
                $uploadOk = 1;
            }
        } else {
            return false;
            $uploadOk = 0;
        }
    }
    function upload_video($target_dir)
    {
        $target_file = $target_dir . basename($_FILES["video"]["name"]);
        move_uploaded_file($_FILES["video"]["tmp_name"], $target_file);
        return true;
    }
    function upload_licence_copy($target_dir)
    {
        // die($target_dir);
        $target_file = $target_dir . basename($_FILES["licence_copy"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (
            $fileType != "pdf" && $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "gif"
        ) {
            return false;
            $uploadOk = 0;
        } else {
            move_uploaded_file($_FILES["licence_copy"]["tmp_name"], $target_file);
            return true;
            $uploadOk = 1;
        }
    }
    function display_clubs($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "clubs.*,club_descriptions.club,club_descriptions.activities_desc,club_descriptions.history";
        $condition .= " AND club_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN club_descriptions ON club_descriptions.club_id = clubs.club_id";
        if (!empty($params['club'])) {
            $condition .= " AND club_descriptions.club LIKE %" . trim($params['club']) . "%";
        }
        if (!empty($params['status'])) {
            $condition .= " AND clubs.status = '" . $params['status'] . "'";
        }
        if (!empty($params['club_ids'])) {
            $club_ids = $params['club_ids'];
            $condition .= " AND clubs.club_id IN($club_ids)";
        }
        $query = "SELECT $fields FROM clubs $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $clubs = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        foreach ($clubs as $key => &$club_data) {
            if (!empty($club_data)) {
                $dir = "../assets/files/clubs/images/" . $club_data['club_id'];
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $club_data['image'] = $image_data;
                    }
                }
                $dir = "../assets/files/clubs/licence_copies/" . $club_data['club_id'];
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $licence = reset($dir_data);
                    if (!empty($licence)) {
                        $club_data['licence'] = $licence;
                    }
                }
            }
        }
        return [!empty($clubs) ? $clubs : [], !empty($params) ? $params : []];
    }
    function display_translations($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "translations.*";
        $condition .= " AND translations.lang_code = '$lang_code'";
        $query = "SELECT $fields FROM translations $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $translations = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return [!empty($translations) ? $translations : [], !empty($params) ? $params : []];
    }
    function display_games($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "games.*,game_descriptions.game";
        $condition .= " AND game_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_descriptions ON game_descriptions.game_id = games.game_id";
        if (!empty($params['game'])) {
            $condition .= " AND game_descriptions.game LIKE %" . trim($params['game']) . "%";
        }
        if (!empty($params['status'])) {
            $condition .= " AND games.status = '" . $params['status'] . "'";
        }
        if (!empty($params['exclude_game_ids'])) {
            $game_ids = $params['exclude_game_ids'];
            $condition .= " AND games.game_id NOT IN($game_ids)";
        }
        if (!empty($params['game_ids'])) {
            $game_ids = $params['game_ids'];
            $condition .= " AND games.game_id IN($game_ids)";
        }
        $query = "SELECT $fields FROM games $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $games = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        if (!empty($games)) {
            foreach ($games as $key => &$game_data) {
                if (!empty($game_data)) {
                    $dir = "../assets/files/games/images/" . $game_data['game_id'];
                    if (is_dir($dir)) {
                        $dir_data = scandir($dir, 1);
                        $image_data = reset($dir_data);
                        if (!empty($image_data)) {
                            $game_data['image_location'] = $image_data;
                        }
                    }
                }
            }
        }
        return [!empty($games) ? $games : [], !empty($params) ? $params : []];
    }
    function display_tables($params = array(),$game_id,$club_id,$lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "game_tables.*,game_table_descriptions.table_name";
        $condition .= " AND game_table_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_table_descriptions ON game_table_descriptions.table_id = game_tables.table_id";
        if (!empty($params['table_name'])) {
            $condition .= " AND game_table_descriptions.table_name LIKE %" . trim($params['game']) . "%";
        }
        if (!empty($params['game_ids'])) {
            $game_ids = $params['game_ids'];
            $condition .= " AND game_tables.game_id IN($game_ids)";
        }
        
        $condition .= " AND game_tables.game_id = '$game_id'";
        $condition .= " AND game_tables.club_id = '$club_id'";

        $query = "SELECT $fields FROM game_tables $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $game_tables = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        foreach ($game_tables as $key => &$table) {
            if (!empty($table)) {
                $dir = "../assets/files/tables/images/" . $table['table_id'];
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $table['image'] = $image_data;
                    }
                }
            }
        }
        return [!empty($game_tables) ? $game_tables : [], !empty($params) ? $params : []];
    }
    function display_game_memberships($params = array(),$game_id,$club_id,$lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "game_memberships.*,game_membership_descriptions.membership_name";
        $condition .= " AND game_membership_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_membership_descriptions ON game_membership_descriptions.membership_id = game_memberships.membership_id";
        if (!empty($params['membership_name'])) {
            $condition .= " AND game_membership_descriptions.membership_name LIKE %" . trim($params['membership_name']) . "%";
        }
        if (!empty($params['game_ids'])) {
            $game_ids = $params['game_ids'];
            $condition .= " AND game_memberships.game_id IN($game_ids)";
        }
        
        $condition .= " AND game_memberships.game_id = '$game_id'";
        $condition .= " AND game_memberships.club_id = '$club_id'";

        $query = "SELECT $fields FROM game_memberships $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $game_memberships = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        foreach ($game_memberships as $key => &$membership) {
            if (!empty($membership)) {
                $dir = "../assets/files/memberships/images/" . $membership['membership_id'];
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $membership['image'] = $image_data;
                    }
                }
            }
        }
        return [!empty($game_memberships) ? $game_memberships : [], !empty($params) ? $params : []];
    }
    function display_grounds($params = array(),$game_id,$club_id,$lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "game_grounds.*,game_ground_descriptions.ground_name";
        $condition .= " AND game_ground_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_ground_descriptions ON game_ground_descriptions.ground_id = game_grounds.ground_id";
        if (!empty($params['ground_name'])) {
            $condition .= " AND game_ground_descriptions.ground_name LIKE %" . trim($params['game']) . "%";
        }
        if (!empty($params['game_ids'])) {
            $game_ids = $params['game_ids'];
            $condition .= " AND game_grounds.game_id IN($game_ids)";
        }
        
        $condition .= " AND game_grounds.game_id = '$game_id'";
        $condition .= " AND game_grounds.club_id = '$club_id'";

        $query = "SELECT $fields FROM game_grounds $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $game_grounds = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        foreach ($game_grounds as $key => &$table) {
            if (!empty($table)) {
                $dir = "../assets/files/grounds/images/" . $table['ground_id'];
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $table['image'] = $image_data;
                    }
                }
            }
        }
       
        return [!empty($game_grounds) ? $game_grounds : [], !empty($params) ? $params : []];
    }
    function display_pitches($params = array(),$game_id,$club_id,$lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "game_pitches.*,game_pitch_descriptions.pitch_name";
        $condition .= " AND game_pitch_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_pitch_descriptions ON game_pitch_descriptions.pitch_id = game_pitches.pitch_id";
        if (!empty($params['pitch_name'])) {
            $condition .= " AND game_pitch_descriptions.pitch_name LIKE %" . trim($params['pitch_name']) . "%";
        }
        if (!empty($params['game_ids'])) {
            $game_ids = $params['game_ids'];
            $condition .= " AND game_pitches.game_id IN($game_ids)";
        }
        
        $condition .= " AND game_pitches.game_id = '$game_id'";
        $condition .= " AND game_pitches.club_id = '$club_id'";

        $query = "SELECT $fields FROM game_pitches $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $game_pitches = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        foreach ($game_pitches as $key => &$pitch) {
            if (!empty($pitch)) {
                $dir = "../assets/files/pitches/images/" . $pitch['pitch_id'];
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $pitch['image'] = $image_data;
                    }
                }
            }
        }
        return [!empty($game_pitches) ? $game_pitches : [], !empty($params) ? $params : []];
    }
    function display_bookings($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        if(!empty($params['club_id'])){
            $club_id = $params['club_id'];
            $condition .= " AND bookings.club_id = '$club_id'";
        }
        $fields = "bookings.*,game_descriptions.game,club_descriptions.club";
        $condition .= " AND game_descriptions.lang_code = '$lang_code'";
        $condition .= " AND club_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_descriptions ON game_descriptions.game_id = bookings.game_id";
        $join .= " LEFT JOIN club_descriptions ON club_descriptions.club_id = bookings.club_id";
        $query = "SELECT $fields FROM bookings $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        
        return [!empty($bookings) ? $bookings : [], !empty($params) ? $params : []];
    }
    function display_jobs($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "jobs.*,job_descriptions.job_position,job_descriptions.description,job_descriptions.skills";
        $condition .= " AND job_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN job_descriptions ON job_descriptions.job_id = jobs.job_id";
        if (!empty($params['job_position'])) {
            $condition .= " AND job_descriptions.job_position LIKE %" . trim($params['job_position']) . "%";
        }
        if (!empty($params['status'])) {
            $condition .= " AND jobs.status = '" . $params['status'] . "'";
        }
        if (!empty($params['club_id'])) {
            $condition .= " AND jobs.club_id = '" . $params['club_id'] . "'";
        }else{
            //for diplaying only admin jobs
            $condition .= " AND jobs.club_id = '0'";
        }
        $query = "SELECT $fields FROM jobs $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return [!empty($jobs) ? $jobs : [], !empty($params) ? $params : []];
    }
    function display_job_applicants($job_id, $items_per_page = 0)
    {
        $condition = $limit = $join = '';
        $fields = "job_applicants.*";
        $condition .=" AND job_applicants.job_id = '$job_id'";
        $query = "SELECT $fields FROM job_applicants where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $job_applicants = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return [!empty($job_applicants) ? $job_applicants : [], !empty($params) ? $params : []];
    }
    function display_subscriptions($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "subscriptions.*,subscription_descriptions.subscription,subscription_descriptions.description";
        $condition .= " AND subscription_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN subscription_descriptions ON subscription_descriptions.subscription_id = subscriptions.subscription_id";
        if (!empty($params['subscription'])) {
            $condition .= " AND subscription_descriptions.subscription LIKE %" . trim($params['subscription']) . "%";
        }
        if (!empty($params['status'])) {
            $condition .= " AND subscriptions.status = '".$params['status']."'";
        }
        $query = "SELECT $fields FROM subscriptions $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $subscriptions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return [!empty($subscriptions) ? $subscriptions : [], !empty($params) ? $params : []];
    }

    function display_categories($params=[],$items_per_page=0,$lang_code='en')
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "categories.*,category_descriptions.category,category_descriptions.description";
        $condition .= " AND category_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN category_descriptions ON category_descriptions.category_id = categories.category_id";
        if (!empty($params['category'])) {
            $condition .= " AND category_descriptions.category LIKE %" . trim($params['category']) . "%";
        }
        if (!empty($params['status'])) {
            $condition .= " AND categories.status = '" . $params['status']."'";
        }
        $query = "SELECT $fields FROM categories $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return [!empty($categories) ? $categories : [], !empty($params) ? $params : []];
    }

    function change_catagory_status($category_id,$status_to)
    {
        $query = "UPDATE `categories` SET `status`= '$status_to' WHERE category_id = $category_id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function change_game_status($id, $status_to)
    {
        $query = "UPDATE `games` SET `status`= '$status_to' WHERE game_id = $id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function change_job_status($id, $status_to)
    {
        $query = "UPDATE `jobs` SET `status`= '$status_to' WHERE job_id = $id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function change_club_status($id, $status_to)
    {
        $query = "UPDATE `clubs` SET `status`= '$status_to' WHERE club_id = $id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function change_subscription_status($id, $status_to)
    {
        $query = "UPDATE `subscriptions` SET `status`= '$status_to' WHERE subscription_id = $id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function delete_game($id)
    {
        $query = "DELETE FROM `games` WHERE  `game_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `game_descriptions` WHERE `game_id` = '$id'";
            mysqli_query($this->connection, $query);
            $target_dir = "assets/files/games/images/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            return true;
        }
    }
    function delete_translation($id)
    {
        $query = "DELETE FROM `translations` WHERE  `translation_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            return true;
        }
    }
    function delete_booking($id)
    {
        $query = "DELETE FROM `bookings` WHERE  `booking_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function delete_club($id)
    {
        $query = "DELETE FROM `clubs` WHERE  `club_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `club_descriptions` WHERE `club_id` = '$id'";
            mysqli_query($this->connection, $query);
            $target_dir = "../assets/files/clubs/images/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            $target_dir = "../assets/files/clubs/videos/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            } 
            $target_dir = "../assets/files/clubs/licence_copies/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            return true;
        }
    }
    function delete_table($id)
    {
        $query = "DELETE FROM `game_tables` WHERE  `table_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `game_table_descriptions` WHERE `table_id` = '$id'";
            mysqli_query($this->connection, $query);
            $target_dir = "../assets/files/tables/images/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            return true;
        }
    }
    function delete_game_membership($id)
    {
        $query = "DELETE FROM `game_memberships` WHERE  `membership_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `game_membership_descriptions` WHERE `membership_id` = '$id'";
            mysqli_query($this->connection, $query);
            $target_dir = "../assets/files/memberships/images/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            return true;
        }
    }
    function delete_ground($id)
    {
        $query = "DELETE FROM `game_grounds` WHERE  `ground_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `game_ground_descriptions` WHERE `ground_id` = '$id'";
            mysqli_query($this->connection, $query);
            $target_dir = "../assets/files/grounds/images/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            return true;
        }
    }
    function delete_pitch($id)
    {
        $query = "DELETE FROM `game_pitches` WHERE  `pitch_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `game_pitch_descriptions` WHERE `pitch_id` = '$id'";
            mysqli_query($this->connection, $query);
            $target_dir = "../assets/files/pitches/images/$id";
            if (is_dir($target_dir)) {
                $files = glob($target_dir . '/*');
                // Deleting all the files in the list
                foreach ($files as $file) {
                    if (is_file($file))
                        // Delete the given file
                        unlink($file);
                }
            }
            return true;
        }
    }
    function delete_subscription($id)
    {
        $query = "DELETE FROM `subscriptions` WHERE  `subscription_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `subscription_descriptions` WHERE `subscription_id` = '$id'";
            return mysqli_query($this->connection, $query);
        }
    }
    function delete_job($id)
    {
        $query = "DELETE FROM `jobs` WHERE  `job_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `job_descriptions` WHERE `job_id` = '$id'";
            return mysqli_query($this->connection, $query);
        }
    }

    function delete_category($category_id)
    {
        $query = "DELETE FROM `categories` WHERE  category_id = '$category_id'";
        if(mysqli_query($this->connection, $query)){
            $query = "DELETE FROM `category_descriptions` WHERE category_id = '$category_id'";
            return mysqli_query($this->connection, $query);
        }
    }

    function display_categoryByID($category_id,$lang_code='en')
    {
        $condition = $limit = $join = '';
        $fields = "categories.*,category_descriptions.category,category_descriptions.description";
        $condition .= " AND category_descriptions.lang_code = '$lang_code'";
        $condition .= " AND categories.category_id = '$category_id'";
        $join .= " LEFT JOIN category_descriptions ON category_descriptions.category_id = categories.category_id";
        $query = "SELECT $fields FROM categories $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }
    function display_translationByID($translation_id)
    {
        $condition = $limit = $join = '';
        $fields = "translations.*";
        $condition .= " AND translations.translation_id = '$translation_id'";
        $query = "SELECT $fields FROM translations $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $translation_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($translation_info);
        }
    }
    function display_clubByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "clubs.*,club_descriptions.club,club_descriptions.activities_desc,club_descriptions.history";
        $condition .= " AND clubs.club_id = '$id'";
        $condition .= " AND club_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN club_descriptions ON club_descriptions.club_id = clubs.club_id";
        $query = "SELECT $fields FROM clubs $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $club_data = mysqli_query($this->connection, $query);
            $club_data = mysqli_fetch_array($club_data, MYSQLI_ASSOC);
            if (!empty($club_data)) {
                $dir = "../assets/files/clubs/images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $club_data['image_location'] = $image_data;
                    }
                }
                $dir = "../assets/files/clubs/licence_copies/" . $id;
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $licence = reset($dir_data);
                    if (!empty($licence)) {
                        $club_data['licence_location'] = $licence;
                    }
                }
                $dir = "../assets/files/clubs/multi_images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    foreach($dir_data as $data){
                        if($data != '.' && $data != '..'){
                            $club_data['multi_images'][] = $data;
                        }
                    }
                    
                }
                $dir = "../assets/files/clubs/videos/" . $id;
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $video = reset($dir_data);
                    if (!empty($video)) {
                        $club_data['video'] = $video;
                    }
                }   
                return $club_data;
            } else {
                return false;
            }
        }
    }
    function display_tableByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "game_tables.*,game_table_descriptions.table_name";
        $condition .= " AND game_tables.table_id = '$id'";
        $condition .= " AND game_table_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_table_descriptions ON game_table_descriptions.table_id = game_tables.table_id";
        $query = "SELECT $fields FROM game_tables $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $table_data = mysqli_query($this->connection, $query);
            $table_data = mysqli_fetch_array($table_data, MYSQLI_ASSOC);
            if (!empty($table_data)) {
                $dir = "../assets/files/tables/images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $table_data['image'] = $image_data;
                    }
                }
                return $table_data;
            } else {
                return false;
            }
        }
    }
    function display_groundByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "game_grounds.*,game_ground_descriptions.ground_name";
        $condition .= " AND game_grounds.ground_id = '$id'";
        $condition .= " AND game_ground_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_ground_descriptions ON game_ground_descriptions.ground_id = game_grounds.ground_id";
        $query = "SELECT $fields FROM game_grounds $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $ground_data = mysqli_query($this->connection, $query);
            $ground_data = mysqli_fetch_array($ground_data, MYSQLI_ASSOC);
            if (!empty($ground_data)) {
                $dir = "../assets/files/grounds/images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $ground_data['image'] = $image_data;
                    }
                }
                return $ground_data;
            } else {
                return false;
            }
        }
    }
    function display_game_membershipByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "game_memberships.*,game_membership_descriptions.membership_name";
        $condition .= " AND game_memberships.membership_id = '$id'";
        $condition .= " AND game_membership_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_membership_descriptions ON game_membership_descriptions.membership_id = game_memberships.membership_id";
        $query = "SELECT $fields FROM game_memberships $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $membership_data = mysqli_query($this->connection, $query);
            $membership_data = mysqli_fetch_array($membership_data, MYSQLI_ASSOC);
            if (!empty($membership_data)) {
                $dir = "../assets/files/memberships/images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $membership_data['image'] = $image_data;
                    }
                }
                return $membership_data;
            } else {
                return false;
            }
        }
    }
    function display_pitchByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "game_pitches.*,game_pitch_descriptions.pitch_name";
        $condition .= " AND game_pitches.pitch_id = '$id'";
        $condition .= " AND game_pitch_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_pitch_descriptions ON game_pitch_descriptions.pitch_id = game_pitches.pitch_id";
        $query = "SELECT $fields FROM game_pitches $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $pitch_data = mysqli_query($this->connection, $query);
            $pitch_data = mysqli_fetch_array($pitch_data, MYSQLI_ASSOC);
            if (!empty($pitch_data)) {
                $dir = "../assets/files/pitches/images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $pitch_data['image'] = $image_data;
                    }
                }
                return $pitch_data;
            } else {
                return false;
            }
        }
    }
    function display_gameByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "games.*,game_descriptions.game";
        $condition .= " AND games.game_id = '$id'";
        $condition .= " AND game_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_descriptions ON game_descriptions.game_id = games.game_id";
        $query = "SELECT $fields FROM games $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $game_data = mysqli_query($this->connection, $query);
            $game_data = mysqli_fetch_array($game_data, MYSQLI_ASSOC);
            if (!empty($game_data)) {
                $dir = "../assets/files/games/images/$id";
                if (is_dir($dir)) {
                    $dir_data = scandir($dir, 1);
                    $image_data = reset($dir_data);
                    if (!empty($image_data)) {
                        $game_data['image_location'] = $image_data;
                    }
                }
                return $game_data;
            } else {
                return false;
            }
        }
    }
    function display_jobByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "jobs.*,job_descriptions.job_position,job_descriptions.description,job_descriptions.skills";
        $condition .= " AND jobs.job_id = '$id'";
        $condition .= " AND job_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN job_descriptions ON job_descriptions.job_id = jobs.job_id";
        $query = "SELECT $fields FROM jobs $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $job_data = mysqli_query($this->connection, $query);
            $job_data = mysqli_fetch_array($job_data, MYSQLI_ASSOC);
            if (!empty($job_data)) {
                return $job_data;
            } else {
                return false;
            }
        }
    }
    function get_dashboard_data($params = [])
    {
        $condition = $_condition ='';
        if(!empty($params['club_id'])){
            $club_id = $params['club_id'];
            $condition .= " AND club_id = '$club_id'";
        }else{
            $condition .= " AND club_id = '0'";
        }
        if(!empty($params['filter_by'])){
            if($params['filter_by'] == 'T'){
                $current_timestamp = time(); 
                $beginning_of_day = strtotime("midnight", $current_timestamp);
                $end_of_day = strtotime("tomorrow", $current_timestamp) - 1;
                $_condition .= $condition .= " AND timestamp BETWEEN $beginning_of_day AND $end_of_day";
            }elseif($params['filter_by'] == 'W'){
                $day = date('w');
                $week_start = strtotime('-'.$day.' days');
                $week_end = strtotime('+'.(6-$day).' days');
                $_condition .= $condition .= " AND timestamp BETWEEN $week_start AND $week_end";
            }elseif($params['filter_by'] == 'M'){
                $day = date('w');
                $month_start = strtotime('first day of this month', time());
                $month_end = strtotime('last day of this month', time());
                $_condition .= $condition .= " AND timestamp BETWEEN $month_start AND $month_end";
            }elseif($params['filter_by'] == 'Y'){
                $day = date('w');
                $year_start = strtotime('first day of January', time());
                $year_end = strtotime('last day of December', time());
                $_condition .= $condition .= " AND timestamp BETWEEN $year_start AND $year_end";
            }
        }
        $dashboard_data = [];
        $query = "SELECT COUNT(*) as total_bookings FROM bookings WHERE 1 $condition";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);
        $dashboard_data['total_bookings'] = $data['total_bookings'];
        $query = "SELECT COUNT(*) as total_clubs FROM clubs WHERE 1 $_condition";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);
        $dashboard_data['total_clubs'] = $data['total_clubs'];
        $query = "SELECT COUNT(*) as total_orders FROM orders WHERE 1 $condition";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);
        $dashboard_data['total_orders'] = $data['total_orders'];
        $query = "SELECT COUNT(*) as total_tournaments FROM tournaments WHERE 1 $condition";
        $result = mysqli_query($this->connection, $query);
        $data = mysqli_fetch_assoc($result);
        $dashboard_data['total_tournaments'] = $data['total_tournaments'];
        return $dashboard_data;
    }
    function display_bookingByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "bookings.*,game_descriptions.game";
        $condition .= " AND bookings.booking_id = '$id'";
        $condition .= " AND game_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN game_descriptions ON game_descriptions.game_id = bookings.game_id";
        $join .= " LEFT JOIN club_descriptions ON club_descriptions.club_id = bookings.club_id";
        $query = "SELECT $fields FROM bookings $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $booking_data = mysqli_query($this->connection, $query);
            $booking_data = mysqli_fetch_array($booking_data, MYSQLI_ASSOC);
            if (!empty($booking_data)) {
                return $booking_data;
            } else {
                return false;
            }
        }
    }
    function display_subscriptionByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "subscriptions.*,subscription_descriptions.subscription,subscription_descriptions.description";
        $condition .= " AND subscriptions.subscription_id = '$id'";
        $condition .= " AND subscription_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN subscription_descriptions ON subscription_descriptions.subscription_id = subscriptions.subscription_id";
        $query = "SELECT $fields FROM subscriptions $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $game_data = mysqli_query($this->connection, $query);
            $game_data = mysqli_fetch_array($game_data, MYSQLI_ASSOC);
            if (!empty($game_data)) {
                return $game_data;
            } else {
                return false;
            }
        }
    }

    function update_catagory($data,$lang_code='en')
    {
        $category_id = $data['category_id'];
        $category = $data['category'];
        $description = $data['description'];
        $status = $data['status'];
        $query = "UPDATE `categories` SET `status`='$status' WHERE `category_id` = '$category_id'";
        if (mysqli_query($this->connection, $query)) {
            $category = $data['category'];
            $query = "REPLACE INTO category_descriptions(`category_id`,`category`,`description`,`lang_code`) VALUES('$category_id','$category','$description','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                return $category_id;
            } else {
                return false;
            }
        }
    }

    function add_product($data)
    {
        $languages = array('en', 'ar');
        $amount = $data['amount'];
        $price = $data['price'];
        $category_id = $data['category_id'];
        $status = $data['status'];
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $query = "INSERT INTO `products`(`amount`,`price`,`category_id`,`status`,`club_id`) VALUES ('$amount','$price','$category_id','$status','$club_id')";

        if (mysqli_query($this->connection, $query)) {
            $product_id = $this->connection->insert_id; //product_id
            $product = $data['product'];
            $description = $data['description'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `product_descriptions`( `product_id`,`product`,`description`,`lang_code`) VALUES ('$product_id','$product','$description','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if(!empty($result)){
                if (!empty($_FILES['banner']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/products/images/$product_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_image($target_dir . '/');
                }
                if (!empty($_FILES['multiple_images']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/products/multi_images/$product_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_multiple_image($target_dir . '/');
                }

                return $product_id;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
    function upload_multiple_image($target_dir)
    {
        // die(var_dump($_FILES));
        $error=array();
        $extension=array("jpeg","jpg","png","gif");
        foreach($_FILES["multiple_images"]["tmp_name"] as $key=>$tmp_name) {
            $file_name=$_FILES["multiple_images"]["name"][$key];
            $file_tmp=$_FILES["multiple_images"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

        if(in_array($ext,$extension)) {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            $target_file = $target_dir . $newFileName;
            move_uploaded_file($file_tmp=$_FILES["multiple_images"]["tmp_name"][$key],$target_file);
        }
        else {
            array_push($error,"$file_name, ");
        }
        }
    }

    function display_products($params = array(),$items_per_page=0,$lang_code='en')
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "products.*,product_descriptions.product,product_descriptions.description";
        $condition .= " AND product_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN product_descriptions ON product_descriptions.product_id = products.product_id";
        if (!empty($params['category'])) {
            $condition .= " AND product_descriptions.product LIKE %" . trim($params['product']) . "%";
        }
        if (!empty($params['club_id'])) {
            $condition .= " AND products.club_id = '".$params['club_id']."'";
        }
        if(!empty($params['admin_products'])){
            $condition .= " AND products.club_id = 0";
        }
        if (!empty($params['status'])) {
            $condition .= " AND products.status = '" . $params['status']."'";
        }
        $query = "SELECT $fields FROM products $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        foreach($products as $key => $product_data) {
            $product_id = $product_data['product_id'];
            $dir = "../assets/files/products/images/$product_id";
            if (is_dir($dir)) {
                $dir_data = scandir($dir, 1);
                $image_data = reset($dir_data);
                if (!empty($image_data)) {
                    $products[$key]['image'] = $image_data;
                }
            }
        }
        
        return [!empty($products) ? $products : [], !empty($params) ? $params : []];
    }



    function delete_product($product_id)
    {
        $del_query = "DELETE FROM `products` WHERE product_id=$product_id";
        if (mysqli_query($this->connection, $del_query)) {
            $del_query = "DELETE FROM `product_descriptions` WHERE product_id=$product_id";
            if(mysqli_query($this->connection, $del_query)){
                $target_dir = "../assets/files/products/images/$product_id";
                if (is_dir($target_dir)) {
                    $files = glob($target_dir . '/*');
                    // Deleting all the files in the list
                    foreach ($files as $file) {
                        if (is_file($file))
                            // Delete the given file
                            unlink($file);
                    }
                }
              return true;
            }else{
              return false;
            }
        }else{
            return false;
        }
    }
    function delete_order($order_id)
    {
        $del_query = "DELETE FROM `orders` WHERE order_id=$order_id";
        if (mysqli_query($this->connection, $del_query)) {
            return true;
        }else{
            return false;
        }
    }
    function change_product_status($product_id,$status_to)
    {
        $query = "UPDATE `products` SET `status`='$status_to' WHERE product_id='$product_id'";
        if (mysqli_query($this->connection, $query)) {
            return true;
        }else{
            return false;
        }
    }

    function display_productByID($product_id, $lang_code = 'en')
    {
        $condition = $limit = $join = '';
        $fields = "products.*,product_descriptions.product,product_descriptions.description";
        $condition .= " AND product_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN product_descriptions ON product_descriptions.product_id = products.product_id";
        $condition .= " AND products.product_id = '$product_id'";
        $query = "SELECT $fields FROM products $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $product_data = mysqli_query($this->connection, $query);
            $product_data = mysqli_fetch_array($product_data, MYSQLI_ASSOC);
            if (!empty($product_data)) {
                    $dir = "../assets/files/products/images/$product_id";
                    if (is_dir($dir)) {
                        $dir_data = scandir($dir, 1);
                        $image_data = reset($dir_data);
                        if (!empty($image_data)) {
                            $product_data['image'] = $image_data;
                        }
                    }
                    $dir = "../assets/files/products/multi_images/$product_id";
                    if (is_dir($dir)) {
                        $dir_data = scandir($dir, 1);
                        foreach($dir_data as $data){
                            if($data != '.' && $data != '..'){
                                $product_data['multi_images'][] = $data;
                            }
                        }
                        
                    }
                return $product_data;
            } else {
                return false;
                }
            }
    }
    function __($lang_var,$lang_code){
        $condition = $limit = $join = '';
        $fields = "translations.*";
        $condition .= " AND translations.language_variable = '$lang_var'";
        $condition .= " AND translations.lang_code = '$lang_code'";
        $query = "SELECT $fields FROM translations $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $translation_info = mysqli_query($this->connection, $query);
            $translation_info = mysqli_fetch_assoc($translation_info);
            
        }
        if(!empty($translation_info['translation'])){
            return $translation_info['translation'];
        }else{
            return '__'.$lang_var;
        }
    }

    function update_product($data,$lang_code='en')
    {
        $product_id = $data['product_id'];
        $product = $data['product'];
        $price = $data['price'];
        $description = $data['description'];
        $amount = $data['amount'];
        $category_id = $data['category_id'];
        $status = $data['status'];
        $query = "UPDATE `products` SET `price`='$price',`amount`='$amount',`category_id`='$category_id',`status`='$status' WHERE `product_id` = '$product_id'";
        if (mysqli_query($this->connection, $query)) {
            $product = $data['product'];
            $query = "REPLACE INTO product_descriptions(`product_id`,`product`,`description`,`lang_code`) VALUES('$product_id','$product','$description','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/products/images/$product_id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                if (!empty($_FILES['multiple_images']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/products/multi_images/$product_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_multiple_image($target_dir . '/');
                }
                return $product_id;
            } else {
                return false;
            }
        }
    }
    function update_translation($data,$lang_code='en')
    {
        $translation = $data['translation'];
        $language_variable = $data['language_variable'];
        $translation_id = $data['translation_id'];
        $query = "UPDATE `translations` SET `language_variable`='$language_variable',`translation`='$translation' WHERE `translation_id` = '$translation_id' AND `lang_code`='$lang_code'";
        if (mysqli_query($this->connection, $query)) {
                return $translation_id;
            } else {
                return false;
            }
        }

    function related_product($cataID)
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE ctg_id=$cataID ORDER BY pdt_id DESC LIMIT 6";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function ctg_by_id($cataID)
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE ctg_id=$cataID";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            $pdt_fetch = mysqli_fetch_assoc($pdt_info);
            return $pdt_fetch;
        }
    }

    function user_register($data)
    {
        $username = $data['username'];
        $user_firstname = $data['user_firstname'];
        $user_lastname = $data['user_lastname'];
        $user_email = $data['user_email'];
        $user_password = md5($data['user_password']);
        $user_mobile = $data['user_mobile'];
        $user_address = $data['user_address'];
        $user_roles = $data['user_roles'];


        $user_check = "SELECT * FROM `users` WHERE user_name='$username' or user_email='$user_email'";

        $mysqli_result = mysqli_query($this->connection, $user_check);

        $row = mysqli_num_rows($mysqli_result);

        if ($row == 1) {
            $msg = "Username or email already exist";
            return $msg;
        } else {
            $query = "INSERT INTO `users`( `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`,`user_address`, `user_roles`) VALUES ('$username',' $user_firstname',' $user_lastname','$user_email','$user_password',$user_mobile,'$user_address',$user_roles)";

            if (mysqli_query($this->connection, $query)) {
                $user_id = $this->connection->insert_id; //category_id
                return $user_id;
            }
        }
    }


    function user_login($data)
    {
        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['user_password']);

        $query = "SELECT * FROM `users` WHERE `user_email`='$user_email' AND `user_password`='$user_password'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $user_info = mysqli_fetch_array($result);
            if ($user_info) {
                header("location:userprofile.php");
                session_start();
                $_SESSION['user_id'] = $user_info['user_id'];
                $_SESSION['email'] = $user_info['user_email'];
                $_SESSION['mobile'] = $user_info['user_mobile'];
                $_SESSION['address'] = $user_info['user_address'];

                $_SESSION['username'] = $user_info['user_name'];
            } else {
                $logmsg = "Your username or password is incorrect";
                return $logmsg;
            }
        }
    }

    function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header("location:user_login.php");
        session_destroy();
    }

    function view_all_product()
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE `product_stock`>1 ";

        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }
    

    function display_top_rated_pdt()
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE `pdt_price`>200  ORDER BY `pdt_price` LIMIT 12";

        if (mysqli_query($this->connection, $query)) {
            $top_rated = mysqli_query($this->connection, $query);
            return $top_rated;
        }
    }

    function search_product($keyword)
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE `pdt_name` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }

    function place_order($data)
    {
        $user_id = $data['user_id'];
        $product_name = $data['product_name'];
        $product_item = $data['product_item'];
        $quantity = $data['quan'];
        $amount = $data['amount'];
        $order_status = $data['order_status'];
        $trans_id = $data['txid'];
        $mobile = $data['shipping_Mobile'];

        $shiping = $data['shiping'];


        $query = "INSERT INTO `order_details`(`user_id`, `product_name`, `product_item`, `amount`, `order_status`, `trans_id`,`Shipping_mobile`, `shiping`, `order_time`, `order_date`) VALUES ( $user_id,'$product_name',$product_item, $amount, $order_status,'$trans_id',$mobile,'$shiping',NOW(), CURDATE())";

        if (mysqli_query($this->connection, $query)) {

            unset($_SESSION['cart']);
            header("location:exist_order.php");
        }
    }

    function confirm_order($post, $session)
    {
        $user_id = $post['user_id'];
        $order_status = $post['order_status'];
        $trans_id = $post['txid'];
        $mobile = $post['shipping_Mobile'];
        $shiping = $post['shiping'];
        $coupon = $_POST['coupon'];

        foreach ($session as $key) {
            $pdt_name = $key['pdt_name'];
            $pdt_price = $key['pdt_price'];
            $pdt_id = $key['pdt_id'];
            $pdt_quantity = $key['quantity'];

            $query = "INSERT INTO `order_details`(`user_id`, `product_name`,`pdt_quantity`, `amount`,`uses_coupon`, `order_status`, `trans_id`, `Shipping_mobile`, `shiping`, `order_time`) VALUES ($user_id,'$pdt_name',$pdt_quantity, $pdt_price,'$coupon', $order_status,'$trans_id','$mobile','$shiping',NOW())";
            $result = mysqli_query($this->connection, $query);
            unset($_SESSION['cart']);
            header("location:exist_order.php");
        }
    }

    function order_details_by_id($user_id)
    {
        $query = "SELECT * FROM `order_details` WHERE `user_id`=$user_id ORDER BY `order_time` DESC";
        if (mysqli_query($this->connection, $query)) {
            $order_query = mysqli_query($this->connection, $query);
            return $order_query;
        }
    }

    function all_order_info()
    {
        $query = "SELECT * FROM `all_order_info` ORDER BY `order_time` DESC";

        if (mysqli_query($this->connection, $query)) {
            $all_order_info = mysqli_query($this->connection, $query);
            return $all_order_info;
        }
    }

    function updat_order_status($data)
    {
        $u_pdt_id = $data['order_id'];
        $u_pdt_status = $data['update_status'];
        $query = "UPDATE `order_details` SET `order_status`=  $u_pdt_status WHERE `order_id`= $u_pdt_id";
        if (mysqli_query($this->connection, $query)) {
            $status_msg = "Order Status updated successfully";
            return $status_msg;
        }
    }

    function user_password_recover($recover_email)
    {
        $query = "SELECT * FROM `users` WHERE `user_email`='$recover_email'";
        if (mysqli_query($this->connection, $query)) {
            $row =  mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function update_user_password($data)
    {

        $update_id = $data['update_user_id'];
        $update_password = md5($data['update_user_password']);

        // echo $update_id.$update_password;

        $query = "UPDATE `users` SET `user_password`='$update_password' WHERE `user_id`=$update_id";


        if (mysqli_query($this->connection, $query)) {
            $update_mag = "You password updated successfull";
            return $update_mag;
        } else {
            return "Please enter a correct email";
        }
    }


    function display_links()
    {
        $query = "SELECT * FROM header_info";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }

    function display_link_ID($id)
    {
        $query = "SELECT * FROM header_info WHERE id = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    //Mynul created 

    function updata_links($data)
    {
        $link_id = $data['id'];
        $link_email = $data['email'];
        $link_tweeter = $data['tweeter'];
        $link_fb = $data['fb'];
        $link_pin = $data['pin'];
        $link_phone = $data['phone'];


        $query = "UPDATE header_info SET email='$link_email',tweeter='$link_tweeter',fb_link= '$link_fb', pinterest='$link_pin', phone='$link_phone' WHERE id = $link_id";
        if (mysqli_query($this->connection, $query)) {
            return "Link Update successfully";
        }
    }

    function display_logo()
    {
        $query = "SELECT * FROM add_logo";

        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }



    function display_logo_ID($id)
    {
        $query = "SELECT * FROM add_logo WHERE id = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    function update_logo($data)
    {
        $lg_id = $data['id'];

        $lg_name = $_FILES['img']['name'];
        $lg_size = $_FILES['img']['size'];
        $lg_tmp = $_FILES['img']['tmp_name'];
        $lg_ext = pathinfo($lg_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize("$lg_tmp");


        if ($lg_ext == "jpg" ||   $lg_ext == 'jpeg' ||  $lg_ext == "png") {
            if ($lg_size <= 2e+6) {

                if ($width < 136 && $height < 37) {

                    $select_query = "SELECT * FROM `add_logo` WHERE id=$lg_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['img'];
                    $target_dir = "../assets/files/logo";
                    unlink($target_dir."/" . $pre_img);


                    $query = "UPDATE add_logo SET img='$lg_name' WHERE id=$lg_id";

                    if (mysqli_query($this->connection, $query)) {
                        $target_dir = "../assets/files/logo";
                        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                        move_uploaded_file($lg_tmp, $target_dir."/" . $lg_name);
                        $msg = $this->__('logo_updated_successfully',$_SESSION['default_lang']);
                        return $msg;
                    }
                } else {
                    $msg = $this->__('sorry_logo_max_height_135px_and_width_36px',$_SESSION['default_lang']);
                    return $msg;
                }
            } else {
                $msg =  $this->__('file_size_should_not_be_larger_than_2mb',$_SESSION['default_lang']);
                return $msg;
            }
        } else {
            $msg =  $this->__('file_should_be_jpg_or_png_formate',$_SESSION['default_lang']);
            return $msg;
        }
    }

    function SlideShow()
    {
        $query = "SELECT * FROM `slider`";
        if (mysqli_query($this->connection, $query)) {
            $row = mysqli_query($this->connection, $query);
            return $row;
        }
    }


    function slide_By_id($id)
    {
        $query = "SELECT * FROM `slider` WHERE `slider_id`=$id";
        if (mysqli_query($this->connection, $query)) {
            $row = mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function slider_update($data)
    {
        $slide_id = $data['slider_id'];
        $first_line = $data['first_line'];
        $second_line = $data['second_line'];
        $third_line = $data['third_line'];
        $btn_left = $data['btn_left'];
        $btn_right = $data['btn_right'];

        $lg_name = $_FILES['slider_img']['name'];
        $lg_size = $_FILES['slider_img']['size'];
        $lg_tmp = $_FILES['slider_img']['tmp_name'];
        $lg_ext = pathinfo($lg_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize("$lg_tmp");


        if ($lg_ext == "jpg" ||   $lg_ext == 'jpeg' ||  $lg_ext == "png") {
            if ($lg_size <= 2e+6) {

                if ($width == 1920 && $height == 550) {

                    $select_query = "SELECT * FROM `slider` WHERE `slider_id`=$slide_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['img'];
                    unlink("uploads/" . $pre_img);


                    $query = "UPDATE `slider` SET `first_line`='$first_line',`second_line`='$second_line',`third_line`='$third_line',`btn_left`='$btn_left',`btn_right`='$btn_right',`slider_img`='$lg_name ' WHERE `slider_id`=$slide_id";

                    if (mysqli_query($this->connection, $query)) {
                        move_uploaded_file($lg_tmp, "uploads/" . $lg_name);
                        $msg = "Slider  Updated successfully";
                        return $msg;
                    }
                } else {
                    $msg = "Slider image must be Width: 1920px and height: 550px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File size should not be large 2MB";
                return $msg;
            }
        } else {
            $msg = "File shoul be jpg or png formate";
            return $msg;
        }
    }


    function post_comment($data)
    {
        $user_id = $data['user_id'];
        $user_name = $data['user_name'];
        $pdt_id = $data['pdt_id'];
        $user_comment =  $data['comment'];

        $query = "INSERT INTO `customer_feedback`(`user_id`, `user_name`, `pdt_id`, `comment`, `comment_date`) VALUES ($user_id,'$user_name',$pdt_id,'$user_comment',CURDATE())";

        if (mysqli_query($this->connection, $query)) {
            $msg = "Thanks for your valuable feedback";
            return $msg;
        }
    }

    function view_comment_id($id)
    {
        $query = "SELECT * FROM `customer_feedback` WHERE `pdt_id`=$id";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);

            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        }
    }

    function view_comment_all()
    {
        $query = "SELECT * FROM `customer_feedback`";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);

            return $result;
        }
    }

    function edit_comment($cmt_id)
    {
        $query = "SELECT * FROM `customer_feedback` WHERE `id` = $cmt_id";

        if (mysqli_query($this->connection, $query)) {
            $array = mysqli_query($this->connection, $query);
            return $array;
        }
    }
    function update_comment($data)
    {
        $cmt_id = $data['cmt_id'];
        $comment = $data['u_comment'];
        $query = "UPDATE `customer_feedback` SET `comment`='$comment' WHERE `id`=$cmt_id";
        if (mysqli_query($this->connection, $query)) {
            $updata_msg = "Comment updated successfully";
            return $updata_msg;
        }
    }

    function delete_comment($cmt_id)
    {
        $query = "DELETE FROM `customer_feedback` WHERE `id`=$cmt_id";

        if (mysqli_query($this->connection, $query)) {
            $del_msg = "Comment deleted successfully";
            return $del_msg;
        }
    }

    function add_coupon($data)
    {
        $coupon_code = $data['cuopon_code'];
        $coupon_description = $data['cuopon_description'];
        $coupon_discount = $data['cuopon_discount'];
        $status = $data['status'];
        $expiry_date = strtotime($data['expiry_date']);
        $influencer_name = $data['influencer_name'];
        $influencer_amount = $data['influencer_amount'];
        $price = $data['price'];
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }

        $query = "INSERT INTO `cupon`( `cupon_code`, `description`, `discount`, `status`,`expiry_date`,`club_id`,`influencer_name`,`influencer_amount`,`price`) VALUES ('$coupon_code','$coupon_description','$coupon_discount','$status','$expiry_date','$club_id','$influencer_name','$influencer_amount','$price')";

        if (mysqli_query($this->connection, $query)) {
            $add_msg = "Special offer added successfully";
            return $add_msg;
        }
    }

    function show_coupon($params = [],$items_per_page= 0,$lang_code='en')
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);

        $condition = $limit = $join = '';

        if (!empty($params['club_id'])) {
            $condition .= " AND cupon.club_id = '" . $params['club_id'] . "'";
        }
       
        $query = "SELECT * FROM `cupon` $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function get_expired_coupons()
    {   
        $time = time();
        $query = "SELECT cupon_id FROM `cupon` WHERE `expiry_date` < '$time'";
        // die($query);
        $coupon_ids = [];
        if (mysqli_query($this->connection, $query)) {
            $coupons = mysqli_query($this->connection, $query);
            $coupons = mysqli_fetch_all($coupons, MYSQLI_ASSOC);
            foreach ($coupons as $coupon) {
                $coupon_ids[]=$coupon['cupon_id'];
            }
            return $coupon_ids;
        }
    }
    function fn_print_r($string = [])
    {
        echo '<pre>';
        foreach ($string as $key => $value) {
            print_r($value . '<br>');
        }
        echo '</pre>';
    }
    function fn_print_die($string = [])
    {
        echo '<pre>';
        foreach ($string as $key => $value) {
            print_r($value . '<br>');
        }
        echo '</pre>';
        die;
    }
    function update_club_games($club_id, $game_ids)
    {
        if (empty($club_id)) {
            return false;
        }
        if (is_array($game_ids)) {
            $game_ids = implode(',', $game_ids);
        }
        $_query = "SELECT game_ids FROM `clubs` WHERE club_id = '$club_id'";
        if (mysqli_query($this->connection, $_query)) {
            $result = mysqli_query($this->connection, $_query);
            $row = mysqli_fetch_array($result);
            if(!empty($row['game_ids'])){
                $game_ids .= ','.$row['game_ids'];
            }
        }
        $query = "UPDATE `clubs` SET `game_ids`='$game_ids' WHERE `club_id`= $club_id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function remove_game_from_club($game_id, $club_id)
    {
        if (!empty($game_id) || !empty($club_id)) {
            $query = "SELECT game_ids FROM clubs where club_id = '$club_id'";
            $game_ids = mysqli_query($this->connection, $query);
            $game_ids = mysqli_fetch_row($game_ids);
            $game_ids = explode(',',reset($game_ids));
            $key = array_search($game_id, $game_ids, true);
            if ($key !== false) {
                unset($game_ids[$key]);
            }
            $game_ids = implode(',',$game_ids);
            $query = "UPDATE `clubs` SET `game_ids`='$game_ids' WHERE `club_id`= $club_id";
            if (mysqli_query($this->connection, $query)) {
                return true;
            } else {
                return false;
            }
        }
    }
    function get_table_counts($game_id,$club_id){
        if(!empty($game_id) && !empty($club_id)){
            $result = mysqli_query($this->connection,"SELECT * FROM game_tables WHERE game_id = '$game_id' AND club_id = '$club_id'");
            return mysqli_num_rows($result);
        }else{
            return false;
        }
    }
    function get_ground_counts($game_id,$club_id){
        if(!empty($game_id) && !empty($club_id)){
            $result = mysqli_query($this->connection,"SELECT * FROM game_grounds WHERE game_id = '$game_id' AND club_id = '$club_id'");
            return mysqli_num_rows($result);
        }else{
            return false;
        }
    }
    function get_pitch_counts($game_id,$club_id){
        if(!empty($game_id) && !empty($club_id)){
            $result = mysqli_query($this->connection,"SELECT * FROM game_pitches WHERE game_id = '$game_id' AND club_id = '$club_id'");
            return mysqli_num_rows($result);
        }else{
            return false;
        }
    }
    function get_game_membership_counts($game_id,$club_id){
        if(!empty($game_id) && !empty($club_id)){
            $result = mysqli_query($this->connection,"SELECT * FROM game_memberships WHERE game_id = '$game_id' AND club_id = '$club_id'");
            return mysqli_num_rows($result);
        }else{
            return false;
        }
    }
    function display_couponByID($coupon_id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "cupon.*";
        $condition .= " AND cupon.cupon_id = '$coupon_id'";
        // $condition .= " AND subscription_descriptions.lang_code = '$lang_code'";
        // $join .= " LEFT JOIN subscription_descriptions ON subscription_descriptions.subscription_id = cupon.subscription_id";
        $query = "SELECT $fields FROM cupon $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $coupon = mysqli_query($this->connection, $query);
            $coupon = mysqli_fetch_array($coupon, MYSQLI_ASSOC);
            if (!empty($coupon)) {
                return $coupon;
            } else {
                return false;
            }
        }
    }
    function update_coupon($cupon_id,$data, $lang_code = 'en')
    {
        $cupon_code = $data['cupon_code'];
        $description = $data['description'];
        $discount = $data['discount'];
        $expiry_date = strtotime($data['expiry_date']);
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $influencer_name = $data['influencer_name'];
        $influencer_amount = $data['influencer_amount'];
        $price = $data['price'];
        $status = $data['status'];
        $query = "UPDATE `cupon` SET `cupon_code`='$cupon_code',`club_id`='$club_id',`influencer_amount`='$influencer_amount',`influencer_name`='$influencer_name',`expiry_date`='$expiry_date',`discount`='$discount',`description`='$description',`price`='$price',`status`= '$status' WHERE `cupon_id` = '$cupon_id'";
        if (mysqli_query($this->connection, $query)) {
            return "Updated Successfully";
        }else {
            return "Failed to update coupon";
        }
    }
    function delete_coupon($coupon_id)
    {
        $query = "DELETE FROM `cupon` WHERE `cupon_id`=$coupon_id" AND `status`!='D';

        if (mysqli_query($this->connection, $query)) {
            return true;
        }
    }
    function get_expired_clubs()
    {   
        $time = time();
        $query = "SELECT club_id FROM `clubs` WHERE `licence_expiry` < '$time' AND `status`!='D'";
        // die($query);
        $club_ids = [];
        if (mysqli_query($this->connection, $query)) {
            $clubs = mysqli_query($this->connection, $query);
            $clubs = mysqli_fetch_all($clubs, MYSQLI_ASSOC);
            foreach ($clubs as $club) {
                $club_ids[]=$club['club_id'];
            }
            return $club_ids;
        }
    }
    function run_cron(){
        //disable expired coupons
        $coupon_ids= $this->get_expired_coupons();
        if(!empty($coupon_ids)){
            $coupon_ids = implode(',',$coupon_ids);
            $query = "UPDATE `cupon` SET `status`='D' WHERE `cupon_id` IN($coupon_ids)";
            mysqli_query($this->connection, $query);
        }
        //disable expire coupons

        //disable the club of expiry date and will show the notification
        $club_ids= $this->get_expired_clubs();
        if(!empty($club_ids)){
            $club_ids = implode(',',$club_ids);
            $query = "UPDATE `clubs` SET `status`='D' WHERE `club_id` IN($club_ids)";
            if(mysqli_query($this->connection, $query)){
                list($clubs,)=$this->display_clubs(['club_ids'=>$club_ids]);
                foreach ($clubs as $club) {
                    $data['notification_text']='Licence expried for club for club '.$club['club'].'<a href="edit_club.php?action=edit&club_id='.$club['club_id'].'">Click To Renew</a>';
                    $this->create_notification($data);
                }
            }
        }
        
        //end club notification
    }
    function create_notification($data){
        if(empty($data)){
            return false;
        }
        $status = 'A';
        $notification_text = $data['notification_text'];
        $timestamp = time();
        $object_type = $data['object_type'];
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $query = "INSERT INTO `notifications`(`notification_text`,`status`,`club_id`,`timestamp`) VALUES ('$notification_text','$status','$club_id','$timestamp')";
        if (mysqli_query($this->connection, $query)) {
            return true;
        }
    }
    function display_notifications($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "notifications.*";
        
        if (!empty($params['status'])) {
            $condition .= " AND notifications.status = '" . $params['status'] . "'";
        }
        if (!empty($params['notification_ids'])) {
            $notification_ids = $params['notification_ids'];
            $condition .= " AND notifications.notification_id IN($notification_ids)";
        }
        $query = "SELECT $fields FROM notifications $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        
        return [!empty($notifications) ? $notifications : [], !empty($params) ? $params : []];
    }
    function get_product_price($product_id)
    {
        $query = "SELECT price FROM products where product_id = '$product_id'";

        if (mysqli_query($this->connection, $query)) {
            $product_data = mysqli_query($this->connection, $query);
            $product_data = mysqli_fetch_array($product_data, MYSQLI_ASSOC);
            if (!empty($product_data)) {
                return $product_data['price'];
            } else {
                return false;
            }
        }
    }
    function create_order($data){
        if(empty($data)){
            return false;
        }
        $price = 0;
        $shipping_address = $data['shipping_address'];
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $user_data = serialize($data['user_data']);
        $status = $data['status'];
        $timestamp = time();
        foreach ($data['products'] as $key => $product) {
            $data['products'][$key]['price'] = $this->get_product_price($product['product_id']);
            $price += $data['products'][$key]['price'];
        }
        $products_data = serialize($data['products']);
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $query = "INSERT INTO `orders`(`user_data`,`products_data`,`shipping_address`,`club_id`,`status`,`price`,`timestamp`) VALUES ('$user_data','$products_data','$shipping_address','$club_id','$status','$price','$timestamp')";
        if (mysqli_query($this->connection, $query)) {
            return true;
        }
    }
    function display_orders($params = [],$items_per_page=0){
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        $fields = "orders.*";
        
        if (!empty($params['status'])) {
            $condition .= " AND orders.status = '" . $params['status'] . "'";
        }
        $condition .= " AND orders.club_id = '" . $params['club_id'] . "'";
        if (!empty($params['order_ids'])) {
            $order_ids = $params['order_ids'];
            $condition .= " AND orders.notification_id IN($order_ids)";
        }
        $query = "SELECT $fields FROM orders $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        
        return [!empty($orders) ? $orders : [], !empty($params) ? $params : []];
    }
    function change_order_status($order_id,$status_to)
    {
        $query = "UPDATE `orders` SET `status`='$status_to' WHERE order_id='$order_id'";
        if (mysqli_query($this->connection, $query)) {
            return true;
        }else{
            return false;
        }
    }
    function add_tournament($data,$club_id)
    {
     
        if(!empty($data['club_id'])){
            $club_id = $data['club_id'];
        }else{
            $club_id = 0;
        }
        $timestamp = time();
        $tournament_type = $data['tournament_type'];
        $tournament_entry_fee = $data['tournament_entry_fee'];
        $tournament_reg_start_date = strtotime($data['reg_start_date']);
        $tournament_end_date = strtotime($data['reg_end_date']);
        $tournament_start_date = strtotime($data['tournament_start_date']);
        $tournament_status = $data['tournament_status'];
        $is_sponser = $data['is_sponser'];
    
        $languages = array('en', 'ar');

        $query = "INSERT INTO `tournaments`( `type`, `tournament_start_date`,`reg_start_date`,`reg_end_date`,`status`,`fee`,`is_sponser`,`club_id`,`timestamp`) 
        VALUES ('$tournament_type','$tournament_start_date','$tournament_reg_start_date','$tournament_end_date','$tournament_status','$tournament_entry_fee','$is_sponser','$club_id','$timestamp')";
        if (mysqli_query($this->connection, $query)) {
            $tournament_id = $this->connection->insert_id; //tournament_id
            $tournament = $data['tournament'];
            $tournament_history = $data['tournament_history'];
            $tournament_description = $data['tournament_description'];
            // $table_name = $data['table_name'];
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `tournaments_descriptions`( `t_id`,`tournament`,`description`,`history`,`lang_code`)
                VALUES ('$tournament_id','$tournament','$tournament_history','$tournament_description','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if ($result) {
                if (!empty($_FILES['banner']['name'])) {
                    //image upload
                    $target_dir = "../assets/files/tournaments/images/$tournament_id";
                    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
                    $this->upload_image($target_dir . '/');
                }
                return $tournament_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function display_tournaments($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
        if(!empty($params['club_id'])){
            $club_id = $params['club_id'];
            $condition .= " AND tournaments.club_id = '$club_id'";
        }
        $fields = "tournaments.*,tournaments_descriptions.tournament,tournaments_descriptions.description,tournaments_descriptions.history";
        $condition .= " AND tournaments_descriptions.lang_code = '$lang_code'";
        // $join .= " LEFT JOIN game_descriptions ON tournaments.game_id = bookings.game_id";
        $join .= " LEFT JOIN tournaments_descriptions ON tournaments_descriptions.t_id = tournaments.t_id";
        $query = "SELECT $fields FROM tournaments $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $tournaments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        // print_r($tournaments);
        // die;
        return [!empty($tournaments) ? $tournaments : [], !empty($params) ? $params : []];
    }
    
    function display_tournamentByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "tournaments.*,tournaments_descriptions.tournament,tournaments_descriptions.description,tournaments_descriptions.history";
        $condition .= " AND tournaments.t_id = '$id'";
        $condition .= " AND tournaments_descriptions.lang_code = '$lang_code'";
        $join .= " LEFT JOIN tournaments_descriptions ON tournaments_descriptions.t_id = tournaments.t_id";
        $query = "SELECT $fields FROM tournaments $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $tournament = mysqli_query($this->connection, $query);
            $tournament = mysqli_fetch_array($tournament, MYSQLI_ASSOC);
            if (!empty($tournament)) {
                $dir = "../assets/files/tournaments/images/$id";
                    if (is_dir($dir)) {
                        $dir_data = scandir($dir, 1);
                        $image_data = reset($dir_data);
                        if (!empty($image_data)) {
                            $tournament['image'] = $image_data;
                        }
                    }
                return $tournament;
            } else {
                return false;
            }
        } 
    }
    function update_tournament($data, $lang_code = 'en')
    {
        $id = $data['t_id'];
        $tournament_type = $data['tournament_type'];
        $tournament_entry_fee = $data['tournament_entry_fee'];
        $tournament_start_date = strtotime($data['tournament_start_date']);
        $reg_start_date = strtotime($data['reg_start_date']);
        $reg_end_date = strtotime($data['reg_end_date']);
        $tournament_status = $data['tournament_status'];
        $is_sponser = $data['is_sponser'];
       
        $query = "UPDATE `tournaments` SET `type`='$tournament_type',`tournament_start_date`='$tournament_start_date',`reg_start_date`='$reg_start_date',`reg_end_date`='$reg_end_date',`status`= '$tournament_status', `fee`= '$tournament_entry_fee', `is_sponser`= '$is_sponser' WHERE `t_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $tournament = $data['tournament'];
            $tournament_history = $data['tournament_history'];
            $tournament_description = $data['tournament_description'];
            $query = "REPLACE INTO tournaments_descriptions(`t_id`,`tournament`,`description`,`history`,`lang_code`) 
            VALUES ('$id','$tournament','$tournament_history','$tournament_description','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                if (!empty($_FILES['banner']['name'])) {
                    $target_dir = "../assets/files/tournaments/images/$id";
                    if (is_dir($target_dir)) {
                        $files = glob($target_dir . '/*');
                        // Deleting all the files in the list
                        foreach ($files as $file) {
                            if (is_file($file))
                                // Delete the given file
                                unlink($file);
                        }
                    } else {
                        mkdir($target_dir, 0777, true);
                    }
                    $this->upload_image($target_dir . '/');
                }
                return "{$tournament} update as a tournament successfully!!";
            } else {
                return "Failed to update job";
            }
        }
    }
    function change_tournament_status($id, $status_to)
    {
        $query = "UPDATE `tournaments` SET `status`= '$status_to' WHERE t_id = $id";
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return false;
        }
    }
    function delete_tournament($id)
    {
        $query = "DELETE FROM `tournaments` WHERE  `t_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `tournaments_descriptions` WHERE `t_id` = '$id'";
            mysqli_query($this->connection, $query);
            return true;
        } else {
            return false;
        }
    }
    function add_sponsor($data,$tournament_id=0,$club_id = 0)
    {
        $care_type = $data['care_type'];
        $degree_type = $data['degree_type'];
        $care_value = $data['care_value'];
        $languages = array('en', 'ar');

        $query = "INSERT INTO `sponsors`( `sponsor_type`, `degree_of_care`,`care_value`,`tournament_id`,`club_id`) 
        VALUES ('$care_type','$degree_type','$care_value','$tournament_id','$club_id')";
        if (mysqli_query($this->connection, $query)) {
            $sponsor_id = $this->connection->insert_id; //sponsor_id
            $sponsor_name = $data['sponsor_name'];
            $sponsor_about = $data['about_sponsor'];
            // echo "<pre>";
            // print_r($data);
            // die;   
            foreach ($languages as $lang_code) {
                $query = "INSERT INTO `sponsor_description`( `sponsor_id`,`sponsor_name`,`sponsor_about`,`lang_code`)
                VALUES ('$sponsor_id','$sponsor_name','$sponsor_about','$lang_code')";
                $result = mysqli_query($this->connection, $query);
            }
            if ($result) {
                return $sponsor_id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    function display_sponsors($params = array(), $lang_code = 'en', $items_per_page = 0)
    {
        $default_params = array(
            'page' => 1,
            'items_per_page' => $items_per_page
        );

        $params = array_merge($default_params, $params);
        $condition = $limit = $join = '';
       
        $fields = "sponsors.*,sponsor_description.sponsor_name,sponsor_description.sponsor_about";
        $condition .= " AND sponsor_description.lang_code = '$lang_code'";
        $join .= " LEFT JOIN sponsor_description ON sponsor_description.sponsor_id = sponsors.sponsor_id";

        if(!empty($params['admin_sponsors'])){
            $condition .= " AND sponsors.club_id = '0'";
        }else{
            $join .= " INNER JOIN tournaments_descriptions ON sponsors.tournament_id = tournaments_descriptions.t_id";
            $condition .= " AND tournaments_descriptions.lang_code = '$lang_code'";
            $fields .= ',tournaments_descriptions.tournament';
            if($params['club_id']){
                $club_id = $params['club_id']; 
                $condition .= " AND sponsors.club_id = '$club_id'";
            }
        }
        
        $query = "SELECT $fields FROM sponsors $join where 1 $condition";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $sponsors = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    //          echo "<pre>";
    //  print_r($sponsors);
    //  die;
        return [!empty($sponsors) ? $sponsors : [], !empty($params) ? $params : []];
    }
    function delete_sponsor($id)
    {
        $query = "DELETE FROM `sponsors` WHERE  `sponsor_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $query = "DELETE FROM `sponsor_description` WHERE `sponsor_id` = '$id'";
            mysqli_query($this->connection, $query);
            return true;
        } else {
            return false;
        }
    }
    function display_sponsorByID($id, $lang_code = 'en')
    {
        $condition = $join = '';
        $fields = "sponsors.*,sponsor_description.sponsor_name,sponsor_description.sponsor_about";
        $condition .= " AND sponsors.sponsor_id = '$id'";
        $condition .= " AND sponsor_description.lang_code = '$lang_code'";
        $join .= " LEFT JOIN sponsor_description ON sponsor_description.sponsor_id = sponsors.sponsor_id";
        $query = "SELECT $fields FROM sponsors $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $sponsor = mysqli_query($this->connection, $query);
            $sponsor = mysqli_fetch_array($sponsor, MYSQLI_ASSOC);
            if (!empty($sponsor)) {
                return $sponsor;
            } else {
                return false;
            }
        } 
    }
    function update_sponsor($data, $lang_code = 'en')
    {
        $id = $data['sponsor_id'];
        $care_type = $data['care_type'];
        $degree_type = $data['degree_type'];
        $care_value = $data['care_value'];
        if(!empty($data['tournament_id'])){
            $tournament_id = $data['tournament_id'];
        }else{
            $tournament_id = 0;
        }

        $query = "UPDATE `sponsors` SET `sponsor_type`='$care_type',`degree_of_care`='$degree_type',`care_value`='$care_value',`tournament_id`= '$tournament_id' WHERE `sponsor_id` = '$id'";
        if (mysqli_query($this->connection, $query)) {
            $sponsor_name = $data['sponsor_name'];
            $sponsor_about = $data['about_sponsor'];
            $query = "REPLACE INTO sponsor_description(`sponsor_id`,`sponsor_name`,`sponsor_about`,`lang_code`) 
            VALUES ('$id','$sponsor_name','$sponsor_about','$lang_code')";
            if (mysqli_query($this->connection, $query)) {
                return "{$sponsor_name} update successfully!!";
            } else {
                return "Failed to update sponsor";
            }
        }
    }
    // Dan changes
    function display_sponsors_by_tournament_id($tournament_id, $lang_code = 'en')
    {
        $condition = $limit = $join = '';
        $condition .= " AND sponsors.tournament_id = '$tournament_id'";
        $fields = "sponsors.*,sponsor_description.sponsor_name,sponsor_description.sponsor_about";
        $condition .= " AND sponsor_description.lang_code = '$lang_code'";
        $join .= " LEFT JOIN sponsor_description ON sponsor_description.sponsor_id = sponsors.sponsor_id";
        
        $query = "SELECT $fields FROM sponsors $join where 1 $condition";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $sponsors = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $sponsors;
    }

}
