<?php

use App\Controllers\PostsController;
include '../app/controllers/updateController.php';

PostsController\goToPage($connection, $_GET['numPage']);