<?php

use \App\Controllers\AddController;

if(isset($_GET['action'])):
    
    else:
        include '../app/controllers/addController.php';
        AddController\displayAddPostForm($connection);
    endif;