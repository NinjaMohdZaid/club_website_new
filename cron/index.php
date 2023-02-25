<?php 

//run cron jobs for data
require('../class/adminback.php');
$obj= new adminback();
$obj->run_cron();

