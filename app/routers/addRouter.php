<?php

use \App\Controllers\AddController;
include '../app/controllers/addController.php';
if(isset($_GET['action'])):
        AddController\addAction($connection, $_POST);
    else:
        AddController\displayAddPostForm($connection);
    endif;