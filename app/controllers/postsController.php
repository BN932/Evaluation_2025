<?php

namespace App\Controllers\PostsController;
use \PDO;
use \App\Models\PostsModel;
use \App\Models\CategoriesModel;
use \App\Models\ModifyDbModel;
include '../app/models/postsModel.php';
include '../app/models/categoriesModel.php';


function indexAction(PDO $connection, int $offset = 0){
    $posts = PostsModel\findAll($connection, 10, $offset);
    $categories = CategoriesModel\findAll($connection);
    $nbrPages = (int) PostsModel\countPages($connection); 
    $nbrPages = $nbrPages/10;
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Blog";
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connection, int $id){
    $post = PostsModel\findOneById($connection, $id);
    $categories = CategoriesModel\findAll($connection);

    ob_start();
    global $title, $content;
    $title = "Alex Parker -" . $post['title'];
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}

function deleteAction(PDO $connection, int $id){
    include '../app/models/modifyDbModel.php';
    ModifyDbModel\deleteOnePost($connection, $id);
    header('Location: ' . PUBLIC_BASE_URL);
}