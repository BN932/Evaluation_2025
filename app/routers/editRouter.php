<?php

use \App\Controllers\EditController;
include '../app/controllers/editController.php';
if(isset($_GET['action'])):
        EditController\editAction($connection, $_POST);
    else:
        EditController\displayEditPostForm();
    endif;