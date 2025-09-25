<?php

use App\Controllers\PostsController;

if(isset($_GET['posts'])):
    include_once '../app/routers/posts.php';
else :
    include '../app/controllers/postsController.php';
    PostsController\indexAction($connection);
endif;