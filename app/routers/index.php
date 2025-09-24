<?php

use App\Controllers\PostsController;
include '../app/controllers/postsController.php';

if(isset($_GET['posts'])):
    include '../app/routers/posts.php';
else :
    PostsController\indexAction($connection);
endif;