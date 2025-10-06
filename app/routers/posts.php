<?php
use \App\Controllers\PostsController;
use \App\Controllers\CreateController;
use \App\Controllers\UpdateController;

include_once '../app/controllers/postsController.php';
include_once '../app/controllers/createController.php';
include_once '../app/controllers/updateController.php';

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
        //Mise à jour de la valeur de la globale $page
        $page = $_GET['numPage'];
        PostsController\goToPage($connection, $page);
    break;
    case 'delete':
        PostsController\deleteAction($connection, $_GET['id']);
    break;
    endswitch;