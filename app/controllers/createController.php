<?php

namespace App\Controllers\CreateController;
use \PDO;
use \App\Models\CategoriesModel;
use \App\Models\EditDbModel;
use \App\Controllers\PostsController;

function displayAddPostForm(PDO $connection){
    $categories = CategoriesModel\findAll($connection);
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Add a post";
    include '../app/views/posts/addPostForm.php';
    $content = ob_get_clean();
}

function createAction(PDO $connection, array $data) {
    include_once '../app/models/editDbModel.php';
    $newPost = EditDbModel\addOnePostById($connection, $data);
    PostsController\indexAction($connection, 0);
}