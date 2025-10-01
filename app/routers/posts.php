<?php
use App\Controllers\PostsController;
use \App\Controllers\CreateController;
use \App\Controllers\UpdateController;

include '../app/controllers/postsController.php';
include '../app/controllers/createController.php';
include '../app/controllers/updateController.php';

switch($_GET['posts']):
    case 'show':
        PostsController\showAction($connection, $_GET['id']);
    break;
    case 'new':
        CreateController\displayAddPostForm($connection);
    break;
    case 'create':
        CreateController\createAction($connection, $_POST);
    break;
    case 'edit':
        UpdateController\displayEditPostForm($connection, $_GET['id']);
    break;
    case 'post':
        UpdateController\postAction($connection, $_GET['id'], $_POST);
    break;
    case 'page':
        PostsController\goToPage($connection, $_GET['numPage']);
    break;
    case 'delete':
        PostsController\deleteAction($connection, $_GET['id']);
    break;
    endswitch;