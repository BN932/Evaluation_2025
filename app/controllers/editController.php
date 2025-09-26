<?php

namespace App\Controllers\EditController;

use \App\Models\ModifyDbModel;
use \App\Models\PostsModel;
use \App\Controllers\PostsController;
use \App\Models\CategoriesModel;
use \PDO;

function editAction(PDO $connection, array $data){
    ModifyDbModel\editOnePost($connection, $data);
    PostsController\showAction($connection, $array['id']);
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