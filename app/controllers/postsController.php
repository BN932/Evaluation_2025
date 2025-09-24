<?php

namespace App\Controllers\PostsController;
use \PDO;
use \App\Models\PostsModel;
include '../app/models/postsModel.php';

function indexAction(PDO $connection, int $offset = 0){
    $posts = PostsModel\findAll($connection, 10, $offset);
    $nbrPages = (int) PostsModel\countPages($connection); 
    $nbrPages = $nbrPages/10;
    ob_start();
    global $content, $title;
    $title = "Liste des posts";
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connection, int $id){
    $post = PostsModel\findOneById($connection, $id);

    ob_start();
    global $title, $content;
    $title = $post['title'];
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}