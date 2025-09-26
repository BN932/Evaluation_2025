<?php

namespace App\Controllers\AddController;
use \PDO;
use \App\Models\CategoriesModel;
use \App\Models\ModifyDbModel;
use \App\Controllers\PostsController;
    include '../app/models/modifyDbModel.php';

function displayAddPostForm(PDO $connection){
    $categories = CategoriesModel\findAll($connection);
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Add a post";
    include '../app/views/posts/addPostForm.php';
    $content = ob_get_clean();
}

function addAction(PDO $connection, array $data) {
    $newPost = modifyDbModel\addOnePost($connection, $data);
    PostsController\indexAction($connection, 0);
}