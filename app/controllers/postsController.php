<?php

namespace App\Controllers\PostsController;
use \PDO;
use \App\Models\PostsModel;
use \App\Models\CategoriesModel;
use \App\Models\EditDbModel;
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
    $post = PostsModel\findOneById($connection, $id);
    include '../app/models/editDbModel.php';
    EditDbModel\deleteOnePostById($connection, $post);
    header('Location: ' . PUBLIC_BASE_URL);
}

function goToPage(PDO $connection, int $pageNbr){
    if($pageNbr === 1):
        header('Location: ' . PUBLIC_BASE_URL);
    else:
    $offset = ($pageNbr * 10) - 10;
    indexAction($connection, $offset);
    endif;
}
