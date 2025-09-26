<?php
use App\Controllers\PostsController;
include '../app/controllers/postsController.php';

switch($_GET['posts']):
    case 'show':
        PostsController\showAction($connection, $_GET['id']);
    break;
    case 'add':
        include '../app/routers/addRouter.php';
    break;
    case 'edit':
        include '../app/routers/editRouter.php';
    break;
    case 'page':
        include '../app/routers/pagingRouter.php';
    break;
    case 'delete':
        PostsController\deleteAction($connection, $_GET['id']);
    break;
    default:
        PostsController\indexAction($connection);
    endswitch;