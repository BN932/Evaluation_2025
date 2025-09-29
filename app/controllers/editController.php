<?php

namespace App\Controllers\EditController;

use \App\Models\EditDbModel;
use \App\Models\PostsModel;
use \App\Controllers\PostsController;
use \App\Models\CategoriesModel;
use \PDO;

function editAction(PDO $connection, int $id, array $data, ){
    include '../app/models/editDbModel.php';
    EditDbModel\editOnePostById($connection, $id, $data);
    PostsController\showAction($connection, $id);
}

function displayEditPostForm(PDO $connection, int $id){
    $categories = CategoriesModel\findAll($connection);
    $post = PostsModel\findOneById($connection, $id);
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Edit a post";
    include '../app/views/posts/editPostForm.php';
    $content = ob_get_clean();
}