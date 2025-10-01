<?php

namespace App\Controllers\UpdateController;

use \App\Models\EditDbModel;
use \App\Models\PostsModel;
use \App\Controllers\PostsController;
use \App\Models\CategoriesModel;
use \PDO;

function displayEditPostForm(PDO $connection, int $id){
    $categories = CategoriesModel\findAll($connection);
    $post = PostsModel\findOneById($connection, $id);
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Edit a post";
    include '../app/views/posts/editPostForm.php';
    $content = ob_get_clean();
}

function postAction(PDO $connection, int $id, array $data, ){
    include_once '../app/models/editDbModel.php';
    EditDbModel\editOnePostById($connection, $id, $data);
    include_once '../app/controllers/postsController.php';
    PostsController\showAction($connection, $id);
}